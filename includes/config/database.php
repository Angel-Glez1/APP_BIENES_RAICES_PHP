<?php 


function conectarDB(): mysqli{

	$db = new mysqli('localhost', 'root', '', 'bienes_raicez');
	$db->set_charset("utf8");
	
	if(!$db){
		echo 'No se conecto';
		exit;	
	}

	return $db;

}





?>

