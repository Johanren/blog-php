<?php 

require_once "conexion.php";

class ModeloBlog{
	static public function mdlMostrarBlog($tabla){
		$conn = new Conexion();
		$stmt = $conn->conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	static public function mdlMostrarCategorias($tabla, $item, $valor){
		if ($item != null & $valor != null) {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare("SELECT * FROM $tabla WHERE $item = ?");
			$stmt->bindParam(1, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}else{
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}
	}

	static public function mdlMostrarConInnerJoin($tabla, $tabla1, $count, $desde, $item, $valor){
		if ($item == null && $valor == null) {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare("SELECT $tabla.*, $tabla1.*, date_format(fecha_articulo, '%d.%m.%y') AS fecha_articulo FROM $tabla INNER JOIN $tabla1 ON $tabla.id_categoria = $tabla1.id_cat ORDER BY $tabla1.id_articulo DESC LIMIT $desde, $count");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}else{
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare("SELECT $tabla.*, $tabla1.*, date_format(fecha_articulo, '%d.%m.%y') AS fecha_articulo FROM $tabla INNER JOIN $tabla1 ON $tabla.id_categoria = $tabla1.id_cat WHERE $item = ? ORDER BY $tabla1.id_articulo DESC LIMIT $desde, $count");
			$stmt->bindParam(1,$valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}
		
	}

	static public function mdlMostrarTotalArticulo($tabla, $item, $valor){
		if ($item == null & $valor == null) {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}else{
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare("SELECT * FROM $tabla WHERE $item = ? ORDER BY id_articulo DESC");
			$stmt->bindParam(1, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}
		
	}

	static public function mdlMostrarOpciones($tabla, $tabla1, $item, $valor){
		$conn = new Conexion();
		$stmt = $conn->conectar()->prepare("SELECT * FROM opiniones INNER JOIN administradores ON opiniones.id_adm = administradores.id_admin WHERE $item = ?");
		$stmt->bindParam(1,$valor, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	static public function mdlRegistrarOpcion($tabla, $datos){
		$conn = new Conexion();
		$stmt = $conn->conectar()->prepare("INSERT INTO $tabla (id_art, nombre_opinion, correo_opinion, foto_opinion, contenido_opinion, id_adm) VALUES (?,?,?,?,?,?)");
		$stmt->bindParam(1,$datos['id_cat'], PDO::PARAM_INT);
		$stmt->bindParam(2,$datos['nombre_opinion'], PDO::PARAM_STR);
		$stmt->bindParam(3,$datos['correo_opinion'], PDO::PARAM_STR);
		$stmt->bindParam(4,$datos['foto_opinion'], PDO::PARAM_STR);
		$stmt->bindParam(5,$datos['contenido_opinion'], PDO::PARAM_STR);
		$stmt->bindParam(6,$datos['id_admin'], PDO::PARAM_INT);
		if ($stmt->execute()){
			return "ok";
		}
		$stmt->close();
	}

	static public function mdlActualizaVista($tabla, $valor, $ruta){
		$conn = new Conexion();
		$stmt = $conn->conectar()->prepare("UPDATE $tabla SET vistas_articulo = ? WHERE ruta_articulo = ?");
		$stmt->bindParam(1,$valor, PDO::PARAM_INT);
		$stmt->bindParam(2,$ruta, PDO::PARAM_STR);
		if ($stmt -> execute()) {
			return "ok";
		}
		$stmt->close();
	}

	static public function mdlArticuloDestacado($tabla, $item, $valor){
		if ($item != null && $valor != null) {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare("SELECT * FROM $tabla WHERE $item = ? ORDER BY vistas_articulo DESC LIMIT 3");
			$stmt->bindParam(1, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}else{
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare("SELECT * FROM $tabla ORDER BY vistas_articulo DESC LIMIT 3");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}
	}
}