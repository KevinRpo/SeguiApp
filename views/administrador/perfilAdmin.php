<?php 
    session_start();
    $id = $_SESSION['admin'];

    if(!isset($id)){
        header("location:../../index");
        $id = $_POST['id'];
    } else {

        include '../../database/conexion.php';

        $sql = "SELECT * FROM tbl_registros WHERE id = '".$id."'";

        $resultado = mysqli_query($conexion, $sql);

        while ($fila = mysqli_fetch_assoc($resultado)) {

?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="../../assets/images/seguiapp.ico" />
      <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
      <link rel="stylesheet" href="./css/formularios.css" />
      <link rel="stylesheet" href="./css/perfilAdmin.css" />
      <script src="js/sweetalert2@9.js"></script>
      <script src="js/validar.js"></script>
      <title>SeguiApp</title>
  </head>
  <body>
  
    <?php require_once ('./header/header.php'); ?>
    <br />
            <div>
                <img src="images/perfil.png" class="logo_seguiapp" alt="logo_seguiapp" />
            </div>
            <h2>Administrador <br /><?php echo $fila['nombre'] ?> <?php echo $fila['apellidos'] ?></h2>
            <br /><br />
        <section class="form_wrap">
            <section class="cantact_info">
                <section class="info_title">
                    <h2>SeguiApp<br>SENA</h2>
                </section>
            </section>
            <form action="includes/actualizarPerfil.php" method="POST" class="form_contact" onsubmit="return validar();">
                <h2>DATOS PERSONALES</h2>
                <div class="user_info">
                    <input type="hidden" name="txtid" id="identificacion" value="<?php echo $fila['id'] ?>" /> 
                    <label for="id">Identificación</label>
                    <input type="text" name="txtid" id="id" value="<?php echo $fila['id'] ?>" disabled/> 
                    <label for="">Nombres</label>
                    <input type="text" name="txtnombre" id="nombre" value="<?php echo $fila['nombre'] ?>" required /> 
                    <label for="">Apellidos</label>
                    <input type="text" name="txtapellidos" id="apellidos" value="<?php echo $fila['apellidos'] ?>" required /> 
                    <label for="">Email </label>
                    <input type="email" name="txtemail" id="email" value="<?php echo $fila['email'] ?>" required/> 
                    <label for="">Teléfono </label>
                    <input type="number" name="txttel" id="tel" value="<?php echo $fila['telefono'] ?>" required /> 
                    <label for="">Clave </label>
                    <input type="password" name="txtclave" id="clave" value="" required /> 
                    <label for="">Confirmación de Clave </label>
                    <input type="password" name="txtconfirmar_clave" id="confirmar_clave" value="" required /> 
                    <input type="submit" value="Actualizar Datos" id="btnSend">
                </div>
            </form>
        </section>
    <?php } ?>
  </body>
  </html>

<?php } ?>
        