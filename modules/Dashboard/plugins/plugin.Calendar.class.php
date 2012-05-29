<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginCalendar implements DashboardPluginInterface
{
	public function module() {
		return 'PostCalendar';
	}    
	public function name() {
		return 'PluginCalendar';
	}
	public function title() {
		return __('Calendar');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
		$output = ModUtil::apiFunc('Dashboard', 'user', 'includeBlock', array('module' => 'PostCalendar', 
                                                                                    'blockname' => 'Calendar'));
	  	return $output;		
	}
}