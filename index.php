<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ControladorBloc.php";
require_once "controladores/correoControlador.php";
require_once "modelos/conexion.php";
require_once "modelos/modeloBlog.php";

require_once "extenciones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();