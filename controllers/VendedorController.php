<?php 

namespace Controllers;

use Model\Vendedor;
use MVC\Router;


class VendedorController {


	public static function crear(Router $router){

		$vendedor = new Vendedor();
		$errores =  Vendedor::getErrores();

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$vendedor = new Vendedor($_POST['vendedor']);

			$errores = $vendedor->validar();

			if (empty($errores)) {

				$vendedor->guardar();
			}
		}


		$router->render('vendedores/crear', [
			'vendedor' => $vendedor,
			'errores' => $errores 
		]);

	}


	public static function actualizar(Router $router){

		$id = validarORedireccionar('/admin');

		$vendedor = Vendedor::find($id);
		$errores = Vendedor::getErrores();
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$args = $_POST['vendedor'];

			$vendedor->sincronizar($args);

			$errores = $vendedor->validar();

			if (empty($errores)) {

				$vendedor->guardar();
			}
		}

		$router->render('vendedores/actualizar', [
			'vendedor' => $vendedor,
			'errores' => $errores
		]);
	}

	public static function destroy(){

		// Elimnar
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			// Obtener el id para actulizar.
			$id = $_POST['id'];
			$id = filter_var($id, FILTER_VALIDATE_INT);

			if(!$id){
				header('Location: /admin');
			}

			$tipo = $_POST['tipo'];


			if (validarTipoContenido($tipo)) {

				$vendedor = Vendedor::find($id);
				$vendedor->eliminar();
			}
		}
	}
}

