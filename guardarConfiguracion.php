<?php

include ("function.php");

$str_html_1 =trim($_POST['html_1']);
$str_html_2 =trim($_POST['html_2']);
$str_html_3 =trim($_POST['html_3']);
//$str_html_4 =trim($_POST['html_4']);

//Inicializar una sesion de PHP
session_start();
 
//Validar que el usuario este logueado y exista un UID.
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la 
    //pantalla de login, enviando un codigo de error.
header("location:index.php");
}
 
    //Conectar BD
    include("include/conectar_bd.php");  
    conectar_bd();
 
    //Sacar datos del usuario que ha iniciado sesion
    $sql = "SELECT  tx_nombre,html_1,html_2,html_3,html_4,tx_username,name_display,tx_TipoUsuario,id_usuario
            FROM tbl_users
            LEFT JOIN ctg_tiposusuario
            ON tbl_users.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
            WHERE id_usuario = '".$_SESSION['uid']."'";         
    $result=mysqli_query($conexio,$sql); 
 
    //$nombreUsuario = "";
 
    //Formar el nombre completo del usuario
    if( $fila = mysqli_fetch_array($result, MYSQLI_ASSOC) )
		$autoResponder = $fila['html_1'];
		$autoResponderHTML = $fila['html_2'];
		$id = $fila['id_usuario'];
    $nombreUsuario = $fila['tx_username'];
    $nameDisplay = $fila['name_display'];


