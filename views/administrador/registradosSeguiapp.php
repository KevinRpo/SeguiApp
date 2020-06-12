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

     <h3>Registrados en SeguiApp</h3>
    <div class="form">
      <label for="caja_busqueda"></label>
      <input type="search" name="caja_busqueda" id="caja_busqueda" class="fas fa-search" placeholder="Buscar..." />
    </div>
    
      <div id="datos"></div>

      <!-- Archivos tipo JS -->
      <script src="../administrador/js/jquery.min.js"></script>
      <script src="../administrador/js/buscar.js"></script>
  </body>
  </html>

<?php } ?>