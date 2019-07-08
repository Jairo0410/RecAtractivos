<?php
	include_once 'header.php';
?>

<h2>Agregar archivos al atractivo</h2>

<form action="?controller=Place&action=agregarImagenAtractivo&id=<?php echo $vars['id'] ?>" method="post" enctype="multipart/form-data">

    <input type="file" name="archivo[]" multiple="multiple">

    <input type="submit" value="Agregar"  class="trig">

</form>


<?php
  	include_once 'footer.php';
?>