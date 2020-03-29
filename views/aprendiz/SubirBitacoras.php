<?php 
    session_start();
    $id = $_SESSION['aprendiz'];

    if(!isset($id)){
        header("location:../../index");
    } else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/images/seguiapp.ico" />
        <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
        <link rel="stylesheet" href="css/estilos.css" />
        <link rel="stylesheet" href="css/tables.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?>
        <main>
            <h2>Tus bitácoras</h2>
            <br />
            <center>
                <table class="table">
                    <tr>
                        <th>Bitacoras</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                    <tr>
                    <?php
                    
                     include '../../database/conexion.php';

                        $sql = "SELECT * FROM tbl_bitacora WHERE id_a = '".$id."'";

                        $resultado = mysqli_query($conexion, $sql);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            
                        ?>
                        <td><a href="includes/ver?id=<?=$fila['id']?>"><?=$fila['nombre']?></a></td>
                        <td><?=$fila['fecha']?></td>
                        <td><a href="includes/eliminarBitacora.php?id=<?=$fila['id']?>">Eliminar</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </center>
        </main>

    </body>
    </html>

    <?php } ?>