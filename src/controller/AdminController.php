<?php

require_once routeLibs.'View.php';

class AdminController{

 	public function default(){
		require_once routeModel.'AdminModel.php';
    $model = new AdminModel();

    view('agregarAtractivo.php', null);
    	//view('admin.php');
  	}

	public function addLocation(/*Values*/){
  		//TODO
  	}

	public function removeLocation(/*Values*/){
  		//TODO
  	}
}

?>