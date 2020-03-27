
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./css/estilos.css" />

    <nav class="menu1">
    <h2>Seguimiento Aprendiz - SENA</h2>
        <ul>
            <li>|<a href="../aprendiz/perfilAprendiz"><i class="fas fa-user" title="Perfil"></i></a></li> 
            <li><a href="../aprendiz/aprendiz"><i class="fas fa-home" title="Inicio"></i></a></li>
            <li><a href="../../includes/cerrarSesion.php"><i class="fas fa-power-off" title="Salir"></i></a></li>
        </ul>
    </nav>

  <header>
    <input type="checkbox" id="btn-menu" />
    <label for="btn-menu"><i class="fa fa-bars"></i></label>
    <nav class="menu">
        <ul>
        <li><a href="../aprendiz/datosEmpresa">Datos Empresa</a></li>
    
        <?php 
            include '../../database/conexion.php';

            if(!isset($_SESSION)) {session_start();} else{

            
            $id = $_SESSION['aprendiz'];

            $notificacion = mysqli_query($conexion, "SELECT * FROM tbl_citacion WHERE id_a = '$id' AND leido = 0" );

            $num = mysqli_num_rows($notificacion);

            }
        ?>
        <li><a href="../aprendiz/notificaciones">Visitas<i class="fas fa-bell notificacion"></i><b>
  
            <?php echo $num ?></b></a></li>
        <li><a href="../aprendiz/subirBitacoras">Bitácoras</a></li>
        </ul>
    </nav>
  </header>
  