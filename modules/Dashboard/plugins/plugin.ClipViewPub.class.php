<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginClipViewPub implements DashboardPluginInterface
{
	public function module() {
		return 'Clip';
	}    
	public function name() {
		return 'PluginClipViewPub';
	}
	public function title() {
		return __('View a Clip Publication');
	}
	public function size() {
		return 3;
	}
	
	public function getContent() {
		$output = ModUtil::apiFunc('Dashboard', 'user', 'includeBlock', array('module' => 'Clip', 
                                                                                    'blockname' => 'Viewpub'));
	  	return $output;		
	}
}