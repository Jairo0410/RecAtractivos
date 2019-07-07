<?php 

require_once routeDomain . 'Atractivo.php';
require_once routeLibs . 'Connection.php';

class AtractivoModel{
  
  public function __construct(){
    ;
  }

  public function obtenerTodos() : array{
    $db = Connection::singleton();
    $smt = $db->prepare("SELECT Id, Nombre, Lat, Lon, Descripcion from ".TBL_LUGAR);
    
    $smt->execute();

    $smt->bindColumn(1, $id);
    $smt->bindColumn(2, $nombre);
    $smt->bindColumn(3, $latitud);
    $smt->bindColumn(4, $longitud);
    $smt->bindColumn(5, $descripcion);

    $atractivos = array();

    while($smt->fetch(PDO::FETCH_BOUND)){
      $atractivo = new Atractivo($nombre, $descripcion, $latitud, $longitud);
      $atractivo->setID($id);
      array_push($atractivos, $atractivo);
    }

    return $atractivos;
  }

  public function obtenerAtractivo($id_atractivo) : Atractivo{
    $db = Connection::singleton();

    $smt = $db->prepare("SELECT Id, Nombre, Lat, Lon, Descripcion from ".TBL_LUGAR." WHERE Id=$id_atractivo");
    
    $smt->execute();

    $smt->bindColumn(1, $id);
    $smt->bindColumn(2, $nombre);
    $smt->bindColumn(3, $latitud);
    $smt->bindColumn(4, $longitud);
    $smt->bindColumn(5, $descripcion);

    $resultado = $smt->fetch(PDO::FETCH_BOUND);

    $atractivo = new Atractivo($nombre, $descripcion, $latitud, $longitud);
    $atractivo->setID($id);

    return $atractivo;
  }

  public function obtenerServiciosAtractivo($id_atractivo) : array{

    require_once routeModel . 'RecommendationModel.php';
    $model = new RecommendationModel();

    $servicios = $model->getServicios();

    $db = Connection::singleton();

    $query = "SELECT Senderos, Comida_Vegetariana, Guias_Turisticos, 
      Souvenirs, Aire_Libre, Zona_Deportiva, Discapacitado, Fumado, Animales 
      from ".TBL_LUGAR_ESTILO." WHERE Id_Lugar=$id_atractivo";

    $smt = $db->prepare($query);

    $smt->execute();

    $smt->bindColumn(1, $senderos);
    $smt->bindColumn(2, $vegetariana);
    $smt->bindColumn(3, $guias);
    $smt->bindColumn(4, $souvenirs);
    $smt->bindColumn(5, $aire_libre);
    $smt->bindColumn(6, $zona_deportiva);
    $smt->bindColumn(7, $discapacitado);
    $smt->bindColumn(8, $fumado);
    $smt->bindColumn(9, $animales);

    $smt->fetch(PDO::FETCH_BOUND);

    $values = array($senderos, $vegetariana, $guias, $souvenirs, 
      $aire_libre, $zona_deportiva, $discapacitado, $fumado, $animales);

    /*
    Retorna una pareja de valores: la llave es el nombre del servicio
    los valores corresponden a 1 si lo cumple, 0 si no lo cumple
    */
    $resultado = array_combine($servicios, $values);

    return $resultado;
  }

  public function obtenerImagenesAtractivo($id_atractivo) : array{

  }

  public function obtenerVideosAtractivo($id_atractivo) : array{

  }

}

?>