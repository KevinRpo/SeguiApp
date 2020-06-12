<?php 
    session_start();
    $id = $_SESSION['aprendiz'];

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
        <link rel="stylesheet" href="css/estilos.css" />
        <link rel="stylesheet" href="css/tables.css" />
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
                    <th>Nombre - Instructor</th>
                    <th>Fecha - Visita</th>
                    <th>Hora - Vista</th>
                    <th>Responder</th>
                    <th>Marcar como</th>
                </tr>
                <tr>
            <?php 
                    include '../../database/conexion.php';

                    //Consultamos datos de la notificación para visualizar 
                    $sql = mysqli_query($conexion, "SELECT * FROM tbl_citacion AS ci INNER JOIN tbl_instructor AS ins
                    ON ci.id_instructor = ins.id_instructor WHERE id_a = '$id' ORDER BY id_citacion DESC");

                    while ($fila = mysqli_fetch_assoc($sql)) {
                            
                    ?>
                            <td><?=$fila['id_instructor']?></td>
                            <td><?=$fila['nombres']?> <?=$fila['apellidos']?></td>
                            <td><?=$fila['fecha']?></td>
                            <td><?=$fila['hora']?></td>
                            <td><?=$fila['mensaje']?></td>
                            
                            <td>
                            <!-- Si el valor del campo es cero mostramos "Leido" -->
                            <?php if($fila['leido'] == 0){ ?>
                                <a  href="includes/leido.php?id_citacion=<?=$fila['id_citacion']?>">Leído</a>
                            <?php } else{?>
                            <!-- De lo contrario mostramos "No leido" -->
                                <a href="includes/Noleido.php?id_citacion=<?=$fila['id_citacion']?>">No leído</a>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
            </table>
        </center>

        <br /><br />
        <a href="enviarMensaje" class="enviar">Enviar Mensaje <ion-icon class="mensaje" name="mail-outline"></ion-icon></a>

        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    </body>
    </html>

<?php } ?>