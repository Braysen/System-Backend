<?php
/*include("include/session.php");

//Validar que el usuario este logueado y exista un UID..
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la 
    //pantalla de login, enviando un codigo de error
header("location:index.php");
}*/

include ("function.php");

$id = $_GET['id'];
$username = $_GET['username'];
 
    //Conectar BD
    include("include/conectar_bd.php");  
    conectar_bd();
 
    //Sacar datos del usuario que ha iniciado sesion {tx_ref1,tx_ref2,tx_ref3,}
    $sql = "SELECT  id_usuario,tx_nombre,tx_username,tx_correo,tx_TipoUsuario
            FROM tbl_users
            LEFT JOIN ctg_tiposusuario
            ON tbl_users.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
            WHERE id_usuario = '".$id."'";         
    $result=mysqli_query($conexio,$sql); 
 
    //$nombreUsuario = "";
 
    //Formar el nombre completo del usuario
    if( $fila = mysqli_fetch_array($result, MYSQLI_ASSOC) )
      $nombreUsuario = $fila['tx_nombre'];//." ".$fila['tx_apellidoPaterno']
    $tx_correo = $fila['tx_correo'];
    $id = $fila['id_usuario'];
    $userName = $fila['tx_username'];

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/admin3.css">
  
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
  <div class="header">
        <!--<div class="logo"><a href="<?php echo $urlhome; ?>/bienvenido.php"><img src="< echo $urlhome; ?>/imgs/logo.png"></a></div>-->
    </div>
  <div id="wrapp">
    <div class="contenido">
<h1>EDITAR USUARIO</h1>

<form id="form_cuenta" name="form_cuenta" action="actualizando.php" method="post">
<div class="from-row">
<label>Nombre y Apellido:</label>
<input class="text-field" type="text" id="nombrecompleto" name="nombrecompleto" value="<?php echo $nombreUsuario; ?>">
<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
<input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
<span id="nombrecompleto_Info" class="error"></span>
</div>
<div class="from-row">
<label>Tu Email:</label>
<input class="text-field" type="text" id="email" name="email" value="<?php echo $tx_correo; ?>">
<span id="email_Info" class="error"></span>
</div>
<div class="from-row">
<label>Usuario:</label>
<input class="text-field" type="text" id="useremp" name="useremp" value="<?php echo $userName; ?>" disabled>
<span id="useremp_Info" class="error"></span>
</div>
<!--
<div class="from-row">
<label>Actualizar fecha de registro: <span>Resetear contador de 30 dias</span></label>
<input type="checkbox" id="resetdate" name="resetdate" value="si" class="terminos">
<span id="useremp_Info" class="error"></span>
</div>-->

<h2>Cambiar contraseña:</h2>
<span>Si no deseas cambiar de contraseña, deje el siguiente campos en blanco.</span>
<div class="from-row">
<label>Contraseña:</label>
<input class="text-field" type="password" id="pass" name="pass">
<span id="pass_Info" class="error"></span>
</div>
<br>
<input type="submit" id="send" name="send" value="GUARDAR Y CONTINUAR" class="btn button-green">
</form>
<br>
<a href="<?php echo $urlhome; ?>/listuser.php">< Volver a la lista de usuarios</a>
</div>
</div>
</body>
</html>
