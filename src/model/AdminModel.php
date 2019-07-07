<?php

require_once routeLibs.'Connection.php';

class AdminModel{
  private $db;
  
  /*Datos quemados*/

  private $servicios;
  private $estereotipos;
  private $atractivos;


  public function __construct(){
    //$this->db = Connection::singleton();

    $this->servicios = array(
      array(0,"Tiene elevadores"),
      array(1,"Tiene equipo de primeros auxilios"),
      array(3,"Se puede hacer rafting"),
      array(4,"Se puede bucear")
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

  public function agregarAtractivo(){
    
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