<?php view('header.php') ?>

<div class="text-center">
  <h1>Error 404 - Not Found</h1>
  <h2>
  <?= isset($vars['message']) ? $vars['message'] : ''; ?>
  </h2>
</div>



<?php view('footer.php') ?>