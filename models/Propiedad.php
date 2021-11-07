<?php

namespace Model;

use Model\ActiveRecord;


class Propiedad extends ActiveRecord
{
	
	protected static $tabla = 'propiedades';
	protected static $columnasDB = [
		'id',
		'titulo',
		'precio',
		'imagen',
		'descripcion',
		'habitaciones',
		'wc',
		'estacionamiento',
		'creado',
		'vendedorId'
	];

	public string $id;
	public string $titulo;
	public string $precio;
	public string $imagen;
	public string $descripcion;
	public string $habitaciones;
	public string $wc;
	public string $estacionamiento;
	public string $creado;
	public string $vendedorId;

	/**
	 * 
	 */
	public function __construct(array $args = [])
	{

		$this->id = $args['id'] ?? '';
		$this->titulo = $args['titulo'] ?? '';
		$this->precio = $args['precio'] ?? '';
		$this->imagen = $args['imagen'] ?? '';
		$this->descripcion = $args['descripcion'] ?? '';
		$this->habitaciones = $args['habitaciones'] ?? '';
		$this->wc = $args['wc'] ?? '';
		$this->estacionamiento = $args['estacionamiento'] ?? '';
		$this->creado = date('Y/m/d');
		$this->vendedorId = $args['vendedorId'] ?? '';
	}


	public function validar()
	{
		if (!$this->titulo) {
			self::$errores[] = 'Debes Añadir un titulo';
		}

		if (!$this->precio) {
			self::$errores[] = 'Precio es Obligatorio';
		}

		if (!$this->descripcion) {
			self::$errores[] = 'La descripcion es obligatorio';
		}

		if (!$this->habitaciones) {
			self::$errores[] = 'El numero de habitaciones es obligatorio';
		}

		if (!$this->estacionamiento) {
			self::$errores[] = 'El numero de estacionamientos es obligatorio';
		}

		if (!$this->wc) {
			self::$errores[] = 'El numero de baños es obligatorio';
		}

		if (!$this->vendedorId) {
			self::$errores[] = 'El vendedor es obligatorio';
		}

		if (!$this->imagen) {
			self::$errores[] = 'La imagen es Obligatoria';
		}


		return self::$errores;
	}
}
