<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./css/estilos.css" />  
  </head>
  <body><div class="area"></div><nav class="main-menu">
            <ul>
                <li class="has-subnav">
                    <a href="../instructor/instructor">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Inicio
                        </span>
                    </a>
                </li> 
                <li class="has-subnav">
                    <a href="../instructor/aprendicesAsignados">
                       <i class="fas fa-building fa-2x"></i>
                        <span class="nav-text">
                            Tus Aprendices
                        </span>
                    </a>    
                </li>
                <?php 
                 include '../../database/conexion.php';

                if(!isset($_SESSION)) {session_start();} else{

            
                $id = $_SESSION['instructor'];

                $notificacion = mysqli_query($conexion, "SELECT * FROM tbl_mensaje WHERE id_instructor = '$id' AND leido = 0" );

                $num = mysqli_num_rows($notificacion);

            }
            ?>
                <li class="has-subnav">
                    <a href="../instructor/mensajes">
                      <i class="fas fa-bell fa-2x"><span class="notificacion"><?php echo $num ?></i></span>
                        <span class="nav-text">
                            Mensajes
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="../instructor/agendarCita">
                      <i class="far fa-calendar-alt fa-2x"></i>
                        <span class="nav-text">
                            Agendar Visita
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="../instructor/agendas">
                      <i class="fas fa-calendar-check fa-2x"></i>
                        <span class="nav-text">
                            Tus Agendas
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="../instructor/mapa">
                      <i class="fas fa-route fa-2x"></i>
                        <span class="nav-text">
                            Mapa
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="../instructor/subirFormato">
                      <i class="fas fa-upload fa-2x"></i>
                        <span class="nav-text">
                            Subir Formato
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="../instructor/informeSIGA">
                      <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Formatos 023
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
            <li>
                    <a href="../instructor/perfilInstructor">
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