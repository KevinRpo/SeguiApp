<?php 
    session_start();
    $id = $_SESSION['admin'];

    //Si la sesión no existe redirigimos al index
    if(!isset($id)){
        header("location:../../");
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
    <h3>Aprendices Habilitados</h3>
    <div class="form">
        <input type="text" class="fas fa-search" name="caja_busqueda" id="caja_busqueda" placeholder="Buscar..."/>
        <label for="caja_busqueda"></label>
    </div>
    
    <div id="datos"></div>

    <!-- Incluimos archivos de tipo JS -->
    <script src="../administrador/js/jquery.min.js"></script>
    <script src="../administrador/js/aprendicesHabilitados.js"></script>
    <script src="js/confirmarDel.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  </body>
  </html>

        <?php
            }
        ?>