<?php
	include_once 'header.php';
?>

<br /><br />
<h4>Escoja las restricciones o facilidades con las que debe contar la oferta o promoción</h4>


<form action="#">
	<label>Para facilitarle el trabajo puede escojer un estereotipo, el cual carga una lista de restricciones o facilidades por defecto</label>
	<br />
	<label>Estereotipo: </label>
	<select class="form-control" id="estereotipo">
		<option value="p">Personalizado</option>
	<?php foreach ($vars['estereotipos'] as $e => $value) {
		echo '<option value="'. $value[0] .'">' . $value[0] . '</option>';
	} ?>
	</select>
</form>
<br />

<form action="?controller=Recommendation&action=buscarRecomendaciones" method="post">

	<h4>Restricciones o facilidades</h4> 
	<br />

	<?php foreach ($vars['servicios'] as $key => $servicio) { ?>
		<div class="clickable">
			<label> 
				<input type="checkbox" name="<?= ("cbx".$key) ?>"/>
				<?= $servicio ?> 
			</label>
		</div>
	<?php } ?>
	<br />
	<input type="submit" name="buscar" value="Buscar ofertas o promociones" class="btn btn-primary">

</form>


<?php
  	include_once 'footer.php';
?>