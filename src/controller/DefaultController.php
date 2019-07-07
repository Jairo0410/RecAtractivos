<?php

require_once routeLibs.'View.php';

class DefaultController{

  	public function home(){
    	view('home.php');
  	}

  	public function notFound($message = 'Error 404 - Not Found'){
    	$data['message'] = $message;
    	view('notFound.php', $data);
  	}

}

?>