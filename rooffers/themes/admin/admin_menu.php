<ul class="menu accordion-menu">
   
   <li><a href="javascript:void(0);"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>

   <li class="droplink">
      <a href="<?=base_url();?>admin/content/projects">
         <span class="icon-tag menu-icon"></span>
         <p>Projects</p>
         <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
          <li><a href="<?=base_url();?>admin/content/projects">View Projects</a></li>
          <li><a href="<?=base_url();?>admin/content/projects/create">Create Projects</a></li>
      </ul>
   </li>

   <li class="droplink">
      <a href="javascript:void(0);">
         <span class="icon-calculator menu-icon"></span>
         <p>Reports</p>
         <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
         <li><a href="<?=base_url();?>admin/reports/activities">Activities</a></li>
         <li><a href="<?=base_url();?>admin/reports/projects" class="active">Projects</a></li>
      </ul>
   </li>

   <li class="droplink">
      <a href="void(0);">
         <span class="icon-settings menu-icon"></span>
         <p>Settings</p>
         <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
         <li><a href="<?=base_url();?>admin/settings/users">Users</a></li>
         <li class="droplink">
            <a href="javascript:void(0);">
               <p>Email Queue</p>
               <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
               <li><a href="<?=base_url();?>admin/settings/emailer">Settings</a></li>
               <li><a href="<?=base_url();?>admin/settings/emailer/template">Template</a></li>
               <li><a href="<?=base_url();?>admin/settings/emailer/queue">View Queue</a></li>
            </ul>
         </li>
         <li><a href="<?=base_url();?>admin/settings/ui">Keyboard Shortcuts</a></li>
         <li><a href="<?=base_url();?>admin/settings/permissions">Permissions</a></li>
         <li><a href="<?=base_url();?>admin/settings/roles">Roles</a></li>
         <li><a href="<?=base_url();?>admin/settings/settings">Settings</a></li>
         <li><a href="<?=base_url();?>admin/settings/projects" class="active">Projects</a></li>
      </ul>
   </li>

   <li class="droplink">
      <a href="javascript:void(0);">
         <span class="icon-eyeglasses menu-icon"></span>
         <p>Developer</p>
         <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
         <li class="droplink">
            <a href="javascript:void(0);">
               <p>Database Tools</p>
               <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
               <li><a href="<?=base_url();?>admin/developer/database">Maintenance</a></li>
               <li><a href="<?=base_url();?>admin/developer/database/backups">Backups</a></li>
               <li><a href="<?=base_url();?>admin/developer/migrations">Migrations</a></li>
            </ul>
         </li>
         <li><a href="<?=base_url();?>admin/developer/builder">Code Builder</a></li>
         <li><a href="<?=base_url();?>admin/developer/logs">Logs</a></li>
         <li><a href="<?=base_url();?>admin/developer/sysinfo">System Information</a></li>
         <li><a href="<?=base_url();?>admin/developer/translate">Translate</a></li>
         <li><a href="<?=base_url();?>admin/developer/projects" class="active">Projects</a></li>
      </ul>
   </li>

</ul>