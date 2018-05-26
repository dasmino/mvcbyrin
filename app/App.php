<?php 
include dirname(__DIR__).'/app/Functions.php';

class Route{

	public function get($uri, $param){

		if($_SERVER['REQUEST_METHOD'] !== 'GET'){
			die();
		}
		$uri_action = explode('/',$uri)[1];
		if(strcasecmp($_GET['action'], $uri_action) == 0){
			$nameclass  = explode('@', $param)[0];
			$namemodule =   explode('controller', strtolower($nameclass))[0];
			$action     = explode('@', $param)[1];
			$path       = '../modules/'.$namemodule.'/controllers/'.$nameclass.'.php';
			if(file_exists($path)){
				include $path;
				$newclass = new $nameclass;
				$newclass->$action();
			}
			exit();
		}

	}

	public function post($uri, $param){
		if($_SERVER['REQUEST_METHOD'] !== 'POST'){
			die();
		}
		$uri_action = explode('/',$uri)[1];
		if(strcasecmp($_GET['action'], $uri_action) == 0){
			$nameclass  = explode('@', $param)[0];
			$namemodule =   explode('controller', strtolower($nameclass))[0];
			$action     = explode('@', $param)[1];
			$path       = '../modules/'.$namemodule.'/controllers/'.$nameclass.'.php';
			if(file_exists($path)){
				include $path;
				$newclass = new $nameclass;
				$newclass->$action();
			}
			exit();
		}

	}

	public function any($uri, $param){
		if($_SERVER['REQUEST_METHOD'] !== 'GET' || $_SERVER['REQUEST_METHOD'] !== 'POST'){
			die();
		}
		$uri_action = explode('/',$uri)[1];
		if(strcasecmp($_GET['action'], $uri_action) == 0){
			$nameclass  = explode('@', $param)[0];
			$namemodule =   explode('controller', strtolower($nameclass))[0];
			$action     = explode('@', $param)[1];
			$path       = '../modules/'.$namemodule.'/controllers/'.$nameclass.'.php';
			if(file_exists($path)){
				include $path;
				$newclass = new $nameclass;
				$newclass->$action();
			}
			exit();
		}

	}
	
}

