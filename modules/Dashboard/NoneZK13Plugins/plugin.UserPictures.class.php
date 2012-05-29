<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginUserPictures implements DashboardPluginInterface
{
	public function module() {
		return 'UserPictures';
	}    
	public function name() {
		return 'PluginUserPictures';
	}
	public function title() {
		return __('Neueste Bilder in den Benutzergalerien');
	}
	public function size() {
		return 3;
	}
	
	public function getContent() {
		$output = pnModAPIFunc('Dashboard',
							   'user',
							   'includeBlock',
							   array('module' 	 => 'UserPictures', 
							   		 'blockname' => 'latestsmall'));
	  	return $output;		
	}
}
