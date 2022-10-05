<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ControladorBloc.php";
require_once "modelos/conexion.php";
require_once "modelos/modeloBlog.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();