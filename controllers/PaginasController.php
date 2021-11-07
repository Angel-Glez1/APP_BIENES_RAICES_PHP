<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {

	public static function index(Router $router){

		$propiedades = Propiedad::get();
		$router->render('pages/index', ['propiedades' => $propiedades, 'pageHome'=>  true]);
	}


	public static function nosotros(Router $router){
		
		$router->render('pages/nosotros');
	}


	public static function propiedades(Router $router){

		$propiedades = Propiedad::all();

		$router->render('pages/propiedades', [
			'propiedades' => $propiedades
		]);
	}


	public static function propiedad(Router $router){


		$id = validarORedireccionar('/');

		$propiedad = Propiedad::find($id);

		$router->render('pages/propiedad', [
			'propiedad' => $propiedad
		]);
	}


	public static function blog(Router $router){
		$router->render('pages/blog');
	}


	public static function entrada(Router $router){
		$router->render('pages/entrada');
	}


	public static function contacto(Router $router){
		
		$errores = [];
		$exito = false;

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			
			$mail = new PHPMailer(true);

			try {
				
				$mail->isSMTP();
				$mail->Host = 'smtp.mailtrap.io';
				$mail->SMTPAuth = true;
				$mail->Port = 2525;
				$mail->Username = '22290db50ffa8f';
				$mail->Password = '772709b28bf518'; 
				$mail->SMTPSecure = 'tls';

				//Recipients
				$mail->setFrom('admin@bienes-raices.com'); // Quien envia el email;
				$mail->addAddress('cliente@cliente.com', 'Bienes Raices'); // Email a donde se va a mandar     
				$mail->Subject = 'Tienes un nuevo mensaje de Bienes Raices.com';
				
				//Content
				$mail->isHTML(true);                             
				$mail->CharSet = 'UTF-8';
				$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				$mail->send();
				$exito = true;

			} catch (\Exception $e) {

				$errores[] = $mail->ErrorInfo;
			}
		}

		$router->render('pages/contacto', ['errores' => $errores , 'exito' => $exito]);
	}



}


