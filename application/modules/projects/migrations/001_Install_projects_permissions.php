<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Install_projects_permissions extends Migration
{
	/**
	 * @var array Permissions to Migrate
	 */
	private $permissionValues = array(
		array(
			'name' => 'Projects.Content.View',
			'description' => 'View Projects Content',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Content.Create',
			'description' => 'Create Projects Content',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Content.Edit',
			'description' => 'Edit Projects Content',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Content.Delete',
			'description' => 'Delete Projects Content',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Reports.View',
			'description' => 'View Projects Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Reports.Create',
			'description' => 'Create Projects Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Reports.Edit',
			'description' => 'Edit Projects Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Reports.Delete',
			'description' => 'Delete Projects Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Settings.View',
			'description' => 'View Projects Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Settings.Create',
			'description' => 'Create Projects Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Settings.Edit',
			'description' => 'Edit Projects Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Settings.Delete',
			'description' => 'Delete Projects Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Developer.View',
			'description' => 'View Projects Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Developer.Create',
			'description' => 'Create Projects Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Developer.Edit',
			'description' => 'Edit Projects Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Projects.Developer.Delete',
			'description' => 'Delete Projects Developer',
			'status' => 'active',
		),
    );

    /**
     * @var string The name of the permission key in the role_permissions table
     */
    private $permissionKey = 'permission_id';

    /**
     * @var string The name of the permission name field in the permissions table
     */
    private $permissionNameField = 'name';

	/**
	 * @var string The name of the role/permissions ref table
	 */
	private $rolePermissionsTable = 'role_permissions';

    /**
     * @var numeric The role id to which the permissions will be applied
     */
    private $roleId = '1';

    /**
     * @var string The name of the role key in the role_permissions table
     */
    private $roleKey = 'role_id';

	/**
	 * @var string The name of the permissions table
	 */
	private $tableName = 'permissions';

	//--------------------------------------------------------------------

	/**
	 * Install this version
	 *
	 * @return void
	 */
	public function up()
	{
		$rolePermissionsData = array();
		foreach ($this->permissionValues as $permissionValue) {
			$this->db->insert($this->tableName, $permissionValue);

			$rolePermissionsData[] = array(
                $this->roleKey       => $this->roleId,
                $this->permissionKey => $this->db->insert_id(),
			);
		}

		$this->db->insert_batch($this->rolePermissionsTable, $rolePermissionsData);
	}

	/**
	 * Uninstall this version
	 *
	 * @return void
	 */
	public function down()
	{
        $permissionNames = array();
		foreach ($this->permissionValues as $permissionValue) {
            $permissionNames[] = $permissionValue[$this->permissionNameField];
        }

        $query = $this->db->select($this->permissionKey)
                          ->where_in($this->permissionNameField, $permissionNames)
                          ->get($this->tableName);

        if ( ! $query->num_rows()) {
            return;
        }

        $permissionIds = array();
        foreach ($query->result() as $row) {
            $permissionIds[] = $row->{$this->permissionKey};
        }

        $this->db->where_in($this->permissionKey, $permissionIds)
                 ->delete($this->rolePermissionsTable);

        $this->db->where_in($this->permissionNameField, $permissionNames)
                 ->delete($this->tableName);
	}
}