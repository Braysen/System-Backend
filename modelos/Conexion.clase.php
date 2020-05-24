<?php
class Conexion {
	private $servidor;
	private $usuario;
	private $clave;
	private $base;
	private $conexion;

	public function __construct () {
		$this->servidor = '';/*Nombre de servidor*/
		$this->usuario = '';/*Nombre de usuario*/
		$this->clave = '';/*clave*/
		$this->base = '';/*Nombre de la base de datos*/

		$this->conexion = new mysqli($this->servidor, $this->usuario, $this->clave, $this->base);
	}

	public function ejecutarConsulta ($sql) {
		$contenedor = $this->conexion->query($sql);
		return $contenedor->fetch_all();
	}

	public function ejecutarActualizacion ($sql) {
		$this->conexion->query($sql);
	}

	public function cerrarConexion () {
		$this->conexion->close();
	}
}