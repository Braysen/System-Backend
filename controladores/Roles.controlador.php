<?php
include("../include/session.php");
require_once '../modelos/Rol.clase.php';
require_once '../dao/Roles.dao.php';

switch ($_GET['a']) {
	case 'ingrp':
		$peticion=$_REQUEST["submit"];	
		$r = new Rol();
		$r->id = $_POST['id'];
		$r->nombre = $_POST['nombre'];
		$r->celular = $_POST['celular'];
		$r->correo = $_POST['correo'];
		$r->pais = $_POST['pais'];

		RolesDAO::ingresarDato($r);
		header("Location: ../$userName/p-3.html");
		break;
	case 'ingrs':
		$peticion2=$_REQUEST["submit2"];	
		$r = new Rol();
		$r->id = $_POST['id'];
		$r->nombre = $_POST['nombre'];
		$r->celular = $_POST['celular'];
		$r->correo = $_POST['correo'];
		$r->pais = $_POST['pais'];
	
		RolesDAO::ingresarDato($r);
		header("Location: ../$userName/s-3.html");
		break;
	case 'ingrv':
		$peticion3=$_REQUEST["submit3"];	
		$r = new Rol();
		$r->id = $_POST['id'];
		$r->nombre = $_POST['nombre'];
		$r->celular = $_POST['celular'];
		$r->correo = $_POST['correo'];
		$r->pais = $_POST['pais'];
	
		RolesDAO::ingresarDato($r);
		header("Location: ../$userName/v-3.html");
		break;
	case 'edit':
		$r = new Rol();
		$r->id = $_POST['id'];
		$r->nombre = $_POST['nombre'];

		RolesDAO::editarDato($r);
		break;
	case 'elim':
		RolesDAO::eliminarPorId($_GET['id_usuario']);
		break;
	case 'ver':
		RolesDAO::verDatos($_GET['id_usuario']);
		break;
}