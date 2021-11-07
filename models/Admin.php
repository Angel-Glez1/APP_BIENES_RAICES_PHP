<?php


namespace Model;


class Admin extends ActiveRecord {


	protected static $tabla = 'usuarios';
	protected static $columnasDB = ['id', 'email', 'password'];

	public $id;
	public $email;
	public $password;



	public function __construct($args = []) 
	{
		$this->id = $args['id'] ?? null;
		$this->email = $args['email'] ?? '';
		$this->password = $args['password'] ?? '';
	}

	public function validar()
	{
		if(!$this->email){
			self::$errores[] = 'El email es obligatorio';
		}

		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			self::$errores[] = 'El email ingresado no es valido';
		}

		if(!$this->password){
			self::$errores[] = 'El password es obligatorio';
		}

		return self::$errores;
	}

	public function exiteUsuario()
	{
		$sql = "SELECT * FROM " . self::$tabla . " WHERE email = '". $this->email ."' LIMIT 1";

		$resultado = self::$db->query($sql);

		if(!$resultado->num_rows){
			self::$errores[] = 'No exite usuario con esas credenciales';
			return;

		}

		return $resultado;
	}


	public function comprobarPassword($result)
	{
		$user = $result->fetch_object();

		$auth = password_verify($this->password, $user->password);
		
		if(!$auth){
			self::$errores[] = 'El password es incorrecto';

		}else {
			$this->id = $user->id;
		}
		
		return $auth;
	}

	public function autenticar()
	{
		session_start();

		// Llenar la el areglo.
		$_SESSION['login'] = true;
		$_SESSION['user'] = (object)['id' => $this->id, 'emial' => $this->email];

		header('Location: /admin');
	}



}

