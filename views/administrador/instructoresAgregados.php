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
      <link rel="stylesheet" href="./css/styles.css" />
      <title>SeguiApp</title>
  </head>
  <body>
    <?php require_once ('./header/header.php'); ?>
 
    <br />
    <h3>Instructores Agregados</h3>
    <div class="form">
        <input type="text" name="caja_busqueda" class="fas fa-search" id="caja_busqueda" placeholder="Buscar..."/>
        <label for="caja_busqueda"></label>
    </div>
    
    <div id="datos"></div>
    <br /><br />
    <a href="../administrador/agregarInstructor" class="add">Agregar Instructor <ion-icon class="icon" name="person-add-outline"></ion-icon></a>
    
    <script src="../administrador/js/jquery.min.js"></script>
    <script src="../administrador/js/buscarInstructor.js"></script>
    <script src="js/confirmarDel.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  </body>
  </html>

    <?php } ?>