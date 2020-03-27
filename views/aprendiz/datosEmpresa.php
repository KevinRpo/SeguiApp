<?php 
    session_start();
    $id = $_SESSION['aprendiz'];

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
      <link rel="stylesheet" href="./css/estilos.css"/>
      <title>SeguiApp</title>
  </head>
  <body>
    <?php require_once ('./header/header.php'); ?>
    <br />
        
        <div class="formulario">
        <h2>Datos Empresa</h2> 
        <br />
            <form action="./includes/guardarDatosEmpresa.php" method="POST">
                <label for="nit">NIT - Empresa</label>
                <input type="number" name="nit" id="nit" required />
               
                <br /><br />
                <label for="nit">Nombre - Empresa</label>
                <input type="text" name="nombre_empresa" id="nombre_aprendiz" required />
               
                <br /> <br />
                <label for="nit">Dirección - Empresa</label>
                <input type="text" name="direccion" id="direccion" required />
               
                <br /><br />
                <label for="nit">Teléfono - Empresa</label>
                <input type="number" name="tel" id="tel" required/>
                
                <br /><br />
                <label for="nit">Correo - Jefe</label>
                <input type="email" name="email" id="email" required />
               
                <br /><br />
                <label for="nit">Nombre - Jefe</label>
                <input type="text" name="nombre_jefe" id="nombre_jefe" required />
               
                <br /><br />
                <input type="submit" value="Enviar" />
            </form>
        </div>
        <br />
  </body>
  </html>

        <?php
            }
        ?>