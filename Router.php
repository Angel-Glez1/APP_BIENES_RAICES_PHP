<?php

namespace MVC;

class Router  {

	public $rutasGET = [];
	public $rutasPOST = [];
	public $rutas_protegidas = [];


	/**
	 * Este metodo sirve para ejecutar
	 * todas la URL'S que pertenecen al metodo GET.
	 * 
	 * @param string $url Url que se esta solicitando
	 * @param callback $fn Funcion que se ejecuta cuando se llama esa url
	 */
	public function get($url, $fn){

		$this->rutasGET[$url] = $fn;
	}


	/**
	 * Este metodo sirve para ejecutar
	 * todas la URL'S que pertenecen al metodo POST.
	 * 
	 * @param string $url Url que se esta solicitando
	 * @param callback $fn Funcion que se ejecuta cuando se llama esa url
	 */
	public function post($url, $fn)
	{

		$this->rutasPOST[$url] = $fn;
	}



	/**
	 * Como su nombre lo indica 
	 * verifica que la url escrita por el cliente
	 * en el navegador, sea soportada por nuestro router.
	 * 
	 */
	public function comprobarRutas(){

		session_start();
		
		$auth = $_SESSION['login'] ?? null;


		$urlActual = $_SERVER['PATH_INFO'] ?? '/';
		$method = $_SERVER['REQUEST_METHOD'];

		
		//* Obtener la (funcion|Metodo) que esta asociado a la ruta solicita y validar si es POST o GET.
		if($method === 'GET'){

			$fn = $this->rutasGET[$urlActual] ?? null;

		}else {

			$fn = $this->rutasPOST[$urlActual] ?? null;
		}


		if(in_array($urlActual, $this->rutas_protegidas) && !$auth){
			header('Location: /');
		}

		// Si exite el (metodo|funcion) asociado lo mandamos a llamar
		if($fn){

			call_user_func($fn, $this);

		}else {

			echo "404 | Page not Found";

		}

	}



	/**
	 * Renderiza las vistas
	 */
	public function render($view, $datos = []){
		
		foreach($datos as $key => $value){
			$$key = $value;
		}


		ob_start();
		include __DIR__ . "/view/$view.php";

		$contenido = ob_get_clean();

		include __DIR__ . "/view/layout.php";
	}

}
