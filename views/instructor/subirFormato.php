<?php 
    session_start();
    $id = $_SESSION['instructor'];

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
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?>
        <main>
            <h2>Subir Formato - 023</h2><br/>
            <form action="includes/subirInforme.php" method="POST" class="form1" enctype="multipart/form-data">
                <label for="archivo">Subir Formato</label> <br /><br />
                <input type="file" name="archivo" id="archivo" required/> <br /><br />

                <select name="id_a"><br /><br />
                <?php
                    include '../../database/conexion.php';
                    $query = mysqli_query($conexion, "SELECT id_aprendiz FROM tbl_asignar_aprendiz WHERE id_instructor = '$id'");
                
                    foreach($query as $id_aprendiz) {
                            echo "<option value='".$id_aprendiz['id_aprendiz']."'>".$id_aprendiz['id_aprendiz']."</option>";
                    }
                ?>
                </select><br /><br />
                <input type="submit" value="SUBIR" name="subir" class="button">
            </form>
    </body>
    </html>

<?php } ?>
