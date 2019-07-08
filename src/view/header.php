<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="public/css/map.css">
    <script src="public/js/bootstrap.min.js"></script>
    
    <title><?= isset($title) ? $title : "Proyecto Web Expertos"; ?></title>
  </head>
  <body style="background-image: url('public/assets/background.jpg');  background-attachment: fixed;">
  <?= view('navbar.php'); ?>
    <div class="container-fluid" style="background-color: rgba(255, 255, 255, 0.7)">
    	
    