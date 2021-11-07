<?php

namespace Model;

class ActiveRecord
{

	// DDBB
	protected static $db;
	protected static $tabla = '';
	protected static $columnasDB = [];

	// Errores
	protected static $errores = [];




	/**
	 * Este metodo permite 
	 * definir la conexion a la base 
	 */
	public static function setDB($database)
	{
		self::$db = $database;
	}


	/**
	 * Este metodo retorna todos los registros
	 * de la base de datos mapeados a un objeto de 
	 * la misma clase.
	 */
	public static function all()
	{

		$sql = "SELECT * FROM ". static::$tabla . " ORDER BY id DESC";

		
		$propiedades = self::consultarSQL($sql);

		return $propiedades;
	}

	public static function get($cantidad = 3)
	{

		$sql = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT $cantidad";


		$propiedades = self::consultarSQL($sql);

		return $propiedades;
	}




	/**
	 * Listar objetos por el id
	 */
	public static function find($id = 1)
	{

		$sql = "SELECT * FROM ". static::$tabla ." WHERE id = ${id}";

		$resultado = self::consultarSQL($sql);


		// Retornar el primer elemto de un arreglo
		return  array_shift($resultado);
	}


	/**
	 * Este metodo se encarga de hacer las 
	 * consultas ala base de datos 
	 */
	public static function consultarSQL($sql)
	{

		// Consultar base 
		$resultado = self::$db->query($sql);

		// Iterar resultados
		$array = [];
		while ($registro = $resultado->fetch_assoc()) {

			$array[] = static::crearObjetos($registro);
		}

		// Liberar la memoria
		$resultado->free();


		// Retornar los resultados
		return $array;
	}


	/**
	 * Este metodo sirve para crear objetos de 
	 * esta misma clase ala hora de que se hace una
	 * consulta a la base
	 * 
	 */
	protected static function crearObjetos($registro)
	{

		// El new self hace referencia a la clase
		$objeto = new static;

		foreach ($registro as $key => $value) {

			if (property_exists($objeto, $key)) {
				$objeto->$key = $value;
			}
		}

		return $objeto;
	}


	public function guardar()
	{
		if (isset($this->id) && $this->id !== '') {

			// Actulizando
			$this->actualizar();
		} else {
			// Crear nuevo registro

			$this->crear();
		}
	}

	/**
	 * Este metodo se encarga de insertar en la base 
	 * pero 
	 */
	public function crear()
	{
		// Sanitizar los datos.
		$atributos = $this->sanitizarAtributos();


		// Query
		$query = "INSERT INTO ". static::$tabla ." ( ";
		$query .= join(', ', array_keys($atributos)); // Generar las columnas dicamicamente
		$query .= " ) VALUES (' ";
		$query .= join("', '", array_values($atributos)); // Obtener los valores dinamicamente
		$query .= " ') ";

		// debuguear($query);
		$resultado = self::$db->query($query);

		if ($resultado) {

			header('Location: /admin?resultado=1');
		}
	}


	public function actualizar()
	{

		$atributos = $this->sanitizarAtributos();

		$valores = [];
		foreach ($atributos as $key => $value) {
			$valores[] = "{$key} = '{$value}'";
		}

		$query = "UPDATE ". static::$tabla ." SET ";
		$query .= join(', ', $valores);
		$query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
		$query .= " LIMIT 1";

		$resultado = self::$db->query($query);

		if ($resultado) {

			header('Location: /admin?resultado=2');
		}
	}

	public function eliminar()
	{

		$query = "DELETE FROM ". static::$tabla ." WHERE id = " . self::$db->escape_string($this->id) . ' LIMIT 1';

		$resultado = self::$db->query($query);


		if ($resultado) {
			$this->eliminarImagen();
			header('Location: /admin?resultado=3');
		}
	}


	/**
	 * Mapea las columnas de la base 
	 * para poder insertar en la base.
	 */
	public function atributos()
	{
		$atributos = [];


		foreach (static::$columnasDB as $columna) {

			if ($columna == 'id') continue;

			$atributos[$columna] = $this->$columna;
		}

		return $atributos;
	}


	/**
	 * Sanitiza los atributos que se 
	 * asignen al crear el objeto 
	 * para evitar inyecciones sql
	 */
	public function sanitizarAtributos()
	{

		$atributos = $this->atributos();
		$sanitizados = [];

		foreach ($atributos as $key => $value) {
			$sanitizados[$key] = self::$db->escape_string(htmlspecialchars($value));
		}

		return $sanitizados;
	}


	/**
	 * Asignar al atribito imagen
	 */
	public function setImagen($imagen)
	{
		// Eliminar una imagen previa
		if (isset($this->id) && $this->id !== '') {

			$this->eliminarImagen();
		}



		if ($imagen) {

			$this->imagen = $imagen;
		}
	}


	public function eliminarImagen()
	{

		$exiteArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

		if ($exiteArchivo) {
			unlink(CARPETA_IMAGENES . $this->imagen);
		}
	}


	public static function getErrores()
	{
		return static::$errores;
	}
	
	
	public function validar()
	{
		static::$errores = [];

		return static::$errores;
	}



	// Sincroniza el objeto en memoria con los cambios realizados por el usuario.
	public function sincronizar($args = [])
	{

		foreach ($args as $key => $value) {
			if (property_exists($this, $key) && !is_null($value)) {
				$this->$key = $value;
			}
		}
	}
}

