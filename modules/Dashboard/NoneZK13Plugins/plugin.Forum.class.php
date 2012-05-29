<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginForum implements DashboardPluginInterface
{
	public function module() {
		return 'Dizkus';
	}    
	public function name() {
		return 'PluginForum';
	}
	public function title() {
		return __('Forum');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
	  	$output= pnModAPIFunc('Dashboard',
	  						  'user',
	  						  'includeBlock',
	  						  array('module' 	=> 'Dizkus', 
	  						  	    'blockname' => 'center'));
	  	return $output;		
	}
}
