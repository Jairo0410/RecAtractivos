<?php
// variables para la conexion con la base de datos
define("BD_TYPE", "mysql");
define("host", "sql9.freemysqlhosting.net");
define("user", "sql9296819");
define("password", "xphmJ9rmy2");
define("default_schema", "sql9296819");

define("GOOGLE_MAPS_API_KEY", "AIzaSyCvKIF8uhB8umbV0gBZpHYX2CF7xL2Zfdc");

// tablas base de datos
define("TBL_LUGAR", "Lugar");
define("TBL_USUARIO", "Usuario");
define("TBL_LUGAR_ESTILO", "Lugar_Pertenece_Estilo");

// constantes para el manejo de las diferentes carpetas
define("ROOT", __DIR__."/../");
define("routeController",  __DIR__."/../controller/");
define("routeModel",  __DIR__."/../model/");
define("routeView",  __DIR__."/../view/");
define("routeLibs", __DIR__."/../libs/");
define("routeDomain", __DIR__."/../domain/");
?>
