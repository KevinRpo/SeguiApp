<?php 
    session_start();
    $id = $_SESSION['instructor'];

    if(!isset($id)){
        header("location:../../index");
    } else {
        include '../../database/conexion.php';

        $sql = mysqli_query($conexion, "SELECT id_aprendiz FROM tbl_asignar_aprendiz WHERE id_instructor = '$id'");

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/images/seguiapp.ico" />
        <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
        <link rel="stylesheet" href="css/formularios.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?> 
        <section class="form_wrap">
            <section class="cantact_info">
                <section class="info_title">
                    <h2>SeguiApp<br>SENA</h2>
                </section>
            </section>
                <form action="includes/agendarCita.php" method="POST" class="form_contact">
                    <h2>Agendar Visita</h2>
                    <div class="user_info">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" id="fecha" required />

                        <label for="hora">Hora</label>
                        <input type="time" name="hora" id="hora"  required />

                        <label for="id_a">Identificación - Aprendiz</label>
                        <select id="id_a" name="id_a">
                            <?php
                                foreach($sql as $id) {
                                    echo "<option value='".$id['id_aprendiz']."'>".$id['id_aprendiz']."</option>";
                                }
                            ?>
                        </select>  

                        <label for="correo_jefe">Correo Jefe</label>
                        <input type="email" name="correo_jefe" id="correo_jefe" />

                        <label for="mensaje">Mensaje</label>
                        <textarea name="mensaje" id="mensaje" cols="32" rows="3" maxlength="70" minlength="5" required></textarea>

                        <input type="submit" value="Enviar" class="btn-submit"/>
                    </div>
                </form>
            </section>
        </body>
    </html>

<?php } ?>