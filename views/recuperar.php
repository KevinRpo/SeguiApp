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
        <form action="../includes/recuperar.php" method="POST" class="form1">
            <h2>Recuperar Contraseña</h2><br /><br />
            <label for="email">Correo Electrónico</label> <br /><br />
            <input type="email" name="email" id="email" autocomplete="off" required /> <br /><br />
           
            <input type="submit" value="Enviar" name="enviar" /><br />
        </form>
    </body>
</html>