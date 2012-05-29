<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginClipPublist implements DashboardPluginInterface
{
	public function module() {
		return 'Clip';
	}    
	public function name() {
		return 'PluginClipPublist';
	}
	public function title() {
		return __('List of Clip Publications');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
		$output = ModUtil::apiFunc('Dashboard', 'user', 'includeBlock', array('module' => 'Clip', 
                                                                                    'blockname' => 'List'));
	  	return $output;		
	}
}