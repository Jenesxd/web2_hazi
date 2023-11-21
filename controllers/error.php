<?php

class Error_Controller
{
	public $baseName = 'error'; 
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName.'_main');
		$view->assign('type', $vars[0]);
		$view->assign('message', $vars[1]);
	}
}

?>