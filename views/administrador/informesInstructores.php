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
        <link rel="stylesheet" href="./css/archivos.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once ('./header/header.php'); ?>
        <main>
        <h2>Formatos subidos</h2>
            <br />
            <center>
                <table class="table">
                    <tr>
                        <th>Formatos</th>
                        <th>Fecha</th>
                        <th>Identificación - Instructor</th>
                        <th>Identificación - Aprendiz</th>
                        <th>Acción</th>
                    </tr>
                    <tr>
                    <?php
                     include '../../database/conexion.php';

                        $sql = "SELECT * FROM tbl_informe";

                        $resultado = mysqli_query($conexion, $sql);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            
                        ?>
                        <td><a href="verInforme?id_informe=<?=$fila['id_informe']?>"><?=$fila['archivo']?></a></td>
                        <td><?=$fila['fecha']?></td>
                        <td><?=$fila['id_instructor']?></td>
                        <td><?=$fila['id_a']?></td>
                        <td><a href="includes/eliminarInforme.php?id_informe=<?=$fila['id_informe']?>"><i class="fas fa-trash del" title="Eliminar"></i></a> 
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </center>
        </main>
    </body>
    </html>  

<?php } ?>