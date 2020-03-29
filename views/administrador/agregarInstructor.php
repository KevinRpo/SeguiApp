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
        <form action="../administrador/includes/agregarInstructor.php" method="POST" class="form_contact">
            <h2 class="h2">Agregar Instructor <i class="fas fa-user-plus"></i></h2> <br />
            <div class="user_info">
                <input type="text" name="id" id="id" placeholder="Identificación" required /> 
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required /> 
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required />
                <input type="email" name="email" id="email" placeholder="Email"required /> 
                <input type="number" name="tel" id="tel" placeholder="Tel / Cel" required />
                <select name="rol" id="rol">
                    <option value="instructor">Instructor</option>
                </select>  
                <input type="text" name="programa" id="programa" placeholder="Programa" required  /> 
                <input type="submit" value="Enviar" />
            </div>
        </form>
    </section>
  </body>
  </html>

        <?php
            }
        ?>