<?php

include  dirname(dirname(dirname(__DIR__))).'/app/Database.php';

class ProductController{
    
	public function index(){
        
        
        // var_dump($L);die;
        // $L = '23423';
		$data = [
			'id'    => 1,
			'name' => 'ava'
		];
		$DB = new DB;
		$aa =  $DB->table('vi_product_basic')
		       ->select('id','name')
		       ->where('id', '=', '20')
		       ->get();
          
		return $this->view('index',$data);
	}

	public function test(){
		echo '<h1> day la test </h1>';
	}

}