// Actualizando el registro del respondendor para un usuario especifico
if (isset($id) && !empty($nombreUsuario)){
   // process form
   $sql = "SELECT * FROM tbl_users WHERE id_usuario = $id" ;
   $result = mysqli_query($conexio,$sql);
   $sql = "UPDATE tbl_users SET html_1='$str_html_1',html_2='$str_html_2',html_3='$str_html_3',html_4='$str_html_4' where id_usuario='$id'";
   $result = mysqli_query($conexio,$sql);

/************************************************************************/
/*************************Aqui se crean lo HTML**************************/
/************************************************************************/


$lpOne='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>La Fórmula Correcta - Imperio de liderazgo</title>
    <link rel="icon" href="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/fabicon2.png" />
    <meta content="Imperio de liderazgo" property="og:title"/>
    <meta content="https://m.imperiodeliderazgo.com/imgs/el-mejor-negocio.jpg" property="og:image"/>
    <meta name="description" content="Descubra el negocio con las variables correctas.">
    <!--[if !mso]--><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <!-- <![endif]-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        

        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #f4f4f4; " >
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Imperio de Liderazgo
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr style="background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" >
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:90px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 180px;" src="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/logo2.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4" class="bg_color">

        <tr style="background-color: #f4f4f4; background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" ><!--COLOR DE CONTENEDOR-->
            <td align="center">
                <table border="0" align="center" width="790" cellpadding="0" cellspacing="0" class="container590" style="background-color: #ffffff; border: #ffffff solid; border-width: 30px;"><!--Color de fondo-->
                    <tr ><br>

                    <!--DIV DATOS DE USUARIO-->
                    <!--<div id="datosusuario" >
                    <h6 style="font: sans-serif;" >Mostar Nombre de usuario</h6>
                    </div><br>-->

                    <td align="center" class="section-img"><br>

                    <div style="background-color: #ffffff;" >
                    <h4 style="font: sans-serif;" >La Fórmula Correcta</h4>
                    </div><br>
                    
                    <!--DIV VIDEO--> 
                    <style type="text/css">.video-container {
                                          position: relative;
                                          padding-bottom: 56.25%;
                                          padding-top: 30px; height: 0; overflow: hidden;
                                          }

                                          .video-container iframe,
                                          .video-container object,
                                          .video-container embed {
                                          position: absolute;
                                          top: 0;
                                          left: 0;
                                          width: 100%;
                                          height: 100%;
                                          }</style>               
                    <div id="video" class="video-container  embed-responsive embed-responsive-16by9" >                    
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/MDCqi4pPens?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    </td>
                    </tr>
                    
                    <td align="center" style="color: #000000; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header"><br>
                            
                      
                      <div>
                        <button  class="btn btn-primary"><a href="p-2.php" style="color: white; text-decoration: none;">VER SIGUIENTE VIDEO</a></button>
                      </div><br>

                      <!---                                  
                    <div>
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    -->
                    <!--DIV WHATSAPP--><!--
                    <div id="whatsapp" align="center" >
                          <a href="#" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div>
                -->

                    </div><br>


                   <!--DIV COMENTARIOS-->

                    
                    </td>

            </table>
            </td>
        </tr>
                              

    </table><br>
    <!-- end section -->

   <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
            <div class="footer txt-copy"><strong>Copyright &copy; 2020 <a href="https://imperiodeliderazgo.com" target="_blank">Imperio de Liderazgo</a>.</strong> Todos los derechos reservados.
            </div>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
  <!-- end footer ====== -->

</body>

</html>

';
/*------------------------Prospecto1 pagina 1-------------------------------------*/

$pathLpOne=$nombreUsuario."/p-1.html"; 

$openLpOne = fopen ($pathLpOne,"w");//a+ 

if ($openLpOne) { 
	fwrite ($openLpOne,"$lpOne"); 
}
fclose($openLpOne);

/*------------------------------------------------------------------------*/

//Creando Landing page 2
$lpDos='<?php
include("../include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>Nuestro vehículo - Imperio de liderazgo</title>
    <link rel="icon" href="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/fabicon2.png" />
    <meta content="Imperio de liderazgo" property="og:title"/>
    <meta content="https://m.imperiodeliderazgo.com/imgs/el-mejor-negocio.jpg" property="og:image"/>
    <meta name="description" content="Descubra el negocio con las variables correctas.">
    <!--[if !mso]--><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <!-- <![endif]-->

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="../bootstrap.min.js"></script>
    <script src="../jquery.min.js"></script>
    <script src="../popper.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        

        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #f4f4f4; " >
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Imperio de Liderazgo
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr style="background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" >
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:90px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 180px;" src="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/logo2.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4" class="bg_color">

        <tr style="background-color: #f4f4f4; background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" ><!--COLOR DE CONTENEDOR-->
            <td align="center">
                <table border="0" align="center" width="790" cellpadding="0" cellspacing="0" class="container590" style="background-color: #ffffff; border: #ffffff solid; border-width: 30px;"><!--Color de fondo-->
                    <tr ><br>

                    <!--DIV DATOS DE USUARIO-->
                    <!--<div id="datosusuario" >
                    <h6 style="font: sans-serif;" >Mostar Nombre de usuario</h6>
                    </div><br>-->

                    <td align="center" class="section-img"><br>

                    <div style="background-color: #ffffff;" >
                    <h4 style="font: sans-serif;" >Nuestro Vehículo</h4>
                    </div><br>
                    
                    <!--DIV VIDEO--> 
                    <style type="text/css">.video-container {
                                          position: relative;
                                          padding-bottom: 56.25%;
                                          padding-top: 30px; height: 0; overflow: hidden;
                                          }

                                          .video-container iframe,
                                          .video-container object,
                                          .video-container embed {
                                          position: absolute;
                                          top: 0;
                                          left: 0;
                                          width: 100%;
                                          height: 100%;
                                          }</style>               
                    <div id="video" class="video-container  embed-responsive embed-responsive-16by9" >                    
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/weaMyp5Aw84?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    </td>
                    </tr>
                    
                    <td align="center" style="color: #000000; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header"><br>
                            
                      
                      <!--<div>
                        <button  type="submit" class="btn btn-primary"><a href="p-3.html" style="color: white; text-decoration: none;">VER SIGUIENTE VIDEO</a></button>
                      </div><br>-->
<!--INICIO MODAL-->

<div class="container">
   <!-------------------------------------------------------------------->
   <div>   <!--
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    -->
                    <!--DIV WHATSAPP--><!--
                    <div id="whatsapp" align="center" >
                          <a href="https://api.whatsapp.com/send?phone=51961444751&text=Quiero%20ser%20parte%20de%20Vida%20Divina" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div>-->




  <br>
  <br>


   <!-------------------------------------------------------------------->
  <!-- Button to Open the Modal -->
  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Ver siguiente video
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        
      <form action="../controladores/Roles.controlador.php?a=ingrp" method="POST">
        <!--<form id="registro" name="registro"  method="POST" action="guardarRegistro.php">-->
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Vas por buen camino..</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <p>Me alegra que hayas llegado hasta aqui, completa el siguiente formulario para ver el siguiente video</p>
        </div>
            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <!-- ENTRADA PARA EL ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="hidden" class="form-control input-lg" name="id" id="id" placeholder="Ingresa el id de tu afiliado" value="<?php echo $id;?>">

            </div>

           </div>
           
            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Nombres y Apellido" required>

              </div>

            </div>



            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="celular" id="celular" placeholder="Ingresar numero movil"required>

              </div>

            </div>
          <!-- ENTRADA PARA CORREO ELECTRONICO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

              <input type="email" class="form-control input-lg" name="correo" id="correo" placeholder="Ingresar Email" required>

            </div>

          </div>



            <!-- ENTRADA PARA PAIS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                <input type="text" class="form-control input-lg" name="pais" id="pais" placeholder="Ingresar País" required>

              </div>

            </div>


        </div>

    </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input class="btn btn-primary" type="submit" name="submit" value="Registrarse" id="Registrarse"/>
          <!--<button type="submit" class="btn btn-primary" data-dismiss="modal">Registrar</button>-->
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>

        </form>
        
      </div>
    </div>
  </div>
  
</div>

<!-- FIN DE MODAL-->

                        <!--                                
                    <div>
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    -->
                    <!--DIV WHATSAPP--><!---
                    <div id="whatsapp" align="center" >
                          <a href="#" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div> -->
                        

                    </div><br>


                    <!--DIV COMENTARIOS-->
                    <div id="comentarios">
                      <div id="fb-root"></div>
                      <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=1791513357598738&autoLogAppEvents=1";
                      fjs.parentNode.insertBefore(js, fjs);
                      }(document, "script", "facebook-jssdk"));</script>
                      <div class="fb-comments" data-href="https://m.imperiodeliderazgo.com/956770/p-1.html" data-width="100%" data-numposts="5"></div>
                    </div>
                    </td>

            </table>
            </td>
        </tr>
                              

    </table><br>
    <!-- end section -->

   <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
            <div class="footer txt-copy"><strong>Copyright &copy; 2020 <a href="https://imperiodeliderazgo.com" target="_blank">Imperio de Liderazgo</a>.</strong> Todos los derechos reservados.
            </div>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
  <!-- end footer ====== -->

  <script src="../bootstrap.min.js"></script>
  <script src="../jquery.min.js"></script>
  <script src="../popper.min.js"></script>

