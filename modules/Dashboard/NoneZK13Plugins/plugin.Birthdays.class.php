<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginBirthdays implements DashboardPluginInterface
{
	public function module() {
		return 'MyProfile';
	}
        
	public function name() {
                return 'PluginBirthdays';
	}
	public function title() {
		return __('Geburtstagskinder');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
	  	$output = pnModAPIFunc('Dashboard',
	  						   'user',
	  						   'includeBlock',
	  						   array('module' 	 => $this->module(), 
	  						   		 'blockname' => 'birthday'));
	  	return $output;		
	}
}
