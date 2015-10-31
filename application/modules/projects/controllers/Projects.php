<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Projects controller
 */
class Projects extends Front_Controller
{
    protected $permissionCreate = 'Projects.Projects.Create';
    protected $permissionDelete = 'Projects.Projects.Delete';
    protected $permissionEdit   = 'Projects.Projects.Edit';
    protected $permissionView   = 'Projects.Projects.View';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('projects/projects_model');
        $this->lang->load('projects');
        
        

        Assets::add_module_js('projects', 'projects.js');
    }

    /**
     * Display a list of projects data.
     *
     * @return void
     */
    public function index($offset = 0)
    {
        
        $pagerUriSegment = 3;
        $pagerBaseUrl = site_url('projects/index') . '/';
        
        $limit  = $this->settings_lib->item('site.list_limit') ?: 15;

        $this->load->library('pagination');
        $pager['base_url']    = $pagerBaseUrl;
        $pager['total_rows']  = $this->projects_model->count_all();
        $pager['per_page']    = $limit;
        $pager['uri_segment'] = $pagerUriSegment;

        $this->pagination->initialize($pager);
        $this->projects_model->limit($limit, $offset);
        

        // Don't display soft-deleted records
        $this->projects_model->where($this->projects_model->get_deleted_field(), 0);
        $records = $this->projects_model->find_all();

        Template::set('records', $records);
        

        Template::render();
    }
    
}