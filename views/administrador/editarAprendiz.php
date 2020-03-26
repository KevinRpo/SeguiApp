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
      <link rel="stylesheet" href="./css/tables.css" />
      <title>SeguiApp</title>
  </head>
  <body>
    <?php require_once ('./header/header.php'); ?>
    <br />
        <form action="../administrador/includes/editarAprendiz.php" method="POST" class="form1">
            <h2>Actualizar Datos Aprendiz <i class="fas fa-user-edit"></i></h2> <br />
            <input type="hidden" name="txtid" id="id" value="<?php echo $fila['id_a'] ?>" /> <br /><br />
            <label for="txtnombre">Nombres</label>
            <input type="text" name="txtnombre" id="nombre" value="<?php echo $fila['nombres'] ?>" /> <br /><br />
            <label for="txtapellidos">Apellidos</label>
            <input type="text" name="txtapellidos" id="apellidos" value="<?php echo $fila['apellidos'] ?>" /> <br /><br />
            <label for="txtemail">Email</label>
            <input type="email" name="txtemail" id="email" value="<?php echo $fila['email'] ?>"/> <br /><br />
            <label for="txttelefono">Teléfono</label>
            <input type="number" name="txttel" id="tel" value="<?php echo $fila['telefono'] ?>" /> <br /><br />

            <label for="txtrol">Rol</label>
            <select name="txtrol" id="rol">
                <option value="aprendiz">Aprendiz</option>
            </select>  <br /><br />

            <label for="txtnumero_ficha">Número de Ficha</label>
            <input type="number" name="txtnumero_ficha" id="numero_ficha" value="<?php echo $fila['numero_ficha'] ?>" /> <br /><br />
            <input type="submit" value="Actualizar" /><br />
        </form>
        <?php
            }

                }
        ?>
  </body>
  </html>

  