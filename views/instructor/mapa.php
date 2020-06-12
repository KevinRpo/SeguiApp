<?php 
    session_start();
    $id = $_SESSION['instructor'];

    //Si la sesión no existe redirigimos al index
    if(!isset($id)){
        header("location:../../");
    } else {

?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="../../assets/images/seguiapp.ico" />
        <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
        <link rel="stylesheet" href="css/estilos.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">
        <title>SeguiApp</title>
    </head>
    <?php require_once './header/header.php'; ?>
    <body>
        <main>
                <h1>Tu mapa</h1><br/>
                <section class="container-fluid Contactos p-0 d-flex justify-content-end align-items-center height:10%" id="contactos">
                <!-- llamamos el mapa desde google maps -->
                <iframe class="w-100 h-100 d-sm-block position-absolute" 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2722382127736!2d-75.56388198570384!3d6.2277936282592075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442847f6fdfe27%3A0xc28cdf908b9199b2!2sCancha%20La%20Esmeralda%20Loreto!5e0!3m2!1ses-419!2sco!4v1585696308381!5m2!1ses-419!2sco"
                width="1150" height="500" frameborder="0" style="border:0, text-align:center" allowfullscreen></iframe>
                <div class="view w-100 h-150">
        </main>
    </body>
</html>

<?php } ?>