<?php 
Class ControladorBloc{
	static public function ctrMostrarBloc(){
		$tabla = "blog";

		$respuesta = new ModeloBlog();
		$res = $respuesta->mdlMostrarBlog($tabla);

		return $res;
	}

	static public function ctrMostrarCategorias($item, $valor){
		$tabla = "categorias";

		$respuesta = new ModeloBlog();
		$res = $respuesta->mdlMostrarCategorias($tabla, $item, $valor);

		return $res;
	}

	static public function ctrMostrarConInnerJoin($desde, $count, $item, $valor){

		$tabla ="categorias";
		$tabla1 = "articulos";

		$respuesta = new ModeloBlog();
		$res = $respuesta->mdlMostrarConInnerJoin($tabla, $tabla1, $count, $desde, $item, $valor);
		return $res;

	}

	static public function ctrMostrarTotalArticulo($item, $valor){
		$tabla = "articulos";
		$respuesta = new ModeloBlog();
		$res = $respuesta->mdlMostrarTotalArticulo($tabla, $item, $valor);
		return $res;
	}

	static public function ctrMostrarOpiniciones($item, $valor){
		$tabla = "opciones";
		$tabla1 = "administradores";
		$respuesta = new ModeloBlog();
		$res = $respuesta->mdlMostrarOpciones($tabla, $tabla1, $item, $valor);
		return $res;
	}

	static public function ctrRegistrarOpcion(){
		if (isset($_POST['enviar'])) {
			if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST['nombre']) && 
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$_POST['email'])/* && 
			preg_match('/^[=\\$\\;\\*\\"\\?\\¿\\!\\¡\\:\\.\\,\\0-9zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST['comentario'])*/) {

				/*validacion foto*/

			if (isset($_FILES['fotoOpinion']["tmp_name"]) && !empty($_FILES['fotoOpinion']["tmp_name"])) {
				list($ancho, $alto) = getimagesize($_FILES['fotoOpinion']["tmp_name"]);
				$nuevoAncho = 128;
				$nuevoAlto = 128;

				$directorio = "vistas/img/usuarios/";

				if ($_FILES['fotoOpinion']['type'] == "image/jpeg") {

					$aleatorio = mt_rand(100, 9999);

					$ruta = $directorio.$aleatorio.".jpg";
					$origen = imagecreatefromjpeg($_FILES['fotoOpinion']["tmp_name"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $ruta);

				}else if($_FILES['fotoOpinion']['type'] == "image/png"){
					$aleatorio = mt_rand(100, 9999);

					$ruta = $directorio.$aleatorio.".png";
					$origen = imagecreatefrompng($_FILES['fotoOpinion']["tmp_name"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagealphablending($destino, false);
					imagesavealpha($destino, true);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $ruta);
				}else{
					return "error-formato";
				}
			}else{
				$ruta = "vistas/img/usuarios/user01.jpg";
			}


			$tabla = "opiniones";
			$datos = array("id_cat" => $_POST['id_cat'],
				"nombre_opinion" => $_POST['nombre'],
				"correo_opinion" => $_POST['email'],
				"foto_opinion" => $ruta,
				"contenido_opinion" => $_POST['comentario'],
				"id_admin" => 1);
			$respuesta = new ModeloBlog();
			$res = $respuesta->mdlRegistrarOpcion($tabla, $datos);
			return $res;
		}else{
			return "error";
		}
	}
}

static public function ctrActualizaVista($ruta){
	$blog = new ControladorBloc();
	$articulo = $blog->ctrMostrarConInnerJoin(0, 1, "ruta_articulo", $ruta);
	$valor = $articulo[0]["vistas_articulo"] + 1;
	$tabla = "articulos";
	$respuesta = new ModeloBlog();
	$res = $respuesta->mdlActualizaVista($tabla, $valor, $ruta);
	
}

static public function ctrArticulosDestacados($item, $valor){
	$tabla = "articulos";
	$respuesta = new ModeloBlog();
	$res = $respuesta->mdlArticuloDestacado($tabla, $item, $valor);
	return $res;
}

}