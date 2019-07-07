<?php

require_once routeLibs.'View.php';

class RecommendationController{

  public function default(){
    require_once routeModel.'RecommendationModel.php';
    $model = new RecommendationModel();

    $data['servicios'] = $model->getServicios();
    $data['estereotipos'] = $model->getEstereotipos();

    view('seleccionarServicios.php', $data);
  }

  public function buscarRecomendaciones(){

    require_once routeModel.'RecommendationModel.php';
    $model = new RecommendationModel();

    $servicios = $model->getServicios();

    $senderos = isset($_POST[ "cbx0" ]) ? $_POST[ "cbx0" ] : 0;
    $vegetariana = isset($_POST[ "cbx1" ]) ? $_POST[ "cbx1" ] : 0;
    $guias = isset($_POST[ "cbx2" ]) ? $_POST[ "cbx2" ] : 1;
    $souvenirs = isset($_POST[ "cbx3" ]) ? $_POST[ "cbx3" ] : 0;
    $aire_libre = isset($_POST[ "cbx4" ]) ? $_POST[ "cbx4" ] : 0;
    $zona_deportiva = isset($_POST[ "cbx5" ]) ? $_POST[ "cbx5" ] : 0;
    $discapacitados = isset($_POST[ "cbx6" ]) ? $_POST[ "cbx6" ] : 0;
    $fumado = isset($_POST[ "cbx7" ]) ? $_POST[ "cbx7" ] : 0;
    $animales = isset($_POST[ "cbx8" ]) ? $_POST[ "cbx8" ] : 0;

    $data['atractivos'] = $model->calcularDiferencias($senderos, $vegetariana, $guias, $souvenirs, $aire_libre, $zona_deportiva, $discapacitados, $fumado, $animales);

  	view('buscarRecomendaciones.php', $data);
  }

  public function verDetalleAtractivo(){
  	$id = isset($_GET['id']) ? $_GET['id'] : 0;

  	require_once routeModel.'RecommendationModel.php';
    $model = new RecommendationModel();

  	$data['atractivo'] = $model-> getAtractivoPorId($id);

  	view('verDetalleAtractivo.php', $data);
  }

  public function agregarAtractivo(){
    require_once routeModel.'RecommendationModel.php';
    $model = new RecommendationModel();

    $data['servicios'] = $model->getServicios();
  
    if(isset($_POST['agregar'])){
      $data['mensaje'] = $model->agregarAtractivo();
    }

    view('agregarAtractivo.php', $data);
  }

}

?>