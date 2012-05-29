<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginContentMostviewed implements DashboardPluginInterface
{
	public function module() {
		return 'Content';
	}    
	public function name() {
		return 'PluginContentMostviewed';
	}
	public function title() {
		return __('Most viewed Content Pages');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
		$output = ModUtil::apiFunc('Dashboard', 'user', 'includeBlock', array('module' => 'Content', 
                                                                                    'blockname' => 'Mostviewed'));
	  	return $output;		
	}
}