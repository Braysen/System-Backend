<?php
include("include/session.php");
include("header.php");
//@include("include/session.php");
include ("function.php");
//conectar_bd();
?>
<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Usuarios</title>
<script type="text/javascript" src="js/ajax.js"></script>
<link rel="stylesheet" type="text/css" href="css/lista.css">
<!--<link rel="stylesheet" type="text/css" href="css/style-admin.css">-->

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body style="background-color: white;">

    <div id="main" class="content"><!-- InstanceBeginEditable name="EditContent" -->
      <div class="sidebar">
      <div class="nav-side-menu">
          <div class="brand">
            Menú de acciones
          </div>
        <!--
        <div class="nav-side-menu">
    <div class="brand">Menú de acciones</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
-->

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
            <li>
                  <a href="bienvenido.php">
                  <i class="fa fa-home fa-lg"></i> Inicio
                  </a>
                </li>

                <!--Nuevas Opciones-->
                <li data-toggle="collapse" data-target="#inicio" class="collapsed">
                  <a href="#"><i class="fa fa-paper-plane fa-lg"></i> Inicio Rapido <span class="arrow"></span></a>
              </li>
              <ul class="sub-menu collapse" id="inicio">
                  <li><a href="<?php echo $urlhome; ?>/afiliacion.php" id="" target="">Afiliación</a></li>
                  <li><a href="<?php echo $urlhome; ?>/plan-accion.php" id="" target="">Plan de Acción</a></li>
                  <li><a href="<?php echo $urlhome; ?>/educacion.php" id="" target="">Educación</a></li>
                  <li><a href="<?php echo $urlhome; ?>/tutoriales.php" id="" target="">Tutoriales</a></li>
              </ul>
                <!--------------->


                 <li>
                  <a href="mi_cuenta.php">
                  <i class="fa fa-user fa-lg"></i> Perfil
                  </a>
                  </li>
                  <li>
                  <a href="listaprospectos.php">
                  <i class="fa fa-user fa-lg"></i> Lista de Prospectos
                  </a>
                  </li>
                  <!--
                  <li class="active">
                  <a href="configuracion.php">
                  <i class="fa fa-user fa-lg"></i> Configuración
                  </a>
                  </li>
                  -->
                  <?php 
                       if($tipoUser == "Administrador"){
                  ?>
                  <li class="active">
                  <a href="listuser.php">
                  <i class="fa fa-users fa-lg"></i> Usuarios
                  </a>
                  </li>
                  <li>
                  <a href="<?php echo $urlhome; ?>/ghb124cc107tpa7ch3f8rg7e572c8rd8.php">
                  <i class="fa fa-plus fa-lg"></i> Nuevo Usuario
                  </a>
                  </li>
                  <?php
                        };
                  ?>

                  
                  <li>
                  <a href="recursos.php">
                  <i class="fa fa-archive fa-lg"></i> Centro de recursos
                  </a>

                  <li>
                  <a href="#">
                  <i class="fa-lg"></i>
                  </a>
                </li>

                
                </li>
              <li data-toggle="collapse" data-target="#sistema" class="collapsed">
                  <a href="#"><i class="fa fa-dashboard fa-lg"></i> Sistema <span class="arrow"></span></a>
              </li>
              <ul class="sub-menu collapse" id="sistema">
                  <li><a href="<?php echo $urlhome; ?>/sistema.php" id="" target="">Ver Sistema</a></li>
                  <li><a href="<?php echo $urlhome; ?>/configuracion.php" id="" target="">Editar Sistema</a></li>
                  <li><a href="<?php echo $urlhome; ?>/configuracion.php" id="" target="">Configuración</a></li>
              </ul>

              <li>
                  <a href="login.php">
                  <i class="fa fa-sign-out"></i> Cerrar Sesion
                  </a>
                  </li>

            </ul>
     </div>
</div>
      </div>
      <div class="content-page">
        <div class="content-header">
          <h1>Lista de Usuarios</h1>
          <?php 
        @$estado = $_GET['estado'];

        switch ($estado) {
          case 'error':
            echo '<p style="color: #DE0007; background: #FFE9E9; border: solid 1px #FFC7C8; padding: 10px 10px; font-size: 14px; font-style: italic;">Error: Antes de generar sus paginas ustede debera actualizar su nombre para mostrar de la seccion Perfil</p>';
            break;
          default:
            # code...
            break;
        }
      ?>

        </div>
        <div class="content-main">
            <div>
                <?php
          @$user = $_GET['user'];
        
          if (!empty($user) && $user == 'delete') {
            echo '<p style="color: #0B8000; background: #D1FFCF; border: solid 1px #0B8000; padding: 10px 10px; font-weight: bold; font-style: italic;">Se ha eliminado un usuario satisfactoriamente.</p>';
          }elseif (!empty($user) && $user == 'edit') {
              echo '<p style="color: #0B8000; background: #D1FFCF; border: solid 1px #0B8000; padding: 10px 10px; font-weight: bold; font-style: italic;">Se ha editado los datos del usuario satisfactoriamente!!!</p>';
          }elseif (!empty($user) && $user == 'error') {
              echo '<p style="color: #CD0008; background: #FFCFCF; border: solid 1px #CD0008; padding: 10px 10px; font-weight: bold; font-style: italic;">No se pudo procesar su petición por alguna razón!!!</p>';
          }  else{
            
          }
        
        ?>
            </div>
        </div>
        <?php include('paginador.php') ?>
      </div>
    <!-- InstanceEndEditable --></div>

    <div>
        <?php
    include("footer.php");
    ?>
    </div>
    <br></br>

</div>



</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
  $(document).on("click", "a.eliminar", function() {
    if (confirm('Estas seguro que deseas eliminar al usuario seleccionado?')) {
        //$(this).prev('span.text').remove();
        location.href = $(this).attr('title');
    }else{

    }
});

</script>

</body>
</html>