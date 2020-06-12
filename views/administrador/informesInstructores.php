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
                            <td><a href="includes/verInforme?id_informe=<?=$fila['id_informe']?>"><?=$fila['archivo']?></a></td>
                            <td><?=$fila['fecha']?></td>
                            <td><?=$fila['id_instructor']?></td>
                            <td><?=$fila['id_a']?></td>
                            <td><a href="includes/eliminarInforme.php?id_informe=<?=$fila['id_informe']?>"><ion-icon name='trash-outline' class='eliminar' title='Eliminar' id='confirm'></ion-icon></a> 
                            </td>
                    </tr>
                    <?php } ?>
                </table>
            </center>
        </main>
        
        <!-- https://ionicons.com/ -->
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    </body>
    </html>  

<?php } ?>