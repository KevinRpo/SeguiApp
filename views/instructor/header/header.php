
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./css/estilos.css" />

    <nav class="menu1">
    <h2>Seguimiento Aprendiz - SENA</h2>
        <ul>
            <li>|<a href="../instructor/perfilInstructor"><i class="fas fa-user" title="Perfil"></i></a></li> 
            <li><a href="../instructor/instructor"><i class="fas fa-home" title="Inicio"></i></a></li>
            <li><a href="../../includes/cerrarSesion.php"><i class="fas fa-power-off" title="Salir"></i></a></li>
        </ul>
    </nav>

  <header>
    <input type="checkbox" id="btn-menu" />
    <label for="btn-menu"><i class="fa fa-bars"></i></label>
    <nav class="menu">
        <ul>
            <li><a href="../instructor/mapa">Mapa</a></li>
            <li><a href="../instructor/aprendicesAsignados">Tus Aprendices</a></li> 
            <li><a href="../instructor/agendarCita">Agendar Cita</a></li> 
            <li><a href="../instructor/agendas">Tus Agendas</a></li> 
            <li><a href="../instructor/subirFormato">Formato023</a></li> 
            <li><a href="../instructor/informeSIGA">Tus Formatos</a></li> 
        <?php 
            include '../../database/conexion.php';

            if(!isset($_SESSION)) {session_start();} else{

            
            $id = $_SESSION['instructor'];

            $notificacion = mysqli_query($conexion, "SELECT * FROM tbl_mensaje WHERE id_instructor = '$id' AND leido = 0" );

            $num = mysqli_num_rows($notificacion);

            }
        ?>
        <li><a href="../instructor/mensajes">Mensajes<i  class="fas fa-envelope mensaje"></i><b>
  
            <?php echo $num ?></b></a></li>
        </ul>
    </nav>
  </header>
  