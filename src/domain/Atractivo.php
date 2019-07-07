<?php 

class Atractivo{

  private $id;
  private $ubicacion_longitud;
  private $ubicacion_latitud;
  private $nombre;
  private $descripcion;

  public function __construct($nombre, $descripcion, $latitud, $longitud){
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->ubicacion_latitud = $latitud;
    $this->ubicacion_longitud = $longitud;
  }

  public function getNombre(){
    return $this->nombre;
  }

  public function getDescripcion(){
    return $this->descripcion;
  }

  public function getLatitud(){
    return $this->ubicacion_latitud;
  }

  public function getLongitud(){
    return $this->ubicacion_longitud;
  }

  public function setID(int $id){
    $this->id = $id;
  }

}

?>