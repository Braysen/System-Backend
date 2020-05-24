<?php
require_once '../modelos/Conexion.clase.php';
require_once '../modelos/Rol.clase.php';

class RolesDAO {
	public static function listarDatos () {
		$con = new Conexion();
		$cont = $con->ejecutarConsulta('SELECT * FROM tbl_users');
		$con->cerrarConexion();
		return $cont;
	}

	public static function ingresarDato ($rol) {
		$con = new Conexion();
		$con->ejecutarActualizacion("INSERT INTO tbl_invitados (nombre,celular,correo,pais,id_user) 
		VALUES ('$rol->nombre','$rol->celular','$rol->correo','$rol->pais','$rol->id')");
		$con->cerrarConexion();
	}

	public static function buscarPorId ($id) {
		$con = new Conexion();
		$cont = $con->ejecutarConsulta("SELECT * FROM tbl_users WHERE id_usuario = $id");
		$con->cerrarConexion();
		return $cont[0];
	}

	public static function verDatos ($id) {
		$con = new Conexion();
		$cont = $con->ejecutarConsulta("SELECT * FROM tbl_users WHERE id_usuario = $id");
		$con->cerrarConexion();
		return $cont[0];
	}

	public static function editarDato ($rol) {
		$con = new Conexion();
		$con->ejecutarActualizacion("UPDATE tbl_users SET tx_nombre = '$rol->nombre' WHERE id_usuario = $rol->id");
		$con->cerrarConexion();
	}

	public static function eliminarPorId ($id) {
		$con = new Conexion();
		$con->ejecutarActualizacion("DELETE FROM tbl_users WHERE id_usuario = $id");
		$con->cerrarConexion();
	}
}