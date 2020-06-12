<?php 
    session_start();
    $id = $_SESSION['instructor'];

    //Si la sesión no existe redirigimos al index
    if(!isset($id)){
        header("location:../../");
    } else {

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/images/seguiapp.ico" />
        <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
        <link rel="stylesheet" href="css/tables.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?>
        <br/>
        <h2>Mensajes Recibidos</h2>
        <br /><br />
        <center>
            <table class="table">
                <tr>
                    <th>Identificación - Aprendiz</th>
                    <th>Nombre - Aprendiz</th>
                    <th>Fecha</th>
                    <th>Mensaje</th>
                    <th>Marcar Como</th>
                </tr>
                <tr>
            <?php 
                    include '../../database/conexion.php';

                    //Consultar mensajes de X aprendiz a X intructor
                    $sql = mysqli_query($conexion, "SELECT * FROM tbl_mensaje AS me INNER JOIN tbl_aprendiz AS ap
                    ON me.id_aprendiz = ap.id_a WHERE id_instructor = '$id' ORDER BY id_mensaje DESC");

                    while ($fila = mysqli_fetch_assoc($sql)) {
                            
                    ?>
                            <td><?=$fila['id_aprendiz']?></td>
                            <td><?=$fila['nombres']?> <?=$fila['apellidos']?></td>
                            <td><?=$fila['fecha']?></td>
                            <td><?=$fila['mensaje']?></td>
                            
                            <td>
                            <?php if($fila['leido'] == 0){ ?>
                                <a  href="includes/leido.php?id_mensaje=<?=$fila['id_mensaje']?>">Leído</a>
                            <?php } else{ ?>
                                <a href="includes/Noleido.php?id_mensaje=<?=$fila['id_mensaje']?>">No leído</a>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
            </table>
        </center>

    </body>
    </html>

<?php } ?>