<?php include "modulos/banner-interno.php"; ?>
<br><br><br><br><br><br><br><br><br>
<div class="text-center">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>Oops!</h1>
                <img src ="<?php echo $respuesta["dominio"]; ?>vistas/img/error404.webp" width="100">
                <h2>404 No encontrado</h2>
                <div class="error-details">
                    Lo sentimos, ha ocurrido un error, ¡la página solicitada no se encuentra!
                </div>
                <br>
                <div class="error-actions">
                    <a href="<?php echo $respuesta["dominio"]; ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Inicio </a><a href="http://www.jquery2dotnet.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Soporte de contacto </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>