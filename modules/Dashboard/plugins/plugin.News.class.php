<?php
Loader::requireOnce('modules/Dashboard/plugins/interface.plugin.class.php');
class PluginNews implements DashboardPluginInterface
{
	public function module() {
		return 'News';
	}    
	public function name() {
		return 'PluginNews';
	}
	public function title() {
		return __('News');
	}
	public function size() {
		return 1;
	}
	
	public function getContent() {
		
		$width = $params['width'];
		$order = 'cr_date DESC';
		$where = 'published_status = 0';
		ModUtil::dbInfoLoad('News');
	  	$result = DBUtil::selectObjectArray('news',$where,$order,0,7);
	  	$content = '
		  <div style="width: '.$width.'px;">
		  ';
		foreach ($result as $s) {
		  	$s['title'] = DataUtil::formatForDisplayHTML($s['title']);
		  	$content.='<li>&#187; <a title="'.str_replace('"','\'',$s['title']).' von: '.$s['informant'].'" href="'.ModUtil::url('News','user','display',array('sid' => $s['sid'])).'">'.$this->ShortenText2($s['title'],40).'</a></li>';
		}
		$content.='<br /><a href="'.ModUtil::url('News','user','main').'">Alle Neuigkeiten anzeigen</a><br /><br />
		  </div>
		  ';
	
	  	return $content;
	}
	
	function ShortenText2($text,$chars) {
	    $chars = $chars;
		if (strlen($text) <= $chars) return $text;
	    $text = $text." ";
	    $text = substr($text,0,$chars);
	    $text = substr($text,0,strrpos($text,' '));
	    $text = $text."...";
	    return $text;
	}
}