</body>

</html>







';

/*------------------------Prospecto1 pagina 2-------------------------------------*/

$pathLpDos=$nombreUsuario."/p-2.php"; 

$openLpDos = fopen ($pathLpDos,"w");//a+ 

if ($openLpDos) { 
	fwrite ($openLpDos,"$lpDos"); 
}
fclose($openLpDos);



/*----------------------------------------------------------------------------*/

//Creando Landing page 3
$lpTres='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>Nuestro plan de negocio - Imperio de liderazgo</title>
    <link rel="icon" href="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/fabicon2.png" />
    <meta content="Imperio de liderazgo" property="og:title"/>
    <meta content="https://m.imperiodeliderazgo.com/imgs/el-mejor-negocio.jpg" property="og:image"/>
    <meta name="description" content="Descubra el negocio con las variables correctas.">
    <!--[if !mso]--><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <!-- <![endif]-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        

        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #f4f4f4; " >
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Imperio de Liderazgo
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr style="background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" >
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:90px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 180px;" src="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/logo2.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4" class="bg_color">

        <tr style="background-color: #f4f4f4; background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" ><!--COLOR DE CONTENEDOR-->
            <td align="center">
                <table border="0" align="center" width="790" cellpadding="0" cellspacing="0" class="container590" style="background-color: #ffffff; border: #ffffff solid; border-width: 30px;"><!--Color de fondo-->
                    <tr ><br>

                    <!--DIV DATOS DE USUARIO-->
                    <!--<div id="datosusuario" >
                    <h6 style="font: sans-serif;" >Mostar Nombre de usuario</h6>
                    </div><br>-->

                    <td align="center" class="section-img"><br>

                    <div style="background-color: #ffffff;" >
                    <h4 style="font: sans-serif;" >Sistema Y Resultados</h4>
                    </div><br>
                    
                    <!--DIV VIDEO--> 
                    <style type="text/css">.video-container {
                                          position: relative;
                                          padding-bottom: 56.25%;
                                          padding-top: 30px; height: 0; overflow: hidden;
                                          }

                                          .video-container iframe,
                                          .video-container object,
                                          .video-container embed {
                                          position: absolute;
                                          top: 0;
                                          left: 0;
                                          width: 100%;
                                          height: 100%;
                                          }</style>               
                    <div id="video" class="video-container  embed-responsive embed-responsive-16by9" >                    
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/V1P0ci8SwgU?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    </td>
                    </tr>
                    
                   <td align="center" style="color: #000000; font-size: 24px; font-family: Tahoma, Geneva, sans-serif; font-weight:700;letter-spacing: 1px; line-height: 35px;" class="main-header"><br>
                            
                      
                      

                                                        
                    <div>
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    
                    <!--DIV WHATSAPP-->
                    <div id="whatsapp" align="center" >
                          <a href="https://api.whatsapp.com/send?phone=7973937927329&text=Quiero%20ser%20parte%20de%20Mydailychoice" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div>
                        

                    </div><br>


                    <!--DIV COMENTARIOS-->
                    <div id="comentarios">
                      <div id="fb-root"></div>
                      <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=1791513357598738&autoLogAppEvents=1";
                      fjs.parentNode.insertBefore(js, fjs);
                      }(document, "script", "facebook-jssdk"));</script>
                      <div class="fb-comments" data-href="https://m.imperiodeliderazgo.com/956770/p-1.html" data-width="100%" data-numposts="5"></div>
                    </div>
                    </td>

            </table>
            </td>
        </tr>
                              

    </table><br>
    <!-- end section -->

   <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
            <div class="footer txt-copy"><strong>Copyright &copy; 2020 <a href="https://imperiodeliderazgo.com" target="_blank">Imperio de Liderazgo</a>.</strong> Todos los derechos reservados.
            </div>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
  <!-- end footer ====== -->

</body>

</html>

';
/*------------------------Prospecto1 pagina 3-------------------------------------*/

$pathLpTres=$nombreUsuario."/p-3.html"; 

$openLpTres = fopen ($pathLpTres,"w");//a+ 

if ($openLpTres) { 
  fwrite ($openLpTres,"$lpTres"); 
}
fclose($openLpTres);
/*------------------------Prospecto 2 pagina 1-------------------------------------*/
//Creando Landing page FACEBOOK

