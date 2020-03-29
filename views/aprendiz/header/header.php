<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./css/estilos.css" />  
  </head>
  <body><div class="area"></div><nav class="main-menu">
            <ul>
                <li class="has-subnav">
                    <a href="../aprendiz/aprendiz">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Inicio
                        </span>
                    </a>
                </li> 
                <li class="has-subnav">
                    <a href="../aprendiz/datosEmpresa">
                       <i class="fas fa-building fa-2x"></i>
                        <span class="nav-text">
                            Datos Empresa
                        </span>
                    </a>    
                </li>
                <?php 
                    include '../../database/conexion.php';

                    if(!isset($_SESSION)) {session_start();} else{

                    
                    $id = $_SESSION['aprendiz'];

                    $notificacion = mysqli_query($conexion, "SELECT * FROM tbl_citacion WHERE id_a = '$id' AND leido = 0" );

                    $num = mysqli_num_rows($notificacion);

            }
        ?>
                <li class="has-subnav">
                    <a href="../aprendiz/notificaciones">
                      <i class="fas fa-bell fa-2x"><span class="notificacion"><?php echo $num ?></i></span>
                        <span class="nav-text">
                            Notificaciones
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="../aprendiz/addBitacora">
                      <i class="fas fa-upload fa-2x"></i>
                        <span class="nav-text">
                            Subir Bitácora
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="../aprendiz/subirBitacoras">
                      <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Bitácoras
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
            <li>
                    <a href="../aprendiz/perfilAprendiz">
                        <i class="fa fa-user fa-2x"></i>
                        <span class="nav-text">
                            Perfil
                        </span>
                    </a>
                  
                </li>
                <li>
                   <a href="../../includes/cerrarSesion.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Cerrar Sesión
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
  </body>
</html>