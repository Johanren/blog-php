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
					<input type="submit" value="Enviar" name="" class="btn btn-primary my-1">
				</form>
			</div>
		</div>
	</div>
</div>