$vidDos='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>HIGH LIFE TRAVEL - Imperio de liderazgo</title>
    <link rel="icon" href="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/fabicon2.png" />
    <meta content="Imperio de liderazgo" property="og:title"/>
    <meta content="https://m.imperiodeliderazgo.com/imgs/el-mejor-negocio.jpg" property="og:image"/>
    <meta name="description" content="Descubra el negocio con las variables correctas.">
    <!--[if !mso]--><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <!-- <![endif]-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        

        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #f4f4f4; " >
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Imperio de Liderazgo
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr style="background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" >
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:90px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 180px;" src="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/logo2.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4" class="bg_color">

        <tr style="background-color: #f4f4f4; background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" ><!--COLOR DE CONTENEDOR-->
            <td align="center">
                <table border="0" align="center" width="790" cellpadding="0" cellspacing="0" class="container590" style="background-color: #ffffff; border: #ffffff solid; border-width: 30px;"><!--Color de fondo-->
                    <tr ><br>

                    <!--DIV DATOS DE USUARIO-->
                    <!--<div id="datosusuario" >
                    <h6 style="font: sans-serif;" >Mostar Nombre de usuario</h6>
                    </div><br>-->

                    <td align="center" class="section-img"><br>

                    <div style="background-color: #ffffff;" >
                    <h4 style="font: sans-serif;" >HIGH LIFE TRAVEL</h4>
                    </div><br>
                    
                    <!--DIV VIDEO--> 
                    <style type="text/css">.video-container {
                                          position: relative;
                                          padding-bottom: 56.25%;
                                          padding-top: 30px; height: 0; overflow: hidden;
                                          }

                                          .video-container iframe,
                                          .video-container object,
                                          .video-container embed {
                                          position: absolute;
                                          top: 0;
                                          left: 0;
                                          width: 100%;
                                          height: 100%;
                                          }</style>               
                    <div id="video" class="video-container  embed-responsive embed-responsive-16by9" >                    
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/MuVBLOK-Ruo?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    </td>
                    </tr>
                    
                    <td align="center" style="color: #000000; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header"><br>
                            
                      
                      <div>
                        <button  class="btn btn-primary"><a href="s-2.php" style="color: white; text-decoration: none;">VER SIGUIENTE VIDEO</a></button>
                      </div>

                      <!---                                  
                    <div>
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    -->
                    <!--DIV WHATSAPP--><!--
                    <div id="whatsapp" align="center" >
                          <a href="#" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div>
                -->

                    </div><br>


                    <!--DIV COMENTARIOS-->

                    </td>

            </table>
            </td>
        </tr>
                              

    </table><br>
    <!-- end section -->

   <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
            <div class="footer txt-copy"><strong>Copyright &copy; 2020 <a href="https://imperiodeliderazgo.com" target="_blank">Imperio de Liderazgo</a>.</strong> Todos los derechos reservados.
            </div>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
  <!-- end footer ====== -->

</body>

</html>

';

$pathVidDos=$nombreUsuario."/s-1.html"; 

$openVidDos = fopen ($pathVidDos,"w");//a+ 

if ($openVidDos) { 
	fwrite ($openVidDos,"$vidDos"); 
}
fclose($openVidDos);

/*------------------------Prospecto 2 pagina 2-------------------------------------*/

