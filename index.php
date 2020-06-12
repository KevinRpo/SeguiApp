<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <title>SeguiApp</title>
        <link rel="stylesheet" href="./assets/css/estilosIndex.css" />
        <link rel="icon" href="./assets/images/seguiapp.ico" />
        <link rel="stylesheet" href="assets/icons/css/all.min.css" />
        <script src="assets/js/sweetalert2@9.js"></script>
        <script src="assets/js/validarRegistro.js"></script>
    </head>
    <body>
        <div class="cont">
        <div class="form sign-in">
            <a href="/seguiapp"><img src="assets/images/SeguiApp.png" alt="logotipo_seguiapp" class="logotipo_seguiapp"></a>
            <h1>Bienvenidos!</h1>
            <form action="./includes/validarLogin.php" method="POST">
            <!-- Registro login -->
                <label>
                <span>IDENTIFICACIÓN</span>
                <input type="number" name="id" autocomplete="off" required />
                </label>
                <label>
                <span>CONTRASEÑA</span>
                <input type="password" id="pwd"  name="clave"  autocomplete="off" required />
                </label>
                <span>
                    <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                </span>
                    <p class="forgot-pass"><a href="views/recuperar">¿Olvidaste tu contraseña?</a></p>
                    <br />
                <input type="submit" class="submit" value="Iniciar Sesión" />
            </form>
            <!-- Pie de página -->
            <footer>
                <p>
                    SeguiApp - proyectsena50@gmail.com &copy <?= date('Y') ?>
                </p>
            </footer>
        </div>
        <div class="sub-cont">
        <!-- Imagen -->
            <div class="img">
            <div class="img__text m--up">
                <h2>¿Qué es SeguiApp?</h2>
                <p>
                    SeguiApp es una plataforma construida para la cominidad SENA, <br /> en donde los instructores podrán llevar
                    un mejor proceso <br />cuando sus aprendices se encuentren en etapa práctica.
                </p> 
            </div>
            <div class="img__text m--in">
                <h2>¿Ya tienes cuenta?</h2>
                <p>Si ya tienes cuenta sólo ingresa a nuestra plataforma SeguiApp.</p>
            </div>
            <div class="img__btn">
            <!-- Botones imagen -->
                <span class="m--up">REGISTRO</span>
                <span class="m--in">INGRESAR</span>
            </div>
            </div>
            <div class="form2 sign-up">
            <!-- Formulario de registro -->
            <h2>Registro SeguiApp</h2> <br />
                <form action="includes/registrar.php" method="POST" onsubmit="return validar();">
                    <label>
                        <span>IDENTIFICACIÓN</span>
                        <input type="number" id="id" name="id" autocomplete="off" required />
                    </label>
                    <label>
                        <span>NOMBRE</span>
                        <input type="text"  id="nombre" name="nombre" autocomplete="off" required/>
                    </label>
                    <label>
                        <span>APELLIDOS</span>
                        <input type="text"  id="apellidos" name="apellidos" autocomplete="off"  required />
                    </label>
                    <label>
                        <span>CORREO ELECTRÓNICO</span>
                        <input type="email" id="email" name="email" autocomplete="off" required />
                    </label>
                    <label>
                        <span>TELÉFONO</span>
                        <input type="number" id="tel" name="telefono" autocomplete="off" required />
                    </label>
                    <label>
                        <span>ROL</span>
                        <select name="rol" id="rol" >
                                <option value="administrador">Administrador</option>
                                <option value="aprendiz">Aprendiz</option>
                                <option value="instructor" selected>Instructor</option>
                        </select>
                    </label>
                    <label>
                        <span>CLAVE</span>
                        <input type="password" id="clave" name="clave" required />
                    </label>
                    <label>
                        <span>CONFIRMAR CLAVE</span>
                        <input type="password" id="confirmarClave" name="confirmarClave" required />
                    </label>
                    <br /><br />
                    <input type="submit" value="REGISTRARSE" class="submit" />
                </form>
            </div>
        </div>
        </div>

    <!-- LLamamos archivos tipo JS-->
    <script src="assets/js/main.js"></script> 
    <script src="assets/js/verClave.js"></script> 
    </body>
</html>