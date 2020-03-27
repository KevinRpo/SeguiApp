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
    <h3>Aprendices Agregados</h3>
    <div class="form">
        <input type="text" class="input" name="caja_busqueda" id="caja_busqueda" placeholder="Buscar..."/>
        <label for="caja_busqueda"><i class="fas fa-search"></i></label>
    </div>
    
    <div id="datos"></div>

    <br/></br />
    
    <a href="../administrador/agregarAprendiz" class="add">Agregar Aprendiz <i class="fas fa-user-plus"></i></a>

    <script src="../administrador/js/jquery.min.js"></script>
    <script src="../administrador/js/buscarAprendiz.js"></script>
    <script src="js/confirmarDel.js"></script>
  </body>
  </html>

        <?php
            }
        ?>