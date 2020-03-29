<?php 
    session_start();
    $id = $_SESSION['admin'];

    if(!isset($id)){
        header("location:../../index");
    } else {

?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="../../assets/images/seguiapp.ico" />
      <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
      <link rel="stylesheet" href="./css/styles.css"/>
      <link rel="stylesheet" href="./css/formularios.css" />
      <link rel="stylesheet" href="./css/tables.css"/>
      <title>SeguiApp</title>
  </head>
  <body>
    <?php require_once ('./header/header.php'); ?>
        
    <section class="form_wrap2">
            <form action="includes/asignarAprendiz.php" class="form_contact"  method="POST">
                <div class="user_info">
                    <h2>Asignar Aprendiz</h2> 
                    <ion-icon id="open" class="abrir" name="eye-outline"></ion-icon>
                <?php if(isset($_GET['id_a'])){ ?>
                    <input type="number" name="id_aprendiz" id="id_aprendiz" placeholder="Id_Aprendiz" value="<?php echo $_GET['id_a']?>" required />
                <?php }else{ ?>
                    <input type="number" name="id_aprendiz" id="id_aprendiz" placeholder="Id_Aprendiz" required />
                <?php } ?>
                    <ion-icon id="open2" class="abrir" name="eye-outline"></ion-icon> 
                    <input type="number" name="id_instructor" id="id_instructor" placeholder="Id_Instructor" required /> 
                <br /><br />

                <?php if(isset($_GET['nombres'])){ ?>
                    <input type="text" name="nombre_aprendiz" id="nombre_aprendiz" value="<?php echo $_GET['nombres']?>" required />
                <?php }else{ ?>
                    <input type="text" name="nombre_aprendiz" id="nombre_aprendiz" placeholder="Nombre Aprendiz" required />
                <?php } ?>
                    <input type="text" name="nombre_instructor" id="nombre_instructor" placeholder="Nombre Instructor" required />

                <br /> <br />
                <?php if(isset($_GET['apellidos'])){ ?>
                    <input type="text" name="apellidos_aprendiz" id="apellidos_aprendiz" value="<?php echo $_GET['apellidos']?>" required />
                <?php }else{ ?>
                    <input type="text" name="apellidos_aprendiz" id="apellidos_aprendiz" placeholder="Apellidos Aprendiz" required />
                <?php } ?>
                    <input type="text" name="apellidos_instructor" id="apellidos_instructor" placeholder="Apellidos Instructor" required />

                <br /><br />
                <?php if(isset($_GET['numero_ficha'])){ ?>
                    <input type="number" name="ficha_aprendiz" id="ficha_aprendiz" value="<?php echo $_GET['numero_ficha']?>" required />
                <?php }else{ ?>
                    <input type="number" name="ficha_aprendiz" id="ficha_aprendiz" placeholder="Ficha Aprendiz" required />
                <?php } ?>
                    <input type="number" name="telefono_instructor" id="telefono_instructor" placeholder="Telefono Instructor" required />

                <br /><br />

                <?php if(isset($_GET['direccion'])){ ?>
                    <input type="text" name="direccion_aprendiz" id="direccion_aprendiz" value="<?php echo $_GET['direccion']?>" required />
                <?php }else{ ?>
                    <input type="text" name="direccion_aprendiz" id="direccion_aprendiz" placeholder="Dirección - Empresa - Aprendiz" required />
                <?php } ?>
                    <input type="email" name="correo_instructor" id="correo_instructor" placeholder="Correo Instructor" required />

                <br /><br />

                    <input type="submit" value="Enviar" id="btnSend"/>
            </div>
        </form>
    </section>

        <div class="popup">
            <div class="popup-content">
            <ion-icon name="close-outline" class="close"></ion-icon>
                <h2>Aprendices Disponibles</h2> <br />

                <?php

                    include '../../database/conexion.php';

                    $sql = "SELECT * FROM tbl_aprendiz AS ap INNER JOIN
                            tbl_empresa AS em ON ap.NIT = em.NIT WHERE estatus = 1";

                    $resultado = mysqli_query($conexion, $sql);

                    while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                <table>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Número Ficha</th>
                        <th>Dirección - Empresa</th>
                        <th>Acción</th>
                    </tr>
                    <tr>
                        <td><?=$fila['id_a'] ?></td>
                        <td><?=$fila['nombres'] ?></td>
                        <td><?=$fila['apellidos'] ?></td>
                        <td><?=$fila['numero_ficha'] ?></td>
                        <td><?=$fila['direccion'] ?></td>
                        <td><a class="listar" href="./asignarAprendiz.php?id_a=<?php echo $fila['id_a'] ?>&nombres=<?php echo $fila['nombres']?>&apellidos=<?php echo $fila['apellidos']?>&numero_ficha=<?php echo $fila['numero_ficha']?>&direccion=<?php echo $fila['direccion'] ?>">Listar</a></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </div>

        <div class="popup2">
            <div class="popup-content2">
                <ion-icon name="close-outline" class="close2"></ion-icon>
                <h2>Instructores Disponibles<br />

                <?php

                    include '../../database/conexion.php';

                    $sql = "SELECT * FROM tbl_instructor WHERE estatus = 1";

                    $resultado = mysqli_query($conexion, $sql);

                    while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                <table>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombres</th>
                        <th>Programa</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                    </tr>
                    <tr>
                        <td><?= $fila['id_instructor'] ?></td>
                        <td><?= $fila['nombres'] ?></td>
                        <td><?= $fila['programa'] ?></td>
                        <td><?= $fila['telefono'] ?></td>
                        <td><?= $fila['email'] ?></td>
                    </tr>
                <?php  } ?>
                </table>
            </div>
        </div>

        <script src="js/popup.js"></script>
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  </body>
  </html>

<?php } ?>