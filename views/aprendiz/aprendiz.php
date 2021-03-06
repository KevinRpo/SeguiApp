<?php 
    session_start();
    $id = $_SESSION['aprendiz'];

    //Si la sesión no existe redirigimos al index
    if(!isset($id)){
        header("location:../../");
    } else {

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/images/seguiapp.ico" />
        <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
        <link rel="stylesheet" href="css/estilos.css" />
        <script src="js/sweetalert2@9.js"></script>
        <script src="js/mensaje.js"></script>
        <title>SeguiApp</title>
    </head>
    <body onload="mensaje();">
        <?php require_once './header/header.php'; ?>
        <main>
            <h1>BIENVENIDO APRENDIZ</h1><br/>
            <p>
                Esperamos que nuestra plataforma pueda ser de mucha utlidad <br />para nuestros usuarios.
            </p>
            <img src="../../assets/images/SeguiApp.png" alt="logo_sena" title="SeguiApp" />
        </main>
    </body>
    </html>

<?php } ?>