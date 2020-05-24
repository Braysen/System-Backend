<?php
/*     
    Instituto Tecnologico de Zacatepec, Morelos 
Descripcion:   Pantalla inicial que se muestra al usuario una vez que ha sido logueado correctamente. 
Author:     Gonzalo Silverio  gonzasilve@gmail.com 
Archivo:    principal.php 
*/
 
//Inicializar una sesion de PHP
session_start();
 
//Validar que el usuario este logueado y exista un UID
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la 
    //pantalla de login, enviando un codigo de error
	header("location:index.php");
}
 
    //Conectar BD
    include("conectar_bd.php");  
    conectar_bd();
 
    //Sacar datos del usuario que ha iniciado sesion
    $sql = "SELECT  id_usuario, level, tx_nombre, acces_id, api_key, tx_correo, tx_username, tx_password, tx_TipoUsuario, autorespondedor, autorespondedorHTML
            FROM tbl_users
            LEFT JOIN ctg_tiposusuario
            ON tbl_users.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
            WHERE id_usuario = '".$_SESSION['uid']."'";         
    $result=mysql_query($sql); 
 
    $nombreUsuario = "";
 
    //Formar el nombre completo del usuario
    if( $fila = mysql_fetch_array($result) )
		$id = $fila['id_usuario'];
		$level = $fila['level'];
		$nombreUsuario = $fila['tx_nombre'];//." ".$fila['tx_apellidoPaterno']
		$accesId = $fila['acces_id'];
		$apiKey = $fila['api_key'];
		$email = $fila['tx_correo'];
		$userName = $fila['tx_username'];
		$password = $fila['tx_password'];
		$tipoUser = $fila['tx_TipoUsuario'];
		$autoResponder = $fila['autorespondedor'];
		$autoResponderHTML = $fila['autorespondedorHTML'];
     
//Cerrrar conexion a la BD
mysql_close($conexio);
?>