$vidTres='<?php
include("../include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>Nuestro vehículo - Imperio de liderazgo</title>
    <link rel="icon" href="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/fabicon2.png" />
    <meta content="Imperio de liderazgo" property="og:title"/>
    <meta content="https://m.imperiodeliderazgo.com/imgs/el-mejor-negocio.jpg" property="og:image"/>
    <meta name="description" content="Descubra el negocio con las variables correctas.">
    <!--[if !mso]--><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <!-- <![endif]-->

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="../bootstrap.min.js"></script>
    <script src="../jquery.min.js"></script>
    <script src="../popper.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        

        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #f4f4f4; " >
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Imperio de Liderazgo
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr style="background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" >
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:90px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 180px;" src="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/logo2.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4" class="bg_color">

        <tr style="background-color: #f4f4f4; background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" ><!--COLOR DE CONTENEDOR-->
            <td align="center">
                <table border="0" align="center" width="790" cellpadding="0" cellspacing="0" class="container590" style="background-color: #ffffff; border: #ffffff solid; border-width: 30px;"><!--Color de fondo-->
                    <tr ><br>

                    <!--DIV DATOS DE USUARIO-->
                    <!--<div id="datosusuario" >
                    <h6 style="font: sans-serif;" >Mostar Nombre de usuario</h6>
                    </div><br>-->

                    <td align="center" class="section-img"><br>

                    <div style="background-color: #ffffff;" >
                    <h4 style="font: sans-serif;" >Sistema y Resultados</h4>
                    </div><br>
                    
                    <!--DIV VIDEO--> 
                    <style type="text/css">.video-container {
                                          position: relative;
                                          padding-bottom: 56.25%;
                                          padding-top: 30px; height: 0; overflow: hidden;
                                          }

                                          .video-container iframe,
                                          .video-container object,
                                          .video-container embed {
                                          position: absolute;
                                          top: 0;
                                          left: 0;
                                          width: 100%;
                                          height: 100%;
                                          }</style>               
                    <div id="video" class="video-container  embed-responsive embed-responsive-16by9" >                    
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/weaMyp5Aw84?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    </td>
                    </tr>
                    
                    <td align="center" style="color: #000000; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header"><br>
                            
                      
                      <!--<div>
                        <button  type="submit" class="btn btn-primary"><a href="p-3.html" style="color: white; text-decoration: none;">VER SIGUIENTE VIDEO</a></button>
                      </div><br>-->
<!--INICIO MODAL-->

<div class="container">
   <!-------------------------------------------------------------------->
   <div> <!--
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    -->
                    <!--DIV WHATSAPP--><!--
                    <div id="whatsapp" align="center" >
                          <a href="https://api.whatsapp.com/send?phone=51961444751&text=Quiero%20ser%20parte%20de%20Vida%20Divina" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div>-->




  <br>
  <br>


   <!-------------------------------------------------------------------->
  <!-- Button to Open the Modal -->
  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Ver siguiente video
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        
      <form action="../controladores/Roles.controlador.php?a=ingrs" method="POST">
        <!--<form id="registro" name="registro"  method="POST" action="guardarRegistro.php">-->
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Vas por buen camino..</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <p>Me alegra que hayas llegado hasta aqui, completa el siguiente formulario para ver el siguiente video</p>
        </div>
            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <!-- ENTRADA PARA EL ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="hidden" class="form-control input-lg" name="id" id="id" placeholder="Ingresa el id de tu afiliado" value="<?php echo $id;?>">

            </div>

           </div>

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Nombres y Apellido" required>

              </div>

            </div>



            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="celular" id="celular" placeholder="Ingresar numero movil"required>

              </div>

            </div>
          <!-- ENTRADA PARA CORREO ELECTRONICO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

              <input type="email" class="form-control input-lg" name="correo" id="correo" placeholder="Ingresar Email" required>

            </div>

          </div>



            <!-- ENTRADA PARA PAIS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                <input type="text" class="form-control input-lg" name="pais" id="pais" placeholder="Ingresar País" required>

              </div>

            </div>


        </div>

    </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input class="btn btn-primary" type="submit" name="submit2" value="Registrarse" id="Registrarse"/>
          <!--<button type="submit" class="btn btn-primary" data-dismiss="modal">Registrar</button>-->
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>

        </form>
        
      </div>
    </div>
  </div>
  
</div>

<!-- FIN DE MODAL-->

                        <!--                                
                    <div>
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    -->
                    <!--DIV WHATSAPP--><!---
                    <div id="whatsapp" align="center" >
                          <a href="#" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div> -->
                        

                    </div><br>


                    <!--DIV COMENTARIOS-->
                    <div id="comentarios">
                      <div id="fb-root"></div>
                      <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=1791513357598738&autoLogAppEvents=1";
                      fjs.parentNode.insertBefore(js, fjs);
                      }(document, "script", "facebook-jssdk"));</script>
                      <div class="fb-comments" data-href="https://m.imperiodeliderazgo.com/956770/p-1.html" data-width="100%" data-numposts="5"></div>
                    </div>
                    </td>

            </table>
            </td>
        </tr>
                              

    </table><br>
    <!-- end section -->

   <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
            <div class="footer txt-copy"><strong>Copyright &copy; 2020 <a href="https://imperiodeliderazgo.com" target="_blank">Imperio de Liderazgo</a>.</strong> Todos los derechos reservados.
            </div>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
  <!-- end footer ====== -->

  <script src="../bootstrap.min.js"></script>
  <script src="../jquery.min.js"></script>
  <script src="../popper.min.js"></script>

</body>

</html>







';

$pathVidTres=$nombreUsuario."/s-2.php"; 

$openVidTres = fopen ($pathVidTres,"w");//a+ 

	if ($openVidTres) { 
		fwrite ($openVidTres,"$vidTres"); 
	}
	fclose($openVidTres);

/*------------------------Prospecto 2 pagina 3-------------------------------------*/

$vidCuatro='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>Sistema Y Resultados - Imperio de liderazgo</title>
    <link rel="icon" href="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/fabicon2.png" />
    <meta content="Imperio de liderazgo" property="og:title"/>
    <meta content="https://m.imperiodeliderazgo.com/imgs/el-mejor-negocio.jpg" property="og:image"/>
    <meta name="description" content="Descubra el negocio con las variables correctas.">
    <!--[if !mso]--><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <!-- <![endif]-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        

        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #f4f4f4; " >
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Imperio de Liderazgo
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr style="background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" >
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:90px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 180px;" src="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/logo2.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4" class="bg_color">

        <tr style="background-color: #f4f4f4; background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" ><!--COLOR DE CONTENEDOR-->
            <td align="center">
                <table border="0" align="center" width="790" cellpadding="0" cellspacing="0" class="container590" style="background-color: #ffffff; border: #ffffff solid; border-width: 30px;"><!--Color de fondo-->
                    <tr ><br>

                    <!--DIV DATOS DE USUARIO-->
                    <!--<div id="datosusuario" >
                    <h6 style="font: sans-serif;" >Mostar Nombre de usuario</h6>
                    </div><br>-->

                    <td align="center" class="section-img"><br>

                    <div style="background-color: #ffffff;" >
                    <h4 style="font: sans-serif;" >Sistema Y Resultados</h4>
                    </div><br>
                    
                    <!--DIV VIDEO--> 
                    <style type="text/css">.video-container {
                                          position: relative;
                                          padding-bottom: 56.25%;
                                          padding-top: 30px; height: 0; overflow: hidden;
                                          }

                                          .video-container iframe,
                                          .video-container object,
                                          .video-container embed {
                                          position: absolute;
                                          top: 0;
                                          left: 0;
                                          width: 100%;
                                          height: 100%;
                                          }</style>               
                    <div id="video" class="video-container  embed-responsive embed-responsive-16by9" >                    
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/wSApRt29Q_U?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    </td>
                    </tr>
                    
                    <td align="center" style="color: #000000; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header"><br>                         
                                          
                                                        
                    <div>
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    
                    <!--DIV WHATSAPP-->
                    <div id="whatsapp" align="center" >
                          <a href="https://api.whatsapp.com/send?phone=308308298320&text=Quiero%20ser%20parte%20de%20Mydailychoice" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div>
                        

                    </div><br>


                    <!--DIV COMENTARIOS-->
                    <div id="comentarios">
                      <div id="fb-root"></div>
                      <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=1791513357598738&autoLogAppEvents=1";
                      fjs.parentNode.insertBefore(js, fjs);
                      }(document, "script", "facebook-jssdk"));</script>
                      <div class="fb-comments" data-href="https://m.imperiodeliderazgo.com/956770/p-1.html" data-width="100%" data-numposts="5"></div>
                    </div>
                    </td>

            </table>
            </td>
        </tr>
                              

    </table><br>
    <!-- end section -->

   <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
            <div class="footer txt-copy"><strong>Copyright &copy; 2020 <a href="https://imperiodeliderazgo.com" target="_blank">Imperio de Liderazgo</a>.</strong> Todos los derechos reservados.
            </div>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
  <!-- end footer ====== -->

