<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>SeguiApp</title>
        <link rel="stylesheet" href="./assets/css/estilosIndex.css" />
        <link rel="icon" href="./assets/images/seguiapp.ico" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <link rel="stylesheet" href="assets/icons/css/all.min.css" />
    </head>
    <body>

        <main>
            <div class="contenedor">
                <br /> 

                <h2 class="h2">Bienvenid@s!</h2> <br />
                <img src="./assets/images/SeguiApp.png" alt="logo_seguiapp" class="logo_seguiapp">

                 <br />
                <p>SeguiApp es una plataforma construida para la cominidad SENA, <br /> en donde los instructores podrán llevar
                    un mejor proceso <br />cuando sus aprendices se encuentren en etapa práctica.</p>
            </div>

            <form action="./includes/validarLogin.php" method="POST">
                
                <h4 class="title">Español (Colombia)</h4>
                <h3 class="titulo">SeguiApp</h3>
                
                <input type="text" name="id" placeholder="Ingrese su Identificación" autocomplete="off" required/>
                <input type="password" name="clave" placeholder="Ingrese su Contraseña" autocomplete="off" required/>
                <input type="submit" value="Iniciar Sesión" />
                
                <div class="container-data">
                    <h4>¿Has olvidado tu constraseña?</h4>
                    <a href="views/recuperar">Obtener ayuda aquí</a>
                </div>
                
                <div class="container-or">
                    <hr>
                    <h2>OR</h2>
                    <hr>
                </div>
             
                <div class="container-register">
                    <h4>¿No tienes cuenta?</h4>
                    <a href="views/registro">Regístrate</a>
                </div>
            </form>
      
        </main>

        <footer>
            <p>SeguiApp - proyectsena50@gmail.com &copy <?= date('Y') ?></p>
        </footer>
        
    </body>
</html>