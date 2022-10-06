<!--=====================================
FOOTER
======================================-->
<?php $categorias = $blog -> ctrMostrarCategorias(null, null); ?>
<footer class="container-fluid py-5 d-none d-md-block">
	
	<div class="container">
		
		<div class="row">

			<!-- GRID CATEGORÍAS FOOTER -->
			
			<div class="col-md-7 col-lg-6">
				
				<div class="p-1 bg-white gridFooter">

					<div class="container p-0">

						<div class="d-flex">

							<div class="d-flex flex-column columna1">

								<figure class="p-2 m-0 photo1" vinculo="<?php echo $categorias[0]["ruta_categoria"]; ?>" style="background:url(<?php echo $respuesta["dominio"]; ?><?php echo $categorias[0]["img_categoria"]; ?>);">
									
									<p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?php echo $categorias[0]["titulo_categoria"]; ?></p>

								</figure>

								<figure class="p-2 m-0 photo2" vinculo="<?php echo $categorias[4]["ruta_categoria"]; ?>" style="background:url(<?php echo $respuesta["dominio"]; ?><?php echo $categorias[4]["img_categoria"]; ?>);">
									
									<p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?php echo $categorias[4]["titulo_categoria"]; ?></p>

								</figure>								

							</div>

							<div class="d-flex flex-column flex-fill columna2">

								<div class="d-block d-md-flex">

									<figure class="p-2 m-0 flex-fill photo3" vinculo="<?php echo $categorias[5]["ruta_categoria"]; ?>" style="background:url(<?php echo $respuesta["dominio"]; ?><?php echo $categorias[5]["img_categoria"]; ?>);">

										<p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?php echo $categorias[5]["titulo_categoria"]; ?></p>
										
									</figure>

									<figure class="p-2 m-0 flex-fill photo4" vinculo="<?php echo $categorias[1]["ruta_categoria"]; ?>" style="background:url(<?php echo $respuesta["dominio"]; ?><?php echo $categorias[1]["img_categoria"]; ?>);">
										
										<p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?php echo $categorias[1]["titulo_categoria"]; ?></p>

									</figure>

								</div>

								<figure class="p-2 m-0 photo5" vinculo="<?php echo $categorias[3]["ruta_categoria"]; ?>" style="background:url(<?php echo $respuesta["dominio"]; ?><?php echo $categorias[3]["img_categoria"]; ?>);">

									<p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?php echo $categorias[3]["titulo_categoria"]; ?></p>
									
								</figure>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="d-none d-lg-block col-lg-1 col-xl-2"></div>

			<!-- NEWLETTER -->

			<div class="col-md-5 col-lg-5 col-xl-4 pt-5">
				
				<h6 class="text-white">Inscríbete en nuestro newletter:</h6>

				<div class="input-group my-4">

					<!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-071822.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;  width:600px;}
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
    <form action="https://gmail.us14.list-manage.com/subscribe/post?u=ee2025a548313021dc1fdca9b&amp;id=95abe42157&amp;f_id=00c182e0f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
        <h2>Subscribe</h2>
        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required>
	<span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
</div>
	<div id="mce-responses" class="clear foot">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ee2025a548313021dc1fdca9b_95abe42157" tabindex="-1" value=""></div>
        <div class="optionalParent">
            <div class="clear foot">
                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                <p class="brandingLogo"></p>
            </div>
        </div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
					
					<input type="text" class="form-control" placeholder="Ingresa tu Email">

					<div class="input-group-append">
						
						<span class="input-group-text bg-dark text-white">Inscribirse</span>

					</div>

				</div>

				<div class="p-0 w-100 pt-2">

					<ul class="d-flex justify-content-left p-0">
						<?php 	
						$redesSociales = json_decode($respuesta['redes_sociales'], true);

						foreach ($redesSociales as $key => $value) {
							print('<li>
								<a href="'.$value["url"].'" target="_blank">
								<i class="'.$value["icono"].' lead text-white mr-3 mr-sm-4"></i>
								</a>
								</li>');
						}
						?>
						
					</ul>

				</div>

			</div>

		</div>

	</div>

</footer>