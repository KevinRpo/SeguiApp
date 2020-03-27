<?php 
    session_start();
    $id = $_SESSION['instructor'];

    if(!isset($id)){
        header("location:../../index");
    } else {

?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="../../assets/images/seguiapp.ico" />
      <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
      <link rel="stylesheet" href="./css/tables.css" />
      <link rel="stylesheet" href="./css/estilos.css"/>
      <title>SeguiApp</title>
  </head>
  <body>

    <?php require_once ('./header/header.php'); 

        include '../../database/conexion.php';

        $id_citacion = $_GET['id_citacion']; 

        $sql = "SELECT * FROM tbl_citacion WHERE id_citacion = '$id_citacion'";

        $resultado = mysqli_query($conexion, $sql);
            
        while ($fila = mysqli_fetch_assoc($resultado)) {
        
    ?>
    <br /><br />
    <form action="includes/editarVisita.php" method="POST" class="form1" />
        <h2>Cambiar Fecha</h2> <br /><br />
        <label for="date">Fecha:</label> <br /><br />
         <input type="date" name="date" id="date" value="<?php echo $fila['fecha'] ?>" />

        <label for="hour">Hora:</label> <br /><br />
        <input type="time" name="hour" id="hour" value="<?php echo $fila['hora'] ?>" />

        <label for="message">Mensaje:</label> <br /><br />
        <textarea type="text" name="message" id="message" cols="35" rows="3"><?php echo $fila['mensaje'] ?></textarea> <br /><br />

        <input type="submit" value="ACTUALIZAR" />
    </form>

        <?php } ?>

</body>
</html>

<?php } ?>