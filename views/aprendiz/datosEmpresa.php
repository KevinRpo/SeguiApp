<?php 
    session_start();
    $id = $_SESSION['aprendiz'];

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
      <link rel="stylesheet" href="./css/estilos.css"/>
      <link rel="stylesheet" href="./css/formularios.css"/>
      <script src="js/sweetalert2@9.js"></script>
      <script src="js/validarDatosEmpresa.js"></script>
      <title>SeguiApp</title>
  </head>
  <body>
    <!-- Incluimos o Requerimos el menú -->
    <?php require_once ('./header/header.php'); ?>
        <section class="form_wrap">
            <section class="cantact_info">
                <section class="info_title">
                    <h2>SeguiApp<br>SENA</h2>
                </section>
            </section>
        <br />
            <form action="./includes/guardarDatosEmpresa.php" class="form_contact" method="POST" onsubmit="return validarDatosEmpresa();">
                <h2>Datos Empresa</h2>
                <div class="user_info">
                    <label for="nit">NIT</label>
                    <input type="text" name="nit" id="nit"  />
                
                    <br /><br />
                    <label for="nit">Nombre</label>
                    <input type="text" name="nombre_empresa" id="nombre_empresa" />
                
                    <br /> <br />
                    <label for="nit">Dirección</label>
                    <input type="text" name="direccion" id="direccion"  />
                
                    <br /><br />
                    <label for="nit">Teléfono</label>
                    <input type="text" name="tel" id="tel" />
                    
                    <br /><br />
                    <label for="nit">Correo - Jefe</label>
                    <input type="email" name="email" id="email"  />
                
                    <br /><br />
                    <label for="nit">Nombre - Jefe</label>
                    <input type="text" name="nombre_jefe" id="nombre_jefe" />
               
                    <input type="submit" value="Enviar" />
                </div>
            </form>
        </div>
  </body>
  </html>

        <?php
            }
        ?>