<?php 
    session_start();
    $id = $_SESSION['instructor'];

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
        <link rel="stylesheet" href="css/estilos.css" />
        <script src="js/validar.js"></script>
        <title>SeguiApp</title>
    </head>
    <body>
    
        <?php require_once ('./header/header.php'); ?>
        <br />
            <form action="includes/actualizarPerfil.php" method="POST" class="form1" onsubmit="return validar();">
                <h2>Perfil Instructor <i class="fas fa-user-edit"></i></h2> <br />
                <input type="hidden" name="txtid" id="identificacion" value="<?php echo $fila['id'] ?>" /> <br /><br />
                <label for="id">Identificacion</label>
                <input type="text" name="txtnombre" id="id" value="<?php echo $fila['id'] ?>" disabled/> <br /><br />
                <label for="">Nombres: </label>
                <input type="text" name="txtnombre" id="nombre" value="<?php echo $fila['nombre'] ?>"required /> <br /><br />
                <label for="">Apellidos: </label>
                <input type="text" name="txtapellidos" id="apellidos" value="<?php echo $fila['apellidos'] ?>"required /> <br /><br />
                <label for="">Email: </label>
                <input type="email" name="txtemail" id="email" value="<?php echo $fila['email'] ?>"required/> <br /><br />
                <label for="">Teléfono: </label>
                <input type="number" name="txttel" id="tel" value="<?php echo $fila['telefono'] ?>"required /> <br /><br />
                <label for="">Clave: </label>
                <input type="password" name="txtclave" id="clave" value="" required /> <br /><br />
                <label for="">Confirmación de Clave: </label>
                <input type="password" name="txtconfirmar_clave" id="confirmar_clave" value="" required/> <br /><br />
                <br />
                <input type="submit" value="Actualizar" />
            </form>
        <?php
            }

                }
        ?>
        <br />
  </body>
  </html>

        