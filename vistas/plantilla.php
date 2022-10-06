<?php  
$blog = new ControladorBloc();
$respuesta = $blog -> ctrMostrarBloc();
$categorias = $blog -> ctrMostrarCategorias(null, null);
$articulo = $blog->ctrMostrarConInnerJoin(0, 5, null, null);
$totalarticulo = $blog->ctrMostrarTotalArticulo(null, null);
$totalPagina = ceil(count($totalarticulo)/5);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">


	<?php  
	$validarRuta = "";
	if (isset($_GET['action'])) {
		$rutas = explode("/", $_GET['action']);
		foreach ($categorias as $key => $value) {
			if (!is_numeric($rutas[0]) && $rutas[0] == $value['ruta_categoria'] && !is_numeric($rutas[0])) {
				$validarRuta = "categorias";
				break;
			}
		}
		if (isset($rutas[1])) {
			foreach ($totalarticulo as $key => $value) {
				if (!is_numeric($rutas[1]) && $rutas[1] == $value['ruta_articulo']) {
					$validarRuta = "articulos";
					break;
				}
			}

		}
		
		if ($validarRuta == "categorias") {
			echo '<title>'.$respuesta["titulo"].' | '.$value["descripcion_categoria"].'</title>
			<meta name="title" content="'.$value["titulo_categoria"].'">
			<meta name="descripcion" content="'.$value["descripcion_categoria"].'">';
			echo '<meta property="og:site_name" content="'.$value["titulo_categoria"].'">
			<meta property="og:title" content="'.$value["titulo_categoria"].'">
			<meta property="og:description" content="'.$value["descripcion_categoria"].'">
			<meta property="og:type" content="Type">
			<meta property="og:image" content="'.$respuesta["dominio"].$value["img_categoria"].'">
			<meta property="og:url" content="'.$respuesta["dominio"].$value["ruta_categoria"].'">';
			$palabras_claves = json_decode($value["p_claves_categoria"], true);
			$p_claves = "";
			foreach ($palabras_claves as $key => $value) {
				$p_claves .= $value.", ";

			}
			$p_claves = substr($p_claves, 0, -2);
			echo '<meta name="keywords" content="'.$p_claves.'">';
			
		}elseif ($validarRuta == "articulos") {
			echo '<title>'.$respuesta["titulo"].' | '.$value["titulo_articulo"].'</title>
			<meta name="title" content="'.$value["titulo_articulo"].'">
			<meta name="descripcion" content="'.$value["descripcion_articulo"].'">';
			echo '<meta property="og:site_name" content="'.$value["titulo_articulo"].'">
			<meta property="og:title" content="'.$value["titulo_articulo"].'">
			<meta property="og:description" content="'.$value["descripcion_articulo"].'">
			<meta property="og:type" content="Type">
			<meta property="og:image" content="'.$respuesta["dominio"].$value["portada_articulo"].'">
			<meta property="og:url" content="'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'">';
			$palabras_claves = json_decode($value["p_claves_articulo"], true);
			$p_claves = "";
			foreach ($palabras_claves as $key => $value) {
				$p_claves .= $value.", ";

			}
			$p_claves = substr($p_claves, 0, -2);
			echo '<meta name="keywords" content="'.$p_claves.'">';
			
		}else{
			echo '<title>'.$respuesta["titulo"].'</title>
			<meta name="title" content="'.$respuesta["titulo"].'">
			<meta name="descripcion" content="'.$respuesta["descripcion"].'">';
			$palabras_claves = json_decode($respuesta["palabras_claves"], true);
			$p_claves = "";
			foreach ($palabras_claves as $key => $value) {
				$p_claves .= $value.", ";

			}
			$p_claves = substr($p_claves, 0, -2);
			echo '<meta name="keywords" content="'.$p_claves.'">';
			echo '<meta property="og:site_name" content="'.$respuesta["titulo"].'">
			<meta property="og:title" content="'.$respuesta["titulo"].'">
			<meta property="og:description" content="'.$respuesta["descripcion"].'">
			<meta property="og:type" content="Type">
			<meta property="og:image" content="'.$respuesta["dominio"].$respuesta["portada"].'">
			<meta property="og:url" content="'.$respuesta["dominio"].'">';
		}
	}else{
		echo '<title>'.$respuesta["titulo"].'</title>
		<meta name="title" content="'.$respuesta["titulo"].'">
		<meta name="descripcion" content="'.$respuesta["descripcion"].'">';
		$palabras_claves = json_decode($respuesta["palabras_claves"], true);
		$p_claves = "";
		foreach ($palabras_claves as $key => $value) {
			$p_claves .= $value.", ";

		}
		$p_claves = substr($p_claves, 0, -2);
		echo '<meta name="keywords" content="'.$p_claves.'">';
		echo '<meta property="og:site_name" content="'.$respuesta["titulo"].'">
		<meta property="og:title" content="'.$respuesta["titulo"].'">
		<meta property="og:description" content="'.$respuesta["descripcion"].'">
		<meta property="og:type" content="Type">
		<meta property="og:image" content="'.$respuesta["dominio"].$respuesta["portada"].'">
		<meta property="og:url" content="'.$respuesta["dominio"].'">';
	}
	?>

	<link rel="icon" href="<?php echo $respuesta["dominio"]; ?>vistas/img/icono.jpg">

	<!--=====================================
	PLUGINS DE CSS
	======================================-->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css?family=Chewy|Open+Sans:300,400" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

	<!-- JdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<link rel="stylesheet" href="<?php echo $respuesta["dominio"]; ?>vistas/css/plugins/jquery.jdSlider.css">

	<link rel="stylesheet" href="<?php echo $respuesta["dominio"]; ?>vistas/css/style.css">
	<link rel="stylesheet" href="<?php echo $respuesta["dominio"]; ?>vistas/css/plugins/notie.min.css">

	<!--=====================================
	PLUGINS DE JS
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<!-- JdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<script src="<?php echo $respuesta["dominio"]; ?>vistas/js/plugins/jquery.jdSlider-latest.js"></script>
	
	<!-- pagination -->
	<!-- http://josecebe.github.io/twbs-pagination/ -->
	<script src="<?php echo $respuesta["dominio"]; ?>vistas/js/plugins/pagination.min.js"></script>

	<!-- scrollup -->
	<!-- https://markgoodyear.com/labs/scrollup/ -->
	<!-- https://easings.net/es# -->
	<script src="<?php echo $respuesta["dominio"]; ?>vistas/js/plugins/scrollUP.js"></script>
	<script src="<?php echo $respuesta["dominio"]; ?>vistas/js/plugins/notie.min.js"></script>
	<script src="<?php echo $respuesta["dominio"]; ?>vistas/js/plugins/jquery.easing.js"></script>

