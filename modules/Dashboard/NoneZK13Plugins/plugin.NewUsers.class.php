<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginNewUsers implements DashboardPluginInterface
{
    	public function module() {
		return 'MyProfile';
	}
	public function name() {
		return 'PluginNewUsers';
	}
	public function title() {
		return __('Neue Mitglieder');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
	  	$output = pnModAPIFunc('Dashboard',
	  						   'user',
	  						   'includeBlock',
	  						   array('module' 	 => 'MyProfile', 
	  						   		 'blockname' => 'newbies'));
	  	return $output;		
	}
}
