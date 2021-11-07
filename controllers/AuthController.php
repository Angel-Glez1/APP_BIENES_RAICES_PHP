<?php


namespace Controllers;

use GuzzleHttp\Psr7\Header;
use Model\Admin;
use MVC\Router;

class AuthController {


	public static function login(Router $router){

		$errores = [];
		
		if($_SERVER['REQUEST_METHOD'] === 'POST'){

			$auth = new Admin($_POST);

			$errores = $auth->validar();

			if(empty($errores)){
				$result = $auth->exiteUsuario();

				if(!$result){

					$errores = Admin::getErrores();

				} else {

					$isAuth =  $auth->comprobarPassword($result);

					if(!$isAuth){
						$errores[] = Admin::getErrores();

					}else{

						$auth->autenticar();
						// header('Location: /admin');

						
					}
				}
			}

		}
		
		$router->render('auth/login', ['errores' => $errores]);
	}

	public static function logout(){
	
		session_start();

		$_SESSION = [];

		header('Location: /');

	}



}