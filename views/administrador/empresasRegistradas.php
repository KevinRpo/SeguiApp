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
        <link rel="stylesheet" href="./css/styles.css" />
        <link rel="stylesheet" href="./css/tables.css" />
        <link rel="stylesheet" href="./css/archivos.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once ('./header/header.php'); ?>
        <br /><br />
        <h2>Empresas Registradas</h2>
        <br /><br />
        <center>
                <table class="table">
                    <tr>
                        <th>NIT</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Nombre - Jefe</th>
                        <th>Identificación - Aprendiz</th>
                    </tr>
                    <tr>
                    <?php
                    
                        include '../../database/conexion.php';

                        $sql = "SELECT * FROM tbl_empresa ";

                        $resultado = mysqli_query($conexion, $sql);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            
                        ?>
                        <td><?=$fila['NIT']?></td>
                        <td><?=$fila['nombre']?></td>
                        <td><?=$fila['direccion']?></td>
                        <td><?=$fila['telefono']?></td>
                        <td><?=$fila['nombre_jefe']?></td>
                        <td><?=$fila['id_a']?></td>
                    </tr>
                    <?php } ?>
                </table>
            </center>
        <?php
            }
        ?>
    </body>
    </html>

        