<?php

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{


	public static function index(Router $router)
	{

		$propiedades = Propiedad::all();
		$vendedores = Vendedor::all();

		$resultado = $_GET['resultado'] ?? '';

		$router->render('propiedades/admin', [
			'propiedades' => $propiedades,
			'vendedores' => $vendedores,
			'resultado' => $resultado
		]);
	}


	public static function crear(Router $router)
	{
		$propiedad = new Propiedad();
		$vendedores = Vendedor::all();
		$errores = Propiedad::getErrores();


		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Nueva Instancia
			$propiedad = new Propiedad($_POST['propiedad']);

			// Crear un nombre unico si se manda archivo.
			$nameImg =  md5(uniqid(rand(), true)) . '.jpg';



			// Realiza un risaze 
			if ($_FILES['propiedad']['tmp_name']['imagen']) {

				// Con make obtener el archivo
				$image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
				$propiedad->setImagen($nameImg);
			}


			$errores = $propiedad->validar();


			if (empty($errores)) {


				// Crear carpte
				if (!is_dir(CARPETA_IMAGENES)) {
					mkdir(CARPETA_IMAGENES);
				}

				// Guarda en la imagen en el servidor
				$image->save(CARPETA_IMAGENES . $nameImg);

				// Guardar image
				$propiedad->guardar();
			}
		}


		$router->render('propiedades/crear', [
			'propiedad' => $propiedad,
			'vendedores' => $vendedores,
			'errores' => $errores
		]);
	}

	public static function actualizar(Router $router)
	{
		// Obtener el id para actulizar.
		$id = validarORedireccionar('/admin');

		// Mandar las varible
		$propiedad = Propiedad::find($id);
		$vendedores = Vendedor::all();
		$errores = Propiedad::getErrores();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Asignar Artibutos
			$args = $_POST['propiedad'];


			// Sincroniza el objeto en memoria con lo nuevo que escriba el usuario.
			$propiedad->sincronizar($args);

			// Obtener lo errores que surgan al momento de llenar el formulario
			$errores = $propiedad->validar();


			$nameImg =  md5(uniqid(rand(), true)) . '.jpg';

			// Validar si el usuario quiere actulizar la imagen
			if ($_FILES['propiedad']['size']['imagen'] > 0) {

				$image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
				$propiedad->setImagen($nameImg);
			}


			if (empty($errores)) {

				if ($_FILES['propiedad']['size']['imagen'] > 0) {
					$image->save(CARPETA_IMAGENES . $nameImg);
				}

				$propiedad->guardar();
			}
		}



		$router->render('propiedades/actualizar', [
			'propiedad' => $propiedad,
			'vendedores' => $vendedores,
			'errores' => $errores
		]);
	}


	public static function destroy()
	{

		// Elimnar
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			// Obtener el id para actulizar.
			
			$id = $_POST['id'];
			$id = filter_var($id, FILTER_VALIDATE_INT);

			if (!$id) {
				header('Location: /admin');
			}
			$tipo = $_POST['tipo'];


			if (validarTipoContenido($tipo)) {

				$propiedad = Propiedad::find($id);
				$propiedad->eliminar();
			}
		}
	}
}
