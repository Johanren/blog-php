<div class="container-fluid bg-white">
	<div class="container py-4">
		<div class="row">
			<div class="col-12 col-md-6">
				<?php  
				echo $respuesta["sobre_mi_completo"];
				?>
			</div>
			<div class="col-12 col-md-6">
				<h4 class="mt-4">Contactenos</h4>
				<form method="post">
					<input type="text" name="nombreContacto" placeholder="Nombre y apellido" required="" class="form-control my-1">
					<input type="email" name="emailContacto" placeholder="Escriba su correo electronico" required="" class="form-control my-1">

					<textarea name="mensajeContacto" cols="30" rows="10" class="form-control"></textarea>
					<input type="submit" value="Enviar" name="Enviar" class="btn btn-primary my-1">

					<?php  
					$correo = new CorreoControlador();
					$enviarCorreo = $correo->ctrEnviarCorreo();
					if ($enviarCorreo != "") {
						echo '<script>
						if (window.history.replaceState){
							window.history.replaceState(null, null, window.location.href);
						}
						</script>';
						if ($enviarCorreo == "ok") {
							echo '<script>
							notie.alert({
								type: 1,
								text: "El mensaje ha sido enviado correctamente espere muy pronto una respuesta",
								time: 10										
								})
								</script>';
							}
							if ($enviarCorreo == "error") {
								echo '<script>
								notie.alert({
									type: 3,
									text: "El mensaje no se puedo enviar correctamente intentelo más tarde",
									time: 10										
									})
									</script>';
								}
								if ($enviarCorreo == "error-sintaxis") {
								echo '<script>
								notie.alert({
									type: 3,
									text: "Error, no se permite caracteres especiales, intentelo nuevamente",
									time: 10										
									})
									</script>';
								}
							}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
