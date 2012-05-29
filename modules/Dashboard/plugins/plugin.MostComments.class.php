<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginMostComments implements DashboardPluginInterface
{
    	public function module() {
		return 'EZComments';
	}
	public function name() {
		return 'PluginMostComments';
	}
	public function title() {
		return __('Most Comments');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
		$output = ModUtil::apiFunc('Dashboard', 'user', 'includeBlock', array('module' => 'EZComments', 
                                                                                    'blockname' => 'MostComments'));
	  	return $output;		
	}
}