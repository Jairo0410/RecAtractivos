<?php

require_once routeLibs.'Connection.php';

class RecommendationModel{
  private $db;
  
  /*Datos quemados*/

  private $servicios;
  private $estereotipos;
  private $atractivos;


  public function __construct(){
    //$this->db = Connection::singleton();

    $this->servicios = array(
      array(0,"Tiene senderos"),
      array(1,"Ofrece comida vegetariana"),
      array(2,"Tiene guias turisticos"),
      array(3,"Venden souvenirs"),
      array(4,"Hay lugares al aire libre"),
      array(5,"Hay zona deportiva"),
      array(4,"Existe acceso para discapacitados"),
      array(4,"Hay areas de fumado"),
      array(4,"Se permiten mascotas"),
    );

    $this->estereotipos = array(
      array('Anciano', array($this->servicios[0], $this->servicios[1])),
      array('Aventurero', array($this->servicios[2], $this->servicios[3]))
    );

    $this->atractivos = array(
      array(1, 'Wagelia', 9.905511, -83.684724, 'Promocion de dos noches por el precio de una', 
        array($this->servicios[1], $this->servicios[2])),
      array(2, 'AmazonianWillow', 9.909675, -84.102826, 'Paquete para tres personas', 
        array($this->servicios[1])),
      array(3, 'Hotel Dos Corazones', 9.903511, -83.684813, 'Oferta para dos personas', 
        array($this->servicios[0], $this->servicios[3]))
    );

  }

  public function getServicios(){
    return $this->servicios;
  }

  public function getEstereotipos(){
    return $this->estereotipos;
  }

  public function getAtractivos(){
    return $this->atractivos;
  }

  public function getAtractivoPorId($id = 0){
    foreach ($this->atractivos as $key => $value) {
      if($value[0] == $id){
        return $value;
      }
    }

    return null;
  }

  public function agregarAtractivo(/*$nombre, $latitud, $longitud, $descripcion, $servicios*/){
    /*
    $ultimo = end($this->atractivos);
    $atractivo = array($ultimo[0] + 1, $nombre, $latitud, $longitud, $descripcion, 
        $servicios);
    array_push($this->atractivos, $atractivo);
    */
    return 'Atractivo agregado';
  }

  public function calcularDiferencias($senderos, $vegetariana,  $guia, $souvenirs, $aire_libre, $zona_deportiva, $discapacitado, $zona_fumado, $animales){
    $db = Connection::singleton();
    $smt = $db->prepare("call SP_Obtener_Distancias($senderos, $vegetariana, $guia, $souvenirs, $aire_libre, $zona_deportiva, $discapacitado, $zona_fumado, $animales)");
    
    $smt->execute();

    $resultado = $smt->fetchAll();

    return $resultado;
  }

  /*
    Servicio
      id
      nombre

    Estereotipo
      String nombre 
      array<Servicio> servicios

    Atractivo
      id
      nombre
      latitud
      longitud
      descripcion
      array<Servicio> servicios
    */

}

?>