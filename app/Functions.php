<?php

/*
dirname(__FILE__)  = D:\xampp\htdocs\core\mymvc\modules\core\controllers
dirname(__DIR__)   = D:\xampp\htdocs\core\mymvc
basename(__FILE__) = CoreController.php
(__FILE__)         = D:\xampp\htdocs\core\mymvc\modules\core\controllers\CoreController.php
__DIR__            = D:\xampp\htdocs\core\mymvc\modules\core\controllers
// define('DIR', dirname(__DIR__));

*/
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'vi';

include  dirname(__DIR__).'/resources/'.$lang.'/messages.php';


class Render extends Lang{

	public function view($layout,$data = null){

		ob_start();

		$L = $this->trans();
		$path = dirname(__DIR__).'/modules/core/views/index.php';
		if(file_exists($path)){
			include $path;
		}
		echo ob_get_clean();
	}
}