</body>

</html>

';

$pathVidCuatro=$nombreUsuario."/s-3.html"; 

$openVidCuatro = fopen ($pathVidCuatro,"w");//a+ 

  if ($openVidCuatro) { 
    fwrite ($openVidCuatro,"$vidCuatro"); 
  }
  fclose($openVidCuatro);

 /*------------------------Seguimiento pagina 1-------------------------------------*/
$vidCinco='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>El Secreto Para Adelgazar - Imperio de liderazgo</title>
    <link rel="icon" href="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/fabicon2.png" />
    <meta content="Imperio de liderazgo" property="og:title"/>
    <meta content="https://m.imperiodeliderazgo.com/imgs/el-mejor-negocio.jpg" property="og:image"/>
    <meta name="description" content="Descubra el negocio con las variables correctas.">
    <!--[if !mso]--><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <!-- <![endif]-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        

        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #f4f4f4; " >
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Imperio de Liderazgo
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr style="background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" >
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:90px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 180px;" src="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/logo2.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4" class="bg_color">

        <tr style="background-color: #f4f4f4; background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" ><!--COLOR DE CONTENEDOR-->
            <td align="center">
                <table border="0" align="center" width="790" cellpadding="0" cellspacing="0" class="container590" style="background-color: #ffffff; border: #ffffff solid; border-width: 30px;"><!--Color de fondo-->
                    <tr ><br>

                    <!--DIV DATOS DE USUARIO-->
                    <!--<div id="datosusuario" >
                    <h6 style="font: sans-serif;" >Mostar Nombre de usuario</h6>
                    </div><br>-->

                    <td align="center" class="section-img"><br>

                    <div style="background-color: #ffffff;" >
                    <h4 style="font: sans-serif;" >Bienvenido A La Fórmula Correcta</h4>
                    </div><br>
                    
                    <!--DIV VIDEO--> 
                    <style type="text/css">.video-container {
                                          position: relative;
                                          padding-bottom: 56.25%;
                                          padding-top: 30px; height: 0; overflow: hidden;
                                          }

                                          .video-container iframe,
                                          .video-container object,
                                          .video-container embed {
                                          position: absolute;
                                          top: 0;
                                          left: 0;
                                          width: 100%;
                                          height: 100%;
                                          }</style>               
                    <div id="video" class="video-container  embed-responsive embed-responsive-16by9" >                    
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/5BJ6_2p6mG0?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    </td>
                    </tr>
                    
                    <td align="center" style="color: #000000; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header"><br>
                            
                      
                      <div>
                        <button type="submit" class="btn btn-primary"><a href="v-2.php" style="color: white; text-decoration: none;">VER SIGUIENTE VIDEO</a></button>
                      </div><br>

                         <!---                               
                    <div>
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    -->
                    <!--DIV WHATSAPP--><!---
                    <div id="whatsapp" align="center" >
                          <a href="#" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div>-->
                        

                    </div><br>


                    <!--DIV COMENTARIOS-->

                    </td>

            </table>
            </td>
        </tr>
                              

    </table><br>
    <!-- end section -->

   <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
            <div class="footer txt-copy"><strong>Copyright &copy; 2020 <a href="https://imperiodeliderazgo.com" target="_blank">Imperio de Liderazgo</a>.</strong> Todos los derechos reservados.
            </div>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
  <!-- end footer ====== -->

</body>

</html>


';

$pathVidCinco=$nombreUsuario."/v-1.html"; 

$openVidCinco = fopen ($pathVidCinco,"w");//a+ 

  if ($openVidCinco) { 
    fwrite ($openVidCinco,"$vidCinco"); 
  }
  fclose($openVidCinco);

