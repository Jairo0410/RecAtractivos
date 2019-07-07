<?php

require_once routeLibs.'Connection.php';

class SexModel{
  private $db;

  public function __construct(){
    $this->db = Connection::singleton();
  }

  public function get_sexes(){
    $sql = "select sexo, recinto, promedio, estilo from " . TBL_SEXO_RECINTO;
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
  }
}

?>