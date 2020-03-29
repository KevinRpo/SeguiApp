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
        <h2>Bitácoras subidas</h2>
            <br />
            <center>
                <table class="table">
                    <tr>
                        <th>Bitácoras</th>
                        <th>Fecha</th>
                        <th>Identificación - Aprendiz</th>
                        <th>Acción</th>
                    </tr>
                    <tr>
                    <?php
                     include '../../database/conexion.php';

                        $sql = "SELECT * FROM tbl_bitacora";

                        $resultado = mysqli_query($conexion, $sql);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            
                        ?>
                        <td><a href="includes/verBitacora?id=<?=$fila['id']?>"><?=$fila['nombre']?></a></td>
                        <td><?=$fila['fecha']?></td>
                        <td><?=$fila['id_a']?></td>
                        <td><a href="includes/eliminarBitacora.php?id=<?=$fila['id']?>"><ion-icon name='trash-outline' class='eliminar' title='Eliminar' id='confirm'></ion-icon></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </center>
        </main>
        
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    </body>
    </html>  

<?php } ?>