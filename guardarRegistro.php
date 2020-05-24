<?php
    //Recuperar los datos del formulario de registro.
    $str_nombre =trim($_POST['tx_nombre']);

	$str_correo =trim($_POST['tx_correo']);
    $str_username =trim($_POST['tx_username']);

    //$str_password =trim($_POST['tx_password']);
    
    $i_TipoUsuario =trim($_POST['i_tipoUsuario']);
 
function password_random($longitud = 6, $opcLetra = TRUE, $opcNumero = TRUE, $opcMayus = TRUE, $opcEspecial = FALSE){
 
    $letras ="abcdefghijklmnopqrstuvwxyz";
    $numeros = "1234567890";
    $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $especiales ="|@#~$%()=^*+[]{}-_";
    $listado = "";
    $password = ""; 
    if ($opcLetra == TRUE) $listado .= $letras;
    if ($opcNumero == TRUE) $listado .= $numeros;
    if($opcMayus == TRUE) $listado .= $letrasMayus;
    if($opcEspecial == TRUE) $listado .= $especiales;

    for( $i=1; $i<=$longitud; $i++) {
    $caracter = $listado[rand(0,strlen($listado)-1)];
    $password.=$caracter;
    $listado = str_shuffle($listado);
    }
    return $password;
 
}

$str_password = "imperiodeliderazgo"; // password_random(8)

    //Devuelve true si la cadena que llega esta VACIA
    function estaEnBlanco($cadena) {
        if(strlen( trim($cadena) ) == 0 )
            return true;
        return false;
    }
 
    //Devuelve true si la longitud de la cadena (primer parametro)
    // que llega  es menor que el numero (segundo parametro)
    function validaTamanio($cadena,$longitud) {
        if(strlen( trim($cadena) ) < $longitud )
            return true;
        return false;
    }
 
    // devuelve true SI ha escrito, un email NO VALIDO
    function esCorreoInvalido($str_email) {
        if(!filter_var(trim($str_email), FILTER_SANITIZE_EMAIL))
            return true;
        return false;
    }
 
    // devuelve una cadena escapada de algunos caracteres que
    // pudieran servir para un ataque de sql injection
    function escaparQuery($cadena) {
        $str_KeywordsSQL            = array("select ","insert ","delete ","update ","union ");
        $str_OperadoresSQL      = array("like ","and ","or ","not ","<",">","<>","=","<");
        $str_DelimitadoresSQL = array(";","(",")","'");
 
        //Quitar palabras reservadas y operadores
        for($i=0; $i<count($str_KeywordsSQL); $i++) {
            $cadena = str_replace($str_KeywordsSQL[$i], "",strtolower($cadena) );
        }
        for($i=0; $i<count($str_OperadoresSQL); $i++) {
            $cadena = str_replace($str_OperadoresSQL[$i], "",strtolower($cadena) );
        }
        for($i=0; $i<count($str_DelimitadoresSQL); $i++) {
            $cadena = str_replace($str_DelimitadoresSQL[$i], "",strtolower($cadena) );
        }
 
        return $cadena;
    }
 
 
    $mensajesAll= "";
 
    //Mensajes para el nombre
    if( estaEnBlanco($str_nombre) )
        $mensajesAll = "<li>Por favor, escriba su Nombre.</li>";
    if( validaTamanio($str_nombre,3) )
        $mensajesAll .= "<li>Su Nombre como minimo debe tener 3 caracteres.</li>";

	//Mensajes para el Correo electronico
    if( estaEnBlanco($str_correo) || validaTamanio($str_correo,5) || esCorreoInvalido($str_correo) )
        $mensajesAll .= "<li>Por favor, escriba una direccion de correo electronico valida.</li>";
    //Mensajes para el nombre de usuario
    if( estaEnBlanco($str_username) )
        $mensajesAll .= "<li>Por favor, escriba un nombre de usuario. Este dato le servira para iniciar sesion y ver el contenido.</li>";
    if( validaTamanio($str_username,3) )
        $mensajesAll .= "<li>Su nombre de usuario como minimo debe tener 3 caracteres.</li>";
    
    $log = $mensajesAll."<br>";
 
    //Si se generaron mensajes de error al validar...
    if ( trim($mensajesAll) != "" ) {
        //..Redireccion a la pagina de registro para mostrar msg de error al usuario
        //Enviar los datos que habia escrito antes de enviar
    ?>
    <form id="frm_error"   name="frm_error" method="post" action="ghb124cc107tpa7ch3f8rg7e572c8rd8.php">
        <input type="hidden" name="error" value="1" />
        <input type="hidden" name="msgs_error" value='<?php echo $mensajesAll ?>' />
        <input type="hidden" name="str_nombre" value='<?php echo $str_nombre ?>' />
        <input type="hidden" name="str_correo" value='<?php echo $str_correo ?>' />
        <input type="hidden" name="str_username" value='<?php echo $str_username ?>' />
    </form>
    <script type="text/javascript">
        //Redireccionar con el formulario creado
        document.frm_error.submit();
    </script>
<?php
        exit;
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
    
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <script src="js/jquery171.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.alerts.js"></script>
    <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" />
 
    <script type="text/javascript">
    <!--
        $().ready(function() {
 
        });
    // -->
    </script>
 
</head>
<body>
 
<?php
    $mensajesAll = "";
    $username_duplicado = false;
    $email_duplicado = false;
    //Escapar las cadenas para avitar SQL Injection
    $str_username = escaparQuery($str_username);
    $str_correo     = escaparQuery($str_correo);
 
    //Conectar la BD
    include("include/conectar_bd.php");
    conectar_bd();
 
     
    //Validar que el nombre de usuario no exista en la BD
    $sql = "SELECT  id_usuario  FROM tbl_users
    WHERE tx_username = '".trim($str_username)."';";
    $rs_sql = mysqli_query($conexio,$sql);
    $log .=  $sql."<br>";
         
    //Si ya existe el usuario en la BD...
    if ( $fila  = mysqli_fetch_array($rs_sql, MYSQLI_ASSOC) ) {
        $mensajesAll = "<li>El nombre de usuario <b>".$str_username."</b> ya fue registrado 
        por otra persona. Por favor, escriba otro.</li>";
        $username_duplicado = true;
    }
 
    //Validar que el email no exista en la BD
    $sql = "SELECT  id_usuario  FROM tbl_users
    WHERE tx_correo='".$str_correo."';";
    $rs_sql = mysqli_query($conexio,$sql);
    $log .=  $sql."<br>";
 
     
    //Si ya existe el email en la BD...
    if ( $fila  = mysqli_fetch_array($rs_sql, MYSQLI_ASSOC) ) {
        $mensajesAll = "<li>El correo electronico <b>".$str_correo."</b> ya fue registrado 
        por otra persona. Por favor, escriba otro.</li>";
        $email_duplicado        = true;
    }
    //Si ambos datos ya estan en la Base de datos mostrar un solo msg
    if( $username_duplicado && $email_duplicado)
        $mensajesAll = "<li>Ambos, nombre de usuario <b>".$str_username."</b> 
        y correo electronico <b>".$str_correo."</b> ya fueron registrados por otra persona.
        Por favor, cambie esos datos.</li>";
    //..Redireccion a la pagina de registro para mostrar msg de error al usuario
    //Enviar los datos que habia escrito antes de enviar
     
    $log .=  $mensajesAll."<br>";
 
     
    if ( trim($mensajesAll) != "" ) {
        //..Redireccion a la pagina de registro para mostrar msg de error al usuario
        //Enviar los datos que habia escrito antes de enviar
        ?>
        <form id="frm_error"   name="frm_error" method="post" action="ghb124cc107tpa7ch3f8rg7e572c8rd8.php">
            <input type="hidden" name="error" value="2" />
            <input type="hidden" name="msgs_error" value='<?php echo $mensajesAll ?>' />
            <input type="hidden" name="str_nombre" value='<?php echo $str_nombre ?>' />
            <input type="hidden" name="str_correo" value='<?php echo $str_correo ?>' />
            <input type="hidden" name="str_username" value='<?php echo $str_username ?>' />
        </form>
        <script type="text/javascript">
            //Redireccionar con el formulario creado
            document.frm_error.submit();
        </script>
            <?php
        exit;
    }
     
     
    //..Si llega asta aqui es que todos los datos son validos, procedemos a darlo de alta en BD
    $str_elNombre = $str_nombre;
    
    // Creando el directorio por usuario
    $estructura = './'.$str_username.'/';
    //$estructuraVid = './'.$str_username.'/videos/';

    if(!mkdir($estructura, 0777, true)) {
        die('Fallo al crear la carpeta de Usuario');
    }
    /*if(!mkdir($estructuraVid, 0777, true)) {
        die('Fallo al crear la carpeta de Videos');
    }*/
    
    $blank='<!doctype html><html><head><title>Imperio de liderazgo</title></head><body></body></html>';
    
    $pathblank=$str_username."/index.html";
    
    $openblank = fopen ($pathblank,"w");//a+ 
    
    if ($openblank) { 
        fwrite ($openblank,"$blank");  
    }
    fclose($openblank);
    
    /// Otro
    /*$pathblankV=$str_username."/videos/index.html";
    
    $openblankV = fopen ($pathblankV,"w");//a+ 
    
    if ($openblankV) { 
        fwrite ($openblankV,"$blank");  
    }
    fclose($openblankV);*/
	

    //Formar el query para el insert del nuevo usuario
    $queryInsert="INSERT INTO tbl_users (
    tx_nombre,
	tx_correo,
    tx_username,
    tx_password,
    id_TipoUsuario,
    dt_registro ) 
    VALUES(
    '".$str_nombre."',
	'".$str_correo."',
    '".$str_username."',
    '".md5($str_password)."',
    ".$i_TipoUsuario.",
'".date("Y-m-d")."');";
     
    $log .=  $queryInsert."<br>";
 
    //echo $log;
    //exit;
     
    mysqli_query($conexio,$queryInsert);
 
    // Le  Envio  un correo electronico  de bienvenida
    $destinatario = $str_correo;                    //A quien se envia
    $nomAdmin           = 'Imperio de liderazgo';           //Quien envia
    $mailAdmin      = 'info@m.imperiodeliderazgo.com';       //Mail de quien envia //soporte@imperiodeliderazgo.com
    $urlAccessLogin = 'https://m.imperiodeliderazgo.com/login.php';       //Url de la pantalla de login
 
    $elmensaje = "";
    $asunto = "Datos de Acceso a Imperio de Liderazgo";
 
    $cuerpomsg ='
    <p>Felicitaciones '.$str_elNombre.', Ya tienes acceso a nuestro sistema de duplicación, ingresa inmediatamente y empieza a dar los primeros pasos hacia el éxito.</p>
    <p><strong>Tus datos de acceso son:</strong></p>
        <table border="0" >
        <tr>
            <td> Usuario: </td>
            <td> <b>'.$str_username.'</b> </td>
        </tr>
        <tr>
            <td> Contraseña: </td>
            <td> <b>'.$str_password.'</b> </td>
        </tr>
        <tr>
            <td> Página de acceso: </td>
            <td> <b><a href="'.$urlAccessLogin.'">'.$urlAccessLogin.'</a></b> </td>
        </tr>
        </table> <br/><br/>
    <p><span>Cualquier consulta, háganos llegar a: <a href="mailto:soporte@imperiodeliderazgo.com">soporte@imperiodeliderazgo.com</a></span></p> <br><br>';
 
    date_default_timezone_set('America/Bogota');
 
    //Establecer cabeceras para la funcion mail()
    //version MIME
    $cabeceras = "MIME-Version: 1.0\r\n";
    //Tipo de info
    $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //direccion del remitente
    $cabeceras .= "From: ".$nomAdmin." <".$mailAdmin.">";
    $i_EmailEnviado = 0;
     
    //Si se envio el email
    if( mail($destinatario,$asunto,$cuerpomsg,$cabeceras) ) 
        $i_EmailEnviado = 1;
     
    //Cerrrar conexion a la BD
    mysqli_close($conexio);
 
    // Mostrar resultado del registro
    ?>
    <form id="frm_registro_status"   name="frm_registro_status" method="get" action="ghb124cc107tpa7ch3f8rg7e572c8rd8.php">
        <input type="hidden" name="estado" value="registrado" />
        <input type="hidden" name="status_registro" value="1" />
        <input type="hidden" name="i_EmailEnviado" value='<?php echo $i_EmailEnviado ?>' />
    </form>
    <script type="text/javascript">
        //Redireccionar con el formulario creado
        document.frm_registro_status.submit();
    </script>
    <?php 
	//header ("location:/ghb124cc107tpa7ch3f8rg7e572c8rd8.php?estado=registrado");
	?>
</body>
</html>