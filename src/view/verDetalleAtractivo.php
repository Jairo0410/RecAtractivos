<?php
	view('header.php');
    $atractivo = $vars['atractivo'];
    $servicios = isset($vars['servicios']) ? $vars['servicios'] : array();
?>

	<h2 class="text-center"><?= $atractivo->getNombre(); ?></h2>

	<h4>Descripción de la oferta / promoción</h4>
	<p><?php echo $atractivo[4]; ?></p>

	<h4>Facilidades con las que dispone</h4>

    <?php print_r($servicios); ?>

	<ol>
		<?php foreach ($servicios as $key => $value) { ?>
			<li> <?= $key .' : '. $value ?> </li>
		<? } ?>
	</ol>


	<h4>Ubicación</h4>

    <div id="map_canvas" style="width:700px;height:500px;"></div> 
    <script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript">
        var latlng = new google.maps.LatLng(<?php echo $atractivo[2] ?>, <?php echo $atractivo[3] ?>);
        var myOptions = {
            zoom: 14,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        var marker = new google.maps.Marker({
            position: latlng,
            title: '<?php echo $atractivo[1] ?>',
            draggable: true
        });
        marker.setMap(map);
        var popup = new google.maps.InfoWindow({
            content: '<?php echo $atractivo[1] ?>',
            position: latlng
        });
        popup.open(map);
    </script>

<?= view('footer.php') ?>