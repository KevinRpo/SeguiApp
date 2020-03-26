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
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?>
        <br/>
        <h2>Próximas Visitas</h2>
        <br /><br />
        <center>
            <table class="table">
                <tr>
                    <th>Identificación - Instructor</th>
                    <!-- <th>Nombre - Instructor</th> -->
                    <th>Fecha - Visita</th>
                    <th>Hora - Vista</th>
                    <th>Mensaje</th>
                    <th>Marcar como</th>
                </tr>
                <tr>
            <?php 
                    include '../../database/conexion.php';

                    $sql = mysqli_query($conexion, "SELECT * FROM tbl_citacion WHERE id_a = '$id' ORDER BY id_instructor DESC");

                    // $sql2 = mysqli_query($conexion, "SELECT nombres,apellidos FROM tbl_instructor AS ins INNER JOIN 
                    // tbl_citacion AS ci ON ins.id_instructor = ci.id_instructor");

                    // if($row = mysqli_fetch_array($sql2)) {
                        while ($fila = mysqli_fetch_array($sql)) {
                            
                    ?>
                            <td><?=$fila['id_instructor']?></td>
                            <!-- <td><?=$row['nombres']?> <?= $row['apellidos']?></td> -->
                            <td><?=$fila['fecha']?></td>
                            <td><?=$fila['hora']?></td>
                            <td><?=$fila['mensaje']?></td>
                            <td>
                            <?php if($fila['leido'] == 1){ ?>
                                <a  href="includes/leido.php?id_citacion=<?=$fila['id_citacion']?>">Leído</a>
                            <?php } else{?>
                                <a href="includes/Noleido.php?id_citacion=<?=$fila['id_citacion']?>">No leído</a>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
            </table>
        </center>
    </body>
    </html>

<?php } ?>