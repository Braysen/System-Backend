<?php
	require_once 'dao/Roles.dao1.php';

	$rol = RolesDAO::buscarPorId($_GET['id']);
?>
<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Imperio de liderazgo</title>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<script src="//code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/jquery.backstretch.min.js"></script>
	<script type="text/javascript">
	/*
		$(function(){
			var imagenes = [
    			"imgs/playa.jpg" 
  			];

			$(imagenes).each(function(){
    			$("<img/>")[0].src = this; 
  			});

  			var cont = 0;

			$.backstretch(imagenes[cont], {speed: 500});

			setInterval(function() {
    			cont = (cont >= imagenes.length - 1) ? 0 : cont + 1;
    			$.backstretch(imagenes[cont]);
    		}, 8000);
		});*/
	</script>
    
   
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.alerts.js"></script>
    <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" />
	<link href="css/style2.css" rel="stylesheet" type="text/css">
	<link href="css/nuevo.css" rel="stylesheet" type="text/css">


	<link rel="stylesheet" href="css/estilos.css" type="text/css">
    <!--<script src="js/jquery171.js" type="text/javascript"></script> -->
</head>
<body>
<div id="wrapp" class="clear">

    <div class="content">
    <div class="content-login">
    <div class="login radius">
    	<!--<div id="logo"><a href="< echo $urlhome; ?>"><img src="< echo $urlhome; ?>/imgs/logo.png"></a></div>-->
        <h2>Editar Prospecto</h2>
        <br>
        <form action="controladores/Roles.controlador1.php?a=edit" method="POST">
           <label>
		    <input type="hidden" id="id" name="id" value="<?=$rol[0]?>" placeholder="nombre" class="text-field">
		    <span id="usuario_Info" class="error"></span>
		    </label>
			<label>
		    <input type="text" id="nombre" name="nombre" value="<?=$rol[1]?>" placeholder="nombre" class="text-field">
		    <span id="usuario_Info" class="error"></span>
		    </label>
		    <label>
		    <input type="text" id="celular" name="celular" value="<?=$rol[2]?>" placeholder="celular" class="text-field">
		    <span id="usuario_Info" class="error"></span>
            </label>
            <label>
		    <input type="text" id="correo" name="correo" value="<?=$rol[3]?>" placeholder="correo" class="text-field">
		    <span id="usuario_Info" class="error"></span>
            </label>
            <label>
		    <input type="text" id="pais" name="pais" value="<?=$rol[4]?>" placeholder="pais" class="text-field">
		    <span id="usuario_Info" class="error"></span>
		    </label>
		 
		    <!--<input type="button" onClick="javascript: location.href='index.php'" name="cancelar" value="Cancelar">-->
            <input type="submit" value="Editar" class="button button-green" >
            <input type="submit" name="enviar" value="Cancelar" class="button button-green" >
     
	    </form>
    </div>
    </div>
    </div>

	<div class="footer">
		Copyright © <?=date('Y')?> Imperio de Liderazgo. Todos los derechos reservados.
	</div>
</div>

<!--<div class="trama"></div>-->
<script type="text/javascript">
$(document).ready(function(){
	//global vars
	var enquiryfrm = $("#frmlogin");
	var usuario = $("#usuario");
	var password = $("#password");
	
	var usuario_Info = $("#usuario_Info");
	var password_Info = $("#password_Info");
		
	//On blur
	usuario.blur(validate_usuario);
	password.blur(validate_password);

	//On key press
	usuario.keyup(validate_usuario);
	password.keyup(validate_password);
	
	//On Submitting
	enquiryfrm.submit(function(){
		if(validate_usuario() & validate_password())
		{
			hideform();
			return true
		}
		else
		{
			return false;
		}
	});

	//validation functions
	function validate_usuario()
	{
		
		if($("#usuario").val() == '')
		{
			//nombrecompleto.addClass("error");
			usuario_Info.text("Por favor ingrese su nombre de usuario.");
			usuario_Info.addClass("message_error");
			return false;
		}
		else
		{
			//nombrecompleto.removeClass("error");
			usuario_Info.text("");
			usuario_Info.removeClass("message_error");
			return true;
		}
	}
	function validate_password()
	{
		
		if($("#password").val() == '')
		{
			//nombrecompleto.addClass("error");
			password_Info.text("Por favor ingrese su contraseña");
			password_Info.addClass("message_error");
			return false;
		}
		else
		{
			//nombrecompleto.removeClass("error");
			password_Info.text("");
			password_Info.removeClass("message_error");
			return true;
		}
	}
});
</script>
</body>
</html>