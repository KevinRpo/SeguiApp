<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>SeguiApp</title>
        <link rel="stylesheet" href="../assets/css/estiloRegistro.css" />
        <link rel="icon" href="../assets/images/seguiapp.ico" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <script src="../assets/js/sweetalert2@9.js"></script>
        <script src="../assets/js/validarRegistro.js"></script>
    </head>
<body>

    <form action="../includes/registrar.php" method="POST" onsubmit="return validar();">
                    
        <h4 class="title">Español (Colombia)</h4>
        <h3 class="titulo">SeguiApp</h3>
        <h4 class="titulo">FORMULARIO REGISTRO</h4>
                    
        <input type="text" id="id" name="id" placeholder="Identificación" autocomplete="off" required/>
        <input type="text" id="nombre" name="nombre" placeholder="Nombres" autocomplete="off" required/>
        <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" autocomplete="off" required/>
        <input type="email" id="email" name="email" placeholder="Correo Electrónico" autocomplete="off" required/>
        <input type="text" id="tel" name="telefono" autocomplete="off" placeholder="Tel / Cel" required/>

        <div>
            <select name="rol" id="rol" >
                <option value="administrador">Administrador</option>
                <option value="aprendiz">Aprendiz</option>
                <option value="instructor" selected>Instructor</option>
            </select>
           
        </div>

        <input type="password" id="clave" name="clave" placeholder="Contraseña" required/>
        <input type="password" id="confirmarClave" name="confirmarClave" placeholder="Confirmar Contraseña" required/>
        <input type="submit" value="Registrarse" />
                    
        <div class="container-or">
            <hr>
            <h2>OR</h2>
            <hr>
        </div>
                
        <div class="container-register">
            <h4>¿Ya tienes cuenta?</h4>
            <a href="http://localhost/SeguiApp/">Ingresa Aquí</a>
        </div>
    </form>

        <br />
       
</body>
</html>

