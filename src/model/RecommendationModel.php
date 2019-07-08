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
      "Tiene senderos",
      "Ofrece comida vegetariana",
      "Tiene guias turisticos",
      "Tienen souvenirs a la venta",
      "Poseen areas al aire libre",
      "Poseen zonas deportivas",
      "Es de fácil acceso para discapacitados",
      "Posee zonas para fumadores",
      "Permite el ingreso de mascotas",
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

  public function calcularDiferenciasEstricto($senderos, $vegetariana,  $guia, $souvenirs, $aire_libre, $zona_deportiva, $discapacitado, $zona_fumado, $animales){
    $db = Connection::singleton();

    $query = "SELECT Id_Lugar, Nombre, SQRT(
      CONVERT($senderos XOR Senderos, unsigned) +
      CONVERT($vegetariana XOR Comida_Vegetariana, unsigned) +
      CONVERT($guia XOR Guias_Turisticos, unsigned) +
      CONVERT($souvenirs XOR Souvenirs, unsigned) +
      CONVERT($aire_libre XOR Aire_Libre, unsigned) +
      CONVERT($zona_deportiva XOR Zona_Deportiva, unsigned) +
      CONVERT($discapacitado XOR Discapacitado, unsigned) +
      CONVERT($zona_fumado XOR Fumado, unsigned) +
      CONVERT($animales XOR Animales, unsigned))
      as Distancia
      FROM ".TBL_LUGAR_ESTILO.", ".TBL_LUGAR.
      " WHERE ".TBL_LUGAR_ESTILO.".Id_Lugar = ".TBL_LUGAR.".Id
      ORDER BY Distancia ASC";

    $smt = $db->prepare($query);
    
    $smt->execute();

    $resultado = $smt->fetchAll();

    return $resultado;
  }

  public function calcularDiferenciasPermisivo($senderos, $vegetariana,  $guia, $souvenirs, $aire_libre, $zona_deportiva, $discapacitado, $zona_fumado, $animales){
    $db = Connection::singleton();

    $query = "SELECT Id_Lugar, Nombre, SQRT(
      CONVERT($senderos AND NOT Senderos, unsigned) +
      CONVERT($vegetariana AND NOT Comida_Vegetariana, unsigned) +
      CONVERT($guia AND NOT Guias_Turisticos, unsigned) +
      CONVERT($souvenirs AND NOT Souvenirs, unsigned) +
      CONVERT($aire_libre AND NOT Aire_Libre, unsigned) +
      CONVERT($zona_deportiva AND NOT Zona_Deportiva, unsigned) +
      CONVERT($discapacitado AND NOT Discapacitado, unsigned) +
      CONVERT($zona_fumado AND NOT Fumado, unsigned) +
      CONVERT($animales AND NOT Animales, unsigned))
      as Distancia
      FROM ".TBL_LUGAR_ESTILO.", ".TBL_LUGAR.
      " WHERE ".TBL_LUGAR_ESTILO.".Id_Lugar = ".TBL_LUGAR.".Id
      ORDER BY Distancia ASC";

    echo $query;

    $smt = $db->prepare($query);
    
    $smt->execute();

    $resultado = $smt->fetchAll();

    return $resultado;
  }

}

?>