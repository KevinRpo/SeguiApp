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
            <link rel="stylesheet" href="css/formularios.css" />
            <title>SeguiApp</title>
        </head>
        <body>
            <?php require_once './header/header.php'; ?>
            <br /><br />
            <section class="form_wrap2">
                <section class="cantact_info">
                    <section class="info_title">
                        <h2>SeguiApp<br>SENA</h2>
                    </section>
                </section>
                <form action="includes/responder.php" method="POST" class="form_contact">
                    <h2>Enviar Mensaje</h2><br /><br />
                    <div class="user_info">
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
                        <br />
                        <input type="submit" value="ENVIAR" class="btn-submit" id="#btnClose"/>
                    </div>
                </form>
            </section>
        </body>
        </html>

<?php } ?>