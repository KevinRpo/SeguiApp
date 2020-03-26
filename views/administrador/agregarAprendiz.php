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
        <form action="../administrador/includes/agregarAprendiz.php" method="POST" class="form1">
            <h2>Agregar Aprendiz <i class="fas fa-user-plus"></i></h2> <br />
            <input type="text" name="id" id="id" placeholder="Identificación" required /> <br /><br />
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required /> <br /><br />
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required /> <br /><br />
            <input type="email" name="email" id="email" placeholder="Email"required /> <br /><br />
            <input type="number" name="tel" id="tel" placeholder="Tel / Cel" required /> <br /><br />

            <select name="rol" id="rol">
                <option value="aprendiz">Aprendiz</option>
            </select>  <br /><br />

            <input type="number" name="numero_ficha" id="numero_ficha" placeholder="Número Ficha" required  /> <br /><br />

            <input type="number" name="nit" id="nit" placeholder="NIT - Empresa" required  /> <br /><br />
           
            <input type="submit" value="Enviar" /><br />
        </form>
    
  </body>
  </html>

        <?php
            }
        ?>