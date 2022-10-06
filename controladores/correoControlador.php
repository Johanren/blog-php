<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CorreoControlador{
	static public function ctrEnviarCorreo(){
		if (isset($_POST['Enviar'])) {
			//Create an instance; passing `true` enables exceptions
			
			if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST['nombreContacto']) && 
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$_POST['emailContacto']) && 
				preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST['mensajeContacto'])) {
				$mail = new PHPMailer(true);
			try {

				    //Recipients
				$mail->setFrom($_POST['emailContacto'], $_POST['nombreContacto']);
				    $mail->addAddress('feliperenjifoz@gmail.com', 'juanito');     //Add a recipient
				                  //Name is optional
				    $mail->addReplyTo($_POST['emailContacto'], $_POST['nombreContacto']);

				    
				    //Content
				    $mail->isHTML(true);                                  //Set email format to HTML
				    $mail->Subject = 'Blog viajero';
				    $mail->Body    = '<div>Prueba email</div>';
				    $mail->AltBody = $_POST['mensajeContacto'];

				    $mail->send();
				    return 'ok';
				} catch (Exception $e) {
					return "error";
				}
			}else{
				return "error-sintaxis";
			}
		}
	}
}


