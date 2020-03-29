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
        <form action="../administrador/includes/agregarAprendiz.php" class="form_contact" method="POST" >
            <h2 class="h2">Agregar Aprendiz <i class="fas fa-user-plus"></i></h2>
            <div class="user_info">
                <input type="text" name="id" id="id" placeholder="Identificación" required /> 
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required /> 
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required /> 
                <input type="email" name="email" id="email" placeholder="Email"required /> 
                <input type="number" name="tel" id="tel" placeholder="Tel / Cel" required /> 

                <select name="rol" id="rol">
                    <option value="aprendiz">Aprendiz</option>
                </select> 

                <input type="number" name="numero_ficha" id="numero_ficha" placeholder="Número Ficha" required  /> 
                <input type="number" name="nit" id="nit" placeholder="NIT - Empresa" required  /> 
                <input type="submit" value="Enviar" id="btnSend" />
            </div>
        </form>
    </section>
  </body>
  </html>

<?php } ?>