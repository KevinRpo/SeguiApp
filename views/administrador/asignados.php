<?php 
    session_start();
    $id = $_SESSION['admin'];

    //Si la sesión no existe redirigimos al index
    if(!isset($id)){
        header("location:../../");
    } else {

?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/images/seguiapp.ico" />
        <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
        <link rel="stylesheet" href="./css/styles.css" />
        <link rel="stylesheet" href="./css/archivos.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once ('./header/header.php'); ?>
        <br />
            <center>
            <h2>Lista de Asignados</h2> <br />
                <table class="table">
                    <tr>
                        <th>Identificación - Aprendiz</th>
                        <th>Nombre - Aprendiz</th>
                        <th>Ficha del Aprendiz</th>
                        <th>Dirección - Empresa</th>

                        <th>Identificación - Instructor</th>
                        <th>Nombre - Instructor</th>
                        <th>Teléfono - Instructor</th>
                        <th>Correo - Instructor</th>
                    </tr>
                    <tr>
                    <?php
                    
                     include '../../database/conexion.php';

                     //Consultamos la lista de asignados totales
                        $sql = "SELECT * FROM tbl_asignar_aprendiz ORDER BY id_asignar DESC";

                        $resultado = mysqli_query($conexion, $sql);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            
                        ?>
                        <td><?=$fila['id_aprendiz']?></td>
                        <td><?=$fila['nombre_aprendiz']?> <?=$fila['apellidos_aprendiz']?></td>
                        <td><?=$fila['ficha_aprendiz']?></td>
                        <td><?=$fila['direccion_empresa_aprendiz']?></td>

                        <td><?=$fila['id_instructor']?></td>
                        <td><?=$fila['nombre_instructor']?> <?=$fila['apellidos_instructor']?></td>
                        <td><?=$fila['telefono_instructor']?></td>
                        <td><?=$fila['correo_instructor']?></td>
                    </tr>
                    <?php } ?>
                </table>
            </center>
        <?php
            }
        ?>
    </body>
    </html>

        