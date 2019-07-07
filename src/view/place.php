<?php 
  include_once 'header.php';
?>

<?php

include_once routeDomain.'Atractivo.php';

$default =new Atractivo('Casa Turire', 'Hotel Familiar en medio de la montaña', 31, 22);

$atractivo = isset($vars['atractivo']) ? $vars['atractivo'] : $default;
$nombre = $atractivo->getNombre();
$descripcion = $atractivo->getDescripcion();
$latitud = $atractivo->getLatitud();
$longitud = $atractivo->getLongitud();

$servicios = isset($vars['servicios']) ? $vars['servicios'] : array();
?>

<div class="row">
  <div class="col-lg-4" style="margin: 25px; border-style: dashed; display: flow-root;">
    <h2> <?= $nombre ?> </h2>

    <br>

    <h3>Descripción</h3>
    <p> <?= $descripcion ?> </p>


    <br>

    <h3>Servicios que ofrecemos:</h3>
    <ul>
      <?php foreach($servicios as $key => $servicio) {?>
      <li> <?= $servicio ?> </li>
      <?php } ?>
    </ul>

  </div>

  <?php
    view('map.php');
  ?>

</div>

<?php 
  include_once 'footer.php';
?>