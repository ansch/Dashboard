<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginLastxusers implements DashboardPluginInterface
{
	public function module() {
		return 'Profile';
	}    
	public function name() {
		return 'PluginLastxusers';
	}
	public function title() {
		return __('Last x users');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
		$output = ModUtil::apiFunc('Dashboard', 'user', 'includeBlock', array('module' => 'Profile', 
                                                                                    'blockname' => 'Lastxusers'));
	  	return $output;		
	}
}