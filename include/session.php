<?php
 
//Inicializar una sesion de PHP
session_start();
 
//Validar que el usuario este logueado y exista un UID
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la 
    //pantalla de login, enviando un codigo de error
	header("location:login.php");
}
 
    //Conectar BD
    include("conectar_bd.php");  
    conectar_bd();
 
    //Sacar datos del usuario que ha iniciado sesion
    $sql = "SELECT  id_usuario, tx_nombre, tx_correo, tx_username, name_display, tx_password, dt_registro, tx_TipoUsuario, html_1, html_2, html_3, html_4
            FROM tbl_users
            LEFT JOIN ctg_tiposusuario
            ON tbl_users.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
            WHERE id_usuario = '".$_SESSION['uid']."'";
    $result=mysqli_query($conexio,$sql); 
 
    $nombreUsuario = "";
 
    //Formar el nombre completo del usuario
    if( $fila = mysqli_fetch_array($result, MYSQLI_ASSOC) )
		$id = $fila['id_usuario'];
		$nombreUsuario = $fila['tx_nombre'];//." ".$fila['tx_apellidoPaterno']
		$email = $fila['tx_correo'];
        $userName = $fila['tx_username'];
        $nameDisplay = $fila['name_display'];
		$password = $fila['tx_password'];
        $dt_registro = $fila['dt_registro'];
		$tipoUser = $fila['tx_TipoUsuario'];
		$html_1 = $fila['html_1'];
		$html_2 = $fila['html_2'];
        $html_3 = $fila['html_3'];
        $html_4 = $fila['html_4'];
     
//Cerrrar conexion a la BD
mysqli_close($conexio);
?>