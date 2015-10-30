<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Developer controller
 */
class Developer extends Admin_Controller
{
    protected $permissionCreate = 'Projects.Developer.Create';
    protected $permissionDelete = 'Projects.Developer.Delete';
    protected $permissionEdit   = 'Projects.Developer.Edit';
    protected $permissionView   = 'Projects.Developer.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->auth->restrict($this->permissionView);
        $this->load->model('projects/projects_model');
        $this->lang->load('projects');
        
            $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
        
        Template::set_block('sub_nav', 'developer/_sub_nav');

        Assets::add_module_js('projects', 'projects.js');
    }

    /**
     * Display a list of projects data.
     *
     * @return void
     */
    public function index($offset = 0)
    {
        // Deleting anything?
        if (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);
            $checked = $this->input->post('checked');
            if (is_array($checked) && count($checked)) {

                // If any of the deletions fail, set the result to false, so
                // failure message is set if any of the attempts fail, not just
                // the last attempt

                $result = true;
                foreach ($checked as $pid) {
                    $deleted = $this->projects_model->delete($pid);
                    if ($deleted == false) {
                        $result = false;
                    }
                }
                if ($result) {
                    Template::set_message(count($checked) . ' ' . lang('projects_delete_success'), 'success');
                } else {
                    Template::set_message(lang('projects_delete_failure') . $this->projects_model->error, 'error');
                }
            }
        }
        $pagerUriSegment = 5;
        $pagerBaseUrl = site_url(SITE_AREA . '/developer/projects/index') . '/';
        
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->projects_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->projects_model->limit($limit, $offset);
        
        $records = $this->projects_model->find_all();

        Template::set('records', $records);
        
    Template::set('toolbar_title', lang('projects_manage'));

        Template::render();
    }
    
    /**
     * Create a projects object.
     *
     * @return void
     */
    public function create()
    {
        $this->auth->restrict($this->permissionCreate);
        
        if (isset($_POST['save'])) {
            if ($insert_id = $this->save_projects()) {
                log_activity($this->auth->user_id(), lang('projects_act_create_record') . ': ' . $insert_id . ' : ' . $this->input->ip_address(), 'projects');
                Template::set_message(lang('projects_create_success'), 'success');

                redirect(SITE_AREA . '/developer/projects');
            }

            // Not validation error
            if ( ! empty($this->projects_model->error)) {
                Template::set_message(lang('projects_create_failure') . $this->projects_model->error, 'error');
            }
        }

        Template::set('toolbar_title', lang('projects_action_create'));

        Template::render();
    }
    /**
     * Allows editing of projects data.
     *
     * @return void
     */
    public function edit()
    {
        $id = $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('projects_invalid_id'), 'error');

            redirect(SITE_AREA . '/developer/projects');
        }
        
        if (isset($_POST['save'])) {
            $this->auth->restrict($this->permissionEdit);

            if ($this->save_projects('update', $id)) {
                log_activity($this->auth->user_id(), lang('projects_act_edit_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'projects');
                Template::set_message(lang('projects_edit_success'), 'success');
                redirect(SITE_AREA . '/developer/projects');
            }

            // Not validation error
            if ( ! empty($this->projects_model->error)) {
                Template::set_message(lang('projects_edit_failure') . $this->projects_model->error, 'error');
            }
        }
        
        elseif (isset($_POST['delete'])) {
            $this->auth->restrict($this->permissionDelete);

            if ($this->projects_model->delete($id)) {
                log_activity($this->auth->user_id(), lang('projects_act_delete_record') . ': ' . $id . ' : ' . $this->input->ip_address(), 'projects');
                Template::set_message(lang('projects_delete_success'), 'success');

                redirect(SITE_AREA . '/developer/projects');
            }

            Template::set_message(lang('projects_delete_failure') . $this->projects_model->error, 'error');
        }
        
        Template::set('projects', $this->projects_model->find($id));

        Template::set('toolbar_title', lang('projects_edit_heading'));
        Template::render();
    }

    //--------------------------------------------------------------------------
    // !PRIVATE METHODS
    //--------------------------------------------------------------------------

    /**
     * Save the data.
     *
     * @param string $type Either 'insert' or 'update'.
     * @param int    $id   The ID of the record to update, ignored on inserts.
     *
     * @return boolean|integer An ID for successful inserts, true for successful
     * updates, else false.
     */
    private function save_projects($type = 'insert', $id = 0)
    {
        if ($type == 'update') {
            $_POST['id'] = $id;
        }

        // Validate the data
        $this->form_validation->set_rules($this->projects_model->get_validation_rules());
        if ($this->form_validation->run() === false) {
            return false;
        }

        // Make sure we only pass in the fields we want
        
        $data = $this->projects_model->prep_data($this->input->post());

        // Additional handling for default values should be added below,
        // or in the model's prep_data() method
        

        $return = false;
        if ($type == 'insert') {
            $id = $this->projects_model->insert($data);

            if (is_numeric($id)) {
                $return = $id;
            }
        } elseif ($type == 'update') {
            $return = $this->projects_model->update($id, $data);
        }

        return $return;
    }
}