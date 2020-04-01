<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <title>SeguiApp</title>
        <link rel="stylesheet" href="../assets/css/estilos.css" />
        <link rel="icon" href="../assets/images/seguiapp.ico" />
        <script src="../assets/js/sweetalert2@9.js"></script>
        <script src="../assets/js/validarRegistro.js"></script>
    </head>
    <body>
        <?php if(isset($_GET['user']) && isset($_GET['token'])){

            require_once '../database/conexion.php';
            
            $user = $_GET['user'];
            $token = $_GET['token'];

            $sql = mysqli_query($conexion, "SELECT token FROM tbl_registros WHERE id = '$user'");
            $row = mysqli_fetch_array($sql);

            if($row['token'] == $token){

        ?>

        <?php   if(isset($_POST['enviar'])){
                
                require_once '../database/conexion.php';

                $clave = $_POST['pass'];
                $clave_confirm = $_POST['pass_confirm'];

                $sql = "UPDATE tbl_registros SET clave = '$clave', confirmarClave = '$clave_confirm', token = '' WHERE id = '$user'"; 

                $act = mysqli_query($conexion, $sql);

                if($act){
                    echo "<script>alert('Se ha actualizado tu contraseña, ya puedes iniciar sesión');</script>";
                    header("Refresh: 0, URL=../index");
                }
            }
        ?>
         <section class="form_wrap">
            <section class="cantact_info">
                <section class="info_title">
                <h2>SeguiApp<br>SENA</h2>
            </section>
        </section>
            <form action="" method="POST" class="form_contact" onsubmit="return validarClave();">
                <h2>Recuperar Contraseña</h2>
                <div class="user_info">
                    <label for="pass">Contraseña</label> 
                    <input type="password" name="pass" id="pass" required /> 

                    <label for="pass_confirm">Confirmar Contraseña</label> 
                    <input type="password" name="pass_confirm" id="pass_confirm" required /> <br /><br />
                
                    <input type="submit" value="Enviar" name="enviar" />
                </div>
            </form>
        </section>
            
            <?php } ?>
    </body>
</html>

<?php } ?>