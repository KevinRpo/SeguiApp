<?php 
    session_start();
    $id = $_SESSION['instructor'];

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
        <link rel="stylesheet" href="css/formularios.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?>
        <main>
        <section class="form_wrap3">
            <section class="cantact_info">
                <section class="info_title">
                    <h2>SeguiApp<br>SENA</h2>
                </section>
            </section>
            <form action="includes/subirInforme.php" method="POST" class="form_contact" enctype="multipart/form-data">
                <h2>Subir Formato - 023</h2>
                <div class="user_info">
                    <label for="archivo">Subir</label> 
                    <input type="file" name="archivo" id="archivo" required/> 

                    <label for="id_a">Identificación - Aprendiz</label>
                    <select name="id_a">
                    <?php
                        include '../../database/conexion.php';
                        $query = mysqli_query($conexion, "SELECT id_aprendiz FROM tbl_asignar_aprendiz WHERE id_instructor = '$id'");
                    
                        //Consultamos los aprendices asignados 
                        foreach($query as $id_aprendiz) {
                                echo "<option value='".$id_aprendiz['id_aprendiz']."'>".$id_aprendiz['id_aprendiz']."</option>";
                        }
                    ?>
                    </select>
                    <input type="submit" value="SUBIR" name="subir" class="btn-submit">
                </div>
            </form>
        </section>
    </body>
    </html>

<?php } ?>
