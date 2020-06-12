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

        <!-- Comprobar que GET exista-->
        <?php if(isset($_GET['user']) && isset($_GET['token'])){

            require_once '../database/conexion.php';
            
            $user = $_GET['user'];
            $token = $_GET['token'];

            //Consulta para buscar el usuario en la base de datos
            $sql = mysqli_query($conexion, "SELECT token FROM tbl_registros WHERE id = '$user'");
            $row = mysqli_fetch_array($sql);

            //Buscar el atributo token en la tabla
            if($row['token'] == $token){

        ?>

        <?php   if(isset($_POST['enviar'])){
                
                require_once '../database/conexion.php';

                //Recibir datos dell formulario
                $clave = $_POST['pass'];
                $clave_confirm = $_POST['pass_confirm'];

                //Encriptar contraseñas
                $hash = password_hash($clave, PASSWORD_BCRYPT, ['cost' => 4]);
                $hash2 = password_hash($clave_confirm, PASSWORD_BCRYPT, ['cost' => 4]);

                $sql = "UPDATE tbl_registros SET clave = '$hash', confirmarClave = '$hash2', token = '' WHERE id = '$user'"; 

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