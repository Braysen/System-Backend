<?php
class Rol {
	public $id;
	public $nombre;
	public $celular;
	public $correo;
	public $pais;

	public function __construct () {
		$this->id = 0;
		$this->nombre = '';
		$this->celular = '';
		$this->correo = '';
		$this->pais = '';
	}
}