<?php
 
    //conectar BD
    include("conectar_bd.php");  
    conectar_bd();
     
    $usr = $_POST['usuario'];
    $pw = $_POST['password'];
    //Obtengo la version encriptada del password
    $pw_enc = md5($pw);
     
    $sql = "SELECT id_usuario FROM tbl_users
            INNER JOIN ctg_tiposusuario
            ON tbl_users.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
            WHERE tx_username = '".$usr."'
            AND tx_password = '".$pw_enc."' ";  
    $result = mysqli_query($conexio,$sql); 
 
    $uid = "";
     
    //Si existe al menos una fila
    if( $fila=mysqli_fetch_array($result, MYSQLI_ASSOC) )
    {       
        //Obtener el Id del usuario en la BD        
        $uid = $fila['id_usuario'];
        //Iniciar una sesion de PHP
        session_start();
        //Crear una variable para indicar que se ha autenticado
        $_SESSION['autenticado'] = 'SI';
        //Crear una variable para guardar el ID del usuario para tenerlo siempre disponible
        $_SESSION['uid'] = $uid;
        //CODIGO DE SESION
         
        //Crear un formulario para redireccionar al usuario y enviar oculto su Id 
		header("location:../bienvenido.php");
    }
    else {
        //En caso de que no exista una fila...
        //..Crear un formulario para redireccionar al usuario a la pagina de login 
        //enviandole un codigo de error
		header("location:../login.php");
    }
?>