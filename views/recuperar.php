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
    <section class="form_wrap">
            <section class="cantact_info">
                <section class="info_title">
                <h2>SeguiApp<br>SENA</h2>
            </section>
    </section>
        <form action="../includes/recuperar.php" method="POST" class="form_contact">
            <h2>Recuperar Contraseña</h2><br /><br />
            <div class="user_info">
                <label for="email">Correo Electrónico</label> <br /><br />
                <input type="email" name="email" id="email" required /> <br /><br />
                <a href="../index">Volver</a>
                <input type="submit" value="Enviar" name="enviar" />
            </div>
        </form>
    </section>
    </body>
</html>