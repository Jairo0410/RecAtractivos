<?= view('header.php'); ?>

<?php
	include_once 'header.php';
?>

<br /><br />
<h3 class="text-center">Agregar un nuevo atractivo</h3>

<form>
	<label>Nombre del atractivo: </label>
	<input type="text" class="form-control" name="nombre">
	<br />

	<label>Descripción de la oferta o promoción: </label>
	<textarea rows="5" cols="50" class="form-control" name="descripcion"></textarea>
	<br />

	<hr>
	<h5>Ubicación</h5>
	
	<label>Latitud: </label>
	<input type="number" class="form-control" name="latitud">
	<br />

	<label>Longitud: </label>
	<input type="number" class="form-control" name="longitud">
	<br />

	<hr>
	<h5>Servicios con los que dispone el atractivo</h5>
	<br />

	<?php foreach ($vars['servicios'] as $s => $value) {
		echo '<label><input type="checkbox" id="" value="'. $value[0] .'"> ' . $value[1] . '</label><br>';
	} ?>
	<br />
	<input type="submit" name="agregar" id="agregar" value="Agregar atractivo" class="btn btn-primary">

	<br /><br /><br /><br /><br />

</form>

<?= view('footer.php'); ?>