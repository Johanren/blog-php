<!--=====================================
REDES SOCIALES PARA MÓVIL
======================================-->

<div class="d-block d-md-none redes redesMovil p-0 bg-white w-100 pt-2">

	<ul class="d-flex justify-content-center p-0">
		<?php 	
		$redesSociales = json_decode($respuesta['redes_sociales'], true);

		foreach ($redesSociales as $key => $value) {
			print('<li>
				<a href="'.$value["url"].'" target="_blank">
				<i class="'.$value["icono"].' lead rounded-circle text-white mr-3 mr-sm-4"></i>
				</a>
				</li>');
		}
		?>

	</ul>

</div>