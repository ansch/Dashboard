<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginWeblog implements DashboardPluginInterface
{
	public function module() {
		return 'pnWebLog';
	}    
	public function name() {
		return 'PluginWeblog';
	}
	public function title() {
		return __('Weblog');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
	  	$output= pnModAPIFunc('Dashboard',
	  						  'user',
	  						  'includeBlock',
	  						  array('module' 	=> 'pnWebLog', 
	  						  	    'blockname' => 'latest'));
	  	return $output;		
	}
}