/*------------------------Seguimiento pagina 2-------------------------------------*/
$vidseis='<?php
include("../include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>Te Divina - Imperio de liderazgo</title>
    <link rel="icon" href="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/fabicon2.png" />
    <meta content="Imperio de liderazgo" property="og:title"/>
    <meta content="https://m.imperiodeliderazgo.com/imgs/el-mejor-negocio.jpg" property="og:image"/>
    <meta name="description" content="Descubra el negocio con las variables correctas.">
    <!--[if !mso]--><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <!-- <![endif]-->

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="../bootstrap.min.js"></script>
    <script src="../jquery.min.js"></script>
    <script src="../popper.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        

        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #f4f4f4; " >
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Imperio de Liderazgo
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr style="background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" >
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:90px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 180px;" src="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/logo2.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4" class="bg_color">

        <tr style="background-color: #f4f4f4; background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" ><!--COLOR DE CONTENEDOR-->
            <td align="center">
                <table border="0" align="center" width="790" cellpadding="0" cellspacing="0" class="container590" style="background-color: #ffffff; border: #ffffff solid; border-width: 30px;"><!--Color de fondo-->
                    <tr ><br>

                    <!--DIV DATOS DE USUARIO-->
                    <!--<div id="datosusuario" >
                    <h6 style="font: sans-serif;" >Mostar Nombre de usuario</h6>
                    </div><br>-->

                    <td align="center" class="section-img"><br>

                    <div style="background-color: #ffffff;" >
                    <h4 style="font: sans-serif;" >Nuestro Vehículo</h4>
                    </div><br>
                    
                    <!--DIV VIDEO--> 
                    <style type="text/css">.video-container {
                                          position: relative;
                                          padding-bottom: 56.25%;
                                          padding-top: 30px; height: 0; overflow: hidden;
                                          }

                                          .video-container iframe,
                                          .video-container object,
                                          .video-container embed {
                                          position: absolute;
                                          top: 0;
                                          left: 0;
                                          width: 100%;
                                          height: 100%;
                                          }</style>               
                    <div id="video" class="video-container  embed-responsive embed-responsive-16by9" >                    
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/M2mt7eNFNK0?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    </td>
                    </tr>
                    
                    <td align="center" style="color: #000000; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header"><br>
                            
                      
                      <!--<div>
                        <button  type="submit" class="btn btn-primary"><a href="p-3.html" style="color: white; text-decoration: none;">VER SIGUIENTE VIDEO</a></button>
                      </div><br>-->
<!--INICIO MODAL-->

<div class="container">
<!---------------------------------------------------------->
<div>   <!--
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    -->
                    <!--DIV WHATSAPP--><!--
                    <div id="whatsapp" align="center" >
                          <a href="https://api.whatsapp.com/send?phone=51961444751&text=Quiero%20ser%20parte%20de%20Vida%20Divina" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div>-->




  <br>
  <br>









<!---------------------------------------------------------->
  <!-- Button to Open the Modal -->
  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Ver siguiente video
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

      <form action="../controladores/Roles.controlador.php?a=ingrv" method="POST">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Vas por buen camino..</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <p>Me alegra que hayas llegado hasta aqui, completa el siguiente formulario para ver el siguiente video</p>
        </div>
            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <!-- ENTRADA PARA EL ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="hidden" class="form-control input-lg" name="id" id="id" placeholder="Ingresa el id de tu afiliado" value="<?php echo $id;?>">

            </div>

           </div>

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Nombres y Apellido" required>

              </div>

            </div>



            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" placeholder="Ingresar numero movil" name="celular" id="celular" required>

              </div>

            </div>
          <!-- ENTRADA PARA CORREO ELECTRONICO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

              <input type="email" class="form-control input-lg" name="correo" id="correo" placeholder="Ingresar Email" required>

            </div>

          </div>



            <!-- ENTRADA PARA PAIS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                <input type="text" class="form-control input-lg"  name="pais" id="pais" placeholder="Ingresar País" required>

              </div>

            </div>


        </div>

    </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <input class="btn btn-primary" type="submit" name="submit3" value="Registrarse" id="Registrarse"/>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>
  
</div>

<!-- FIN DE MODAL-->

                        <!--                                
                    <div>
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6><br>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    -->
                    <!--DIV WHATSAPP--><!---
                    <div id="whatsapp" align="center" >
                          <a href="#" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div> -->
                        

                    </div><br>


                    <!--DIV COMENTARIOS-->
                    <div id="comentarios">
                      <div id="fb-root"></div>
                      <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=1791513357598738&autoLogAppEvents=1";
                      fjs.parentNode.insertBefore(js, fjs);
                      }(document, "script", "facebook-jssdk"));</script>
                      <div class="fb-comments" data-href="https://m.imperiodeliderazgo.com/956770/p-1.html" data-width="100%" data-numposts="5"></div>
                    </div>
                    </td>

            </table>
            </td>
        </tr>
                              

    </table><br>
    <!-- end section -->

   <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
            <div class="footer txt-copy"><strong>Copyright &copy; 2020 <a href="https://imperiodeliderazgo.com" target="_blank">Imperio de Liderazgo</a>.</strong> Todos los derechos reservados.
            </div>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
  <!-- end footer ====== -->

  <script src="../bootstrap.min.js"></script>
  <script src="../jquery.min.js"></script>
  <script src="../popper.min.js"></script>

