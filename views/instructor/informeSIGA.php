<?php 
    session_start();
    $id = $_SESSION['instructor'];

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
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?>
        <main>
            <h1>Subir Formato - 023</h1><br/>
            <form action="includes/subirInforme.php" method="POST" class="form1" enctype="multipart/form-data">
                <label for="archivo">Subir Informe</label> <br /><br />
                <input type="file" name="archivo" id="archivo" required/> <br /><br />

                <label for="id_a">Identificación - Aprendiz</label> <br /><br />
                <input type="number" name="id_a" id="id_a" required/> <br /><br />

                <input type="submit" value="SUBIR" name="subir" class="button">
            </form>
            <br /><br />
            <h2>Tus formatos</h2>
            <br />
            <center>
                <table class="table">
                    <tr>
                        <th>Informe</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                    <tr>
                    <?php
                    
                     include '../../database/conexion.php';

                        $sql = "SELECT * FROM tbl_informe WHERE id_instructor = '".$id."'";

                        $resultado = mysqli_query($conexion, $sql);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            
                        ?>
                        <td><a href="ver?id=<?=$fila['id_informe']?>"><?=$fila['archivo']?></a></td>
                        <td><?=$fila['fecha']?></td>
                        <td><a href="includes/eliminarInforme.php?id=<?=$fila['id_informe']?>">Eliminar</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </center>
        </main>

    </body>
    </html>

    <?php } ?>