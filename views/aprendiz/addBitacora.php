<?php 
    session_start();
    $id = $_SESSION['aprendiz'];

    if(!isset($id)){
        header("location:../../index");
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
        <link rel="stylesheet" href="css/formularios.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?>
        <main>
        <section class="form_wrap2">
            <section class="cantact_info">
                <section class="info_title">
                    <h2>SeguiApp<br>SENA</h2>
                </section>
            </section>
            <form action="includes/subirBitacoras.php" method="POST" class="form_contact" enctype="multipart/form-data">
            <h2>Subir Bitácora</h2>
                <div class="user_info">
                    <label for="archivo">Subir</label> 
                    <input type="file" name="archivo" id="archivo" required/> 

                    <input type="submit" value="SUBIR" name="subir" class="button">
                </div>
            </form>
        </section>
    </body>
    </html>

<?php } ?>