</head>

<body>

	<?php 

	/*=============================================
	Módulos fijos superiores
	=============================================*/	

	include "paginas/modulos/cabecera.php";
	include "paginas/modulos/redes-sociales-movil.php";	
	include "paginas/modulos/buscador-movil.php";	
	include "paginas/modulos/menu.php";	

	/*=============================================
	Navegar entre páginas
	=============================================*/	
	$validarRuta = '';
	if (isset($_GET['action'])) {
		$rutas = explode("/", $_GET['action']);
		if(is_numeric($rutas[0])){

			$desde = ($rutas[0] -1)*5;
			$cantidad = 5;
			$articulo = $blog->ctrMostrarConInnerJoin($desde, $cantidad, null, null);
		}else{
			foreach ($categorias as $key => $value) {
				if ($rutas[0] == $value["ruta_categoria"]) {
					$validarRuta = "categorias";
					break;
				}elseif ($rutas[0] == "sobre-mi") {
					$validarRuta = "sobre-mi";
					break;
				}else{
					$validarRuta="buscador";
				}
			}

		}
		if (isset($rutas[1])) {
			if(is_numeric($rutas[1])){

				$desde = ($rutas[1] -1)*5;
				$cantidad = 5;
				$articulo = $blog->ctrMostrarConInnerJoin($desde, $cantidad, null, null);
			}else{
				foreach ($totalarticulo as $key => $value) {
					if ($rutas[1] == $value["ruta_articulo"]) {
						$validarRuta = "articulos";
						break;
					}
				}

			}
		}
		if ($validarRuta == "categorias") {
			include "paginas/categorias.php";
		}elseif($validarRuta == "sobre-mi"){
			include "paginas/sobre-mi.php";
		}elseif($validarRuta == "buscador"){
			include "paginas/buscador.php";
		}elseif($validarRuta == "articulos"){
			include "paginas/articulos.php";
		}elseif (is_numeric($rutas[0]) && $rutas[0] <= $totalPagina) {
			include "paginas/inicio.php";
		}elseif(isset($rutas[1])&&!is_numeric($rutas[1])){
			include "paginas/404.php.php";
		}else{
			include "paginas/404.php";
		}
	}else{
		include "paginas/inicio.php";
	}


	/*=============================================
	Módulos fijos inferiores
	=============================================*/	

	include "paginas/modulos/footer.php";


	?>
	<input type="hidden" id="rutaActual" value="<?php echo $respuesta["dominio"]; ?>">
	<script src="<?php echo $respuesta["dominio"]; ?>vistas/js/script.js"></script>

</body>
</html>