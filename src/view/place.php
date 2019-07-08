<?php

$atractivo = isset($vars['atractivo']) ? $vars['atractivo'] : $default;
$nombre = $atractivo->getNombre();
$descripcion = $atractivo->getDescripcion();
$latitud = $atractivo->getLatitud();
$longitud = $atractivo->getLongitud();

$servicios = isset($vars['servicios']) ? $vars['servicios'] : array();
$imagenes = isset($vars['imagenes']) ? $vars['imagenes'] : array();
$videos = isset($vars['videos']) ? $vars['videos'] : array();
?>

<div class="row">
  <div class="col-lg-8 col-sm-8 col-md-8"">
    <h2> <?= $nombre ?> </h2>

    <br>

    <h3>Descripción</h3>
    <p> <?= $descripcion ?> </p>


    <br>

    <h3>Servicios que ofrecemos:</h3>
    <ul>
      <?php foreach($servicios as $servicio => $ofrecido) {?>
        <?php if($ofrecido) {?>
        <li> <?= $servicio ?> </li>
        <?php } ?>
      <?php } ?>
    </ul>

  </div>

  <div class="col-lg-4 col-sm-4 col-md-4">
    <?php view('map.php'); ?>
  </div>

</div>

<div class="row">
  <div id="carouselExample" class="carousel slide col-lg-12 col-sm-12 col-md-12" data-ride="carousel">
    <div class="carousel-inner">
      <?php for ($i = 0; $i < count($imagenes); $i = $i + 1){ ?>
      <?php $link_imagen = $imagenes[$i]; ?>
      <div class="carousel-item <?php if($i == 0) echo "active"?>">
        <img class="image" src="<?= routeFiles . $link_imagen ?>">
      </div>
      <?php } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>