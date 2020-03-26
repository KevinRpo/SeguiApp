<?php 
    session_start();
    $id = $_SESSION['admin'];

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
      <title>SeguiApp</title>
  </head>
  <body>
    <?php require_once ('./header/header.php'); ?>
 
    <br />
    <h3>Instructores Agregados</h3>
    <div class="form">
        <button class="boton_personalizado4"><a href="../administrador/agregarInstructor">Agregar Instructor <i class="fas fa-user-plus"></i></a></button>
        <input type="text" class="input" name="caja_busqueda" id="caja_busqueda" placeholder="Buscar..."/>
        <label for="caja_busqueda"><i class="fas fa-search"></i></label>
    </div>
    
    <div id="datos"></div>

    <script src="../administrador/js/jquery.min.js"></script>
    <script src="../administrador/js/buscarInstructor.js"></script>
    <script src="js/confirmarDel.js"></script>
  </body>
  </html>

    <?php } ?>