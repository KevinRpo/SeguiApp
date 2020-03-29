<?php 
    session_start();
    $id = $_SESSION['admin'];

    if(!isset($id)){
        header("location:../../index");
    } else {

        include '../../database/conexion.php';

        $id = $_GET['id_a'];

        $sql = "SELECT * FROM tbl_aprendiz WHERE id_a = '".$id."'";

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
      <title>SeguiApp</title>
  </head>
  <body>
    <?php require_once ('./header/header.php'); ?>
    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <h2>SeguiApp<br>SENA</h2>
            </section>
        </section>
        <form action="../administrador/includes/editarAprendiz.php" method="POST" class="form_contact" >
            <h2>Actualizar Datos Aprendiz</h2> <br />
            <div class="user_info">
                <input type="hidden" name="txtid" id="id" value="<?php echo $fila['id_a'] ?>" />
                <label for="txtnombre">Nombres</label>
                <input type="text" name="txtnombre" id="nombre" value="<?php echo $fila['nombres'] ?>" /> 
                <label for="txtapellidos">Apellidos</label>
                <input type="text" name="txtapellidos" id="apellidos" value="<?php echo $fila['apellidos'] ?>" />
                <label for="txtemail">Email</label>
                <input type="email" name="txtemail" id="email" value="<?php echo $fila['email'] ?>"/> 
                <label for="txttelefono">Teléfono</label>
                <input type="number" name="txttel" id="tel" value="<?php echo $fila['telefono'] ?>" /> 

                <label for="txtrol">Rol</label>
                <select name="txtrol" id="rol">
                    <option value="aprendiz">Aprendiz</option>
                </select>  

                <label for="txtnumero_ficha">Número de Ficha</label>
                <input type="number" name="txtnumero_ficha" id="numero_ficha" value="<?php echo $fila['numero_ficha'] ?>" /> 
                <input type="submit" value="Actualizar" />
            </div>
        </form>
    </section>
        <?php } ?>
  </body>
  </html>

<?php } ?>
  