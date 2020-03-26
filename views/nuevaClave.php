<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>SeguiApp</title>
        <link rel="stylesheet" href="../assets/css/estilos.css" />
        <link rel="icon" href="../assets/images/seguiapp.ico" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    </head>
    <body>
        <?php if(isset($_GET['user']) && isset($_GET['token'])){

            require_once '../database/conexion.php';
            
            $user = $_GET['user'];
            $token = $_GET['token'];

            $sql = mysqli_query($conexion, "SELECT token FROM tbl_registros WHERE nombre = '$user'");
            $row = mysqli_fetch_array($sql);

            if($row['token'] == $token){

        ?>

        <?php   if(isset($_POST['enviar'])){
                
                require_once '../database/conexion.php';

                $clave = $_POST['pass'];
                $clave_confirm = $_POST['pass_confirm'];

                $sql = "UPDATE tbl_registros SET clave = '$clave', confirmarClave = '$clave_confirm', token = '' WHERE nombre = '$user'"; 

                $act = mysqli_query($conexion, $sql);

                if($act){
                    echo "<script>alert('Se ha actualizado tu contraseña, ya puedes iniciar sesión');</script>";
                    header("Refresh: 0, URL=../index");
                }
            }
        ?>
        <form action="" method="POST" class="formulario">
            <h2>Recuperar Contraseña</h2><br /><br />
            <label for="pass">Contraseña</label> <br /><br />
            <input type="password" name="pass" id="pass" required /> <br /><br />

            <label for="pass_confirm">Confirmar Contraseña</label> <br /><br />
            <input type="password" name="pass_confirm" id="pass_confirm" required /> <br /><br />
           
            <input type="submit" value="Enviar" name="enviar" /><br />
        </form>
            
            <?php
                } 
        
            } ?>
    </body>
</html>