</body>

</html>







';

$pathVidseis=$nombreUsuario."/v-2.php"; 

$openVidseis = fopen ($pathVidseis,"w");//a+ 

  if ($openVidseis) { 
    fwrite ($openVidseis,"$vidseis"); 
  }
  fclose($openVidseis);


/*------------------------Seguimiento pagina 3-------------------------------------*/
$inter_h_1='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>Testimonios - Imperio de liderazgo</title>
    <link rel="icon" href="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/fabicon2.png" />
    <meta content="Imperio de liderazgo" property="og:title"/>
    <meta content="https://m.imperiodeliderazgo.com/imgs/el-mejor-negocio.jpg" property="og:image"/>
    <meta name="description" content="Descubra el negocio con las variables correctas.">
    <!--[if !mso]--><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <!-- <![endif]-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        

        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #f4f4f4; " >
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Imperio de Liderazgo
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr style="background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" >
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:90px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 180px;" src="https://imperiodeliderazgo.com/wp-content/uploads/2020/05/logo2.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4" class="bg_color">

        <tr style="background-color: #f4f4f4; background: url(https://imperiodeliderazgo.com/wp-content/uploads/2020/05/slider-fondo-azul.jpg); background-repeat: no-repeat; width: 100%;" ><!--COLOR DE CONTENEDOR-->
            <td align="center">
                <table border="0" align="center" width="790" cellpadding="0" cellspacing="0" class="container590" style="background-color: #ffffff; border: #ffffff solid; border-width: 30px;"><!--Color de fondo-->
                    <tr ><br>

                    <!--DIV DATOS DE USUARIO-->
                    <!--<div id="datosusuario" >
                    <h6 style="font: sans-serif;" >Mostar Nombre de usuario</h6>
                    </div><br>-->

                    <td align="center" class="section-img"><br>

                    <div style="background-color: #ffffff;" >
                    <h4 style="font: sans-serif;" >Sistema Y Resultados</h4>
                    </div><br>
                    
                    <!--DIV VIDEO--> 
                    <style type="text/css">.video-container {
                                          position: relative;
                                          padding-bottom: 56.25%;
                                          padding-top: 30px; height: 0; overflow: hidden;
                                          }

                                          .video-container iframe,
                                          .video-container object,
                                          .video-container embed {
                                          position: absolute;
                                          top: 0;
                                          left: 0;
                                          width: 100%;
                                          height: 100%;
                                          }</style>               
                    <div id="video" class="video-container  embed-responsive embed-responsive-16by9" >                    
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/qdIo5HTswBM?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                    </td>
                    </tr>
                    
                    <td align="center" style="color: #000000; font-size: 24px; font-family: Tahoma, Geneva, sans-serif; font-weight:700;letter-spacing: 1px; line-height: 35px;" class="main-header"><br>
                            

                    <div>
                        <h6 class="text-primaryr" style="font-family: Arial;" ><strong>¿QUIERES SER PARTE DE NUESTRO EQUIPO?</strong></h6>
                        <h6  style="font-family: Arial;"><strong>¿Tienes alguna pregunta puntual?</strong></h6> 

                        <h6  style="font-family: Arial;">No te quedes con las dudas, da clic en la imagen de WhatsApp y con mucho gusto te estaremos apoyando de forma personalizada.</h6><br>
                    

                    <!--DIV WHATSAPP-->
                    <div id="whatsapp" align="center" >
                          <a href="https://api.whatsapp.com/send?phone=8303280820&text=Quiero%20ser%20parte%20de%20Mydailychoice" target="_blank"><img src="https://m.imperiodeliderazgo.com/imgs/whatsapp.png"></a>
                    </div>
                        

                    </div><br>


                    <!--DIV COMENTARIOS-->
                    <div id="comentarios">
                      <div id="fb-root"></div>
                      <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=1791513357598738&autoLogAppEvents=1";
                      fjs.parentNode.insertBefore(js, fjs);
                      }(document, "script", "facebook-jssdk"));</script>
                      <div class="fb-comments" data-href="https://m.imperiodeliderazgo.com/956770/p-1.html" data-width="100%" data-numposts="5"></div>
                    </div>
                    </td>

            </table>
            </td>
        </tr>
                              

    </table><br>
    <!-- end section -->

   <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
            <div class="footer txt-copy"><strong>Copyright &copy; 2020 <a href="https://imperiodeliderazgo.com" target="_blank">Imperio de Liderazgo</a>.</strong> Todos los derechos reservados.
            </div>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
  <!-- end footer ====== -->

</body>

</html>


';

$pathInter_h_1=$nombreUsuario."/v-3.html"; 

$openInter_h_1 = fopen ($pathInter_h_1,"w");//a+ 

  if ($openInter_h_1) { 
    fwrite ($openInter_h_1,"$inter_h_1"); 
  }
  fclose($openInter_h_1);


header("location:sistema.php");
}else{
	header("location:configuracion.php?estado=error");
	//echo "Debe especificar un 'id'.\n";
} 

//Cerrrar conexion a la BD
 mysqli_close($conexio);
?>
