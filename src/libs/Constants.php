<?php
// variables para la conexion con la base de datos
define("BD_TYPE", "mysql");
define("host", "remotemysql.com");
define("user", "e65zwlNc8m");
define("password", "9DArryFsBS");
define("default_schema", "e65zwlNc8m");

define("GOOGLE_MAPS_API_KEY", "AIzaSyCvKIF8uhB8umbV0gBZpHYX2CF7xL2Zfdc");

// tablas base de datos
define("TBL_LUGAR", "Lugar");
define("TBL_IMAGEN_ATRACTIVO", "Lugar_Imagen");
define("TBL_VIDEO_ATRACTIVO", "Lugar_Video");
define("TBL_USUARIO", "Usuario");
define("TBL_LUGAR_ESTILO", "Lugar_Pertenece_Estilo");

// constantes para el manejo de las diferentes carpetas
define("ROOT", __DIR__."/../");
define("routeController",  __DIR__."/../controller/");
define("routeModel",  __DIR__."/../model/");
define("routeView",  __DIR__."/../view/");
define("routeLibs", __DIR__."/../libs/");
define("routeDomain", __DIR__."/../domain/");
define("routeFiles", __DIR__."/../files/");

define("IMAGENES_PERMITIDAS", array("image/jpeg", "image/png"));
define("VIDEOS_PERMITIDOS", array("video/3gpp"));
?>
