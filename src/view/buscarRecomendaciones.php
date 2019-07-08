<?= view('header.php') ?>

<?php 
$atractivos = isset($vars['atractivos']) ? $vars['atractivos'] : array();
?>

<script type="text/javascript">
	function mostrarAtractivo(idAtractivo){
		$.ajax({
			url: "?controller=Place&action=default&id=" + idAtractivo,
			success: function(result) {
				var pub = document.getElementById("contents")
				pub.innerHTML = result
			}
    	})
	}
</script>

<h3 class="text-center">Le recomendamos las siguientes ofertas y promociones</h3>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4">
	<?php 
	foreach ($atractivos as $key => $atractivo) { ?>
		<button class="btn form-control" onclick="mostrarAtractivo(<?= $atractivo["Id_Lugar"] ?>)">
			<?= $atractivo["Nombre"] ?> 
		</button>
	<?php } ?>
	</div> <!-- aside div -->

	<div id="contents" class="col-lg-8 col-md-8 col-sm-8">
		<h2>Seleccione alguno de los resultados para ver sus detalles</h2>
	</div> <!-- content div-->
</div> <!-- div row -->



<?= view('footer.php') ?>