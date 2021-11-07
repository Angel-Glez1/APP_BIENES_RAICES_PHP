<?php

define('TEMPLATES_URL', __DIR__ . '/template');
define('FUNCIONES',  __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES',  $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function includeTemplate(string $nombre, bool $pageHome = false){
	include TEMPLATES_URL ."/${nombre}.php";
}


function estaAutenticado(){

	session_start();
	
	if(!$_SESSION['login']){
		header('Location: /');	
	}

}


function debuguear($varible, $tipado = true){
	echo "<pre>";
	($tipado) ? var_dump($varible) : print_r($varible);
	echo "</pre>";
	exit;
}

// Escapar HTML
function s($html){

	$s = htmlspecialchars($html);
	return $s;
}

function validarTipoContenido($tipo){
	$tipos = ['vendedor', 'propiedad'];
	return in_array($tipo, $tipos);
}


function mostarNotificacion($codigo){

	$mensaje = '';

	switch ($codigo) {
		case 1:
			$mensaje = 'Creado correctamente';
			break;

		case 2:
			$mensaje = 'Actulizado correctamente';
			break;

		case 3:
			$mensaje = 'Eliminado correctamente';
			break;
		
		default:
			$mensaje = false;
			break;
	}

	return $mensaje;
}


function validarORedireccionar(string $url){
	
	$propiedad_id = $_GET['id'];
	$propiedad_id = filter_var($propiedad_id, FILTER_VALIDATE_INT);

	if (!$propiedad_id) {
		header("Location: $url");
	}

	return $propiedad_id;
}
