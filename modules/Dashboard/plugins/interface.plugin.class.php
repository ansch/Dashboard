<?php

interface  DashboardPluginInterface
{
	public function module();    
	public function name();
	public function title();
	public function size();
	public function getContent();
}

?>