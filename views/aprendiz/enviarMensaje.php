<?php 
    session_start();
    $id = $_SESSION['aprendiz'];

    if(!isset($id)){
        header("location:../../index");
    } else {
        include '../../database/conexion.php';

        $sql = mysqli_query($conexion, "SELECT id_instructor FROM tbl_asignar_aprendiz WHERE id_aprendiz = '$id'");
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
            <br /><br />
            <h2>Confirmar Visita</h2>

            <form action="includes/responder.php" method="POST" class="form1">
                <h2>Enviar Mensaje</h2><br /><br />
                <label for="id_instructor">Identificación - Instructor</label><br /><br />
                <select id="id_instructor" name="id_instructor">
                    <?php
                        foreach($sql as $id) {
                            echo "<option value='".$id['id_instructor']."'>".$id['id_instructor']."</option>";
                        }
                    ?>
                </select>  <br /><br />
                <label for="mensaje">Mensaje:</label> <br /><br />
                <textarea name="mensaje" id="mensaje"cols="32" rows="3" maxlength="70" minlength="5" required></textarea>
                <br /><br />
                <input type="submit" value="ENVIAR" />
            </form>
        </body>
        </html>

<?php } ?>