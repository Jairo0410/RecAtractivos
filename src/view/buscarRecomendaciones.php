<?php
	include_once 'header.php';
?>

<h3 class="text-center">Le recomendamos las siguientes ofertas y promociones</h3>

<?php 
	foreach ($vars['atractivos'] as $key => $value) { ?>
		<a class="btn form-control" href="?controller=Place&action=default&id=<?= $value[0] ?>"> <?= $value[1]  ?> </a>;
		<br><br>
<?php } ?>

<?php
  	include_once 'footer.php';
?>