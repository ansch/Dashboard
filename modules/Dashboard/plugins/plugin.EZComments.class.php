<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginEZComments implements DashboardPluginInterface
{
	public function module() {
		return 'EZComments';
	}    
	public function name() {
		return 'PluginEZComments';
	}
	public function title() {
		return __('Comments');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
		$output = ModUtil::apiFunc('Dashboard', 'user', 'includeBlock', array('module' => 'EZComments', 
                                                                                    'blockname' => 'EZComments'));
	  	return $output;		
	}
}