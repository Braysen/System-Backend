<?php

$nombrecompleto = $_POST['nombrecompleto'];
$nameDisplay = $_POST['nameDisplay'];
$email = trim($_POST['email']);
$pass = trim($_POST['pass']);

//Inicializar una sesion de PHP
session_start();
 
//Validar que el usuario este logueado y exista un UID
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la 
    //pantalla de login, enviando un codigo de error.
header("location:index.php");
}
 
    //Conectar BD
    include("include/conectar_bd.php");  
    conectar_bd();
 
    //Sacar datos del usuario que ha iniciado sesion {tx_ref1,tx_ref2,tx_ref3,}
    $sql = "SELECT  tx_nombre,tx_username,tx_TipoUsuario,id_usuario
            FROM tbl_users
            LEFT JOIN ctg_tiposusuario
            ON tbl_users.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
            WHERE id_usuario = '".$_SESSION['uid']."'";         
    $result=mysqli_query($conexio,$sql); 
 
    //$nombreUsuario = "";
 
    //Formar el nombre completo del usuario
    if( $fila = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
       // $nombreUsuario = $fila['tx_nombre'];//." ".$fila['tx_apellidoPaterno']
		$id = $fila['id_usuario'];
		$nombreUsuario = $fila['tx_username'];
	}
	actualizar();
	

function actualizar(){
	// Actualizando el registro del respondendor para un usuario especifico
	global $nombrecompleto, $email, $nameDisplay, $pass, $id;
	global $conexio;

	if (isset($id)){
	   // process form
	   $sql = "SELECT * FROM tbl_users WHERE id_usuario = $id";
	   $result = mysqli_query($conexio,$sql);
	   if($pass == ""){
			$sql = "UPDATE tbl_users SET 
			tx_nombre = '$nombrecompleto',
			name_display = '$nameDisplay',
			tx_correo = '$email'
			where id_usuario = '$id'";
		}else{
			$sql = "UPDATE tbl_users SET 
			tx_nombre = '$nombrecompleto',
			name_display = '$nameDisplay',
			tx_correo = '$email',
			tx_password = '".md5($pass)."'
			where id_usuario = '$id'";
		}
	   
	   $result = mysqli_query($conexio,$sql);

		header("location:mi_cuenta.php?estado=actualizado");

	}else{
		header("location:index.php");
		//echo "Debe especificar un 'id'.\n";
	} 
}

//Cerrrar conexion a la BD
mysqli_close($conexio);
?>
