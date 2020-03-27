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
            <h1>Tus Agendas</h1>
            <br /><br />
        <center>
            <table class="table">
                <tr>
                    <th>Identificación - Instructor</th>
                    <th>Fecha - Visita</th>
                    <th>Hora - Vista</th>
                    <th>Mensaje</th>
                    <th>Identificación - Aprendiz</th>
                    <th>Acciones</th>
                </tr>
                <tr>
            <?php 
                    include '../../database/conexion.php';

                    $sql = mysqli_query($conexion, "SELECT * FROM tbl_citacion WHERE id_instructor = '$id' ORDER BY id_citacion DESC");

                        while ($fila = mysqli_fetch_array($sql)) {
                            
                    ?>
                            <td><?=$fila['id_instructor']?></td>
                            <td><?=$fila['fecha']?></td>
                            <td><?=$fila['hora']?></td>
                            <td><?=$fila['mensaje']?></td>
                            <td><?=$fila['id_a']?></td>
                            <td><a href="includes/cancelarVisita.php?id_citacion=<?=$fila['id_citacion']?>">Cancelar Visita</a> ||
                            <a href="editarVisita?id_citacion=<?php echo $fila['id_citacion'] ?>">Editar</a></td>
                        </tr>
                        <?php } ?>
            </table>
        </center>
        </main>
</html>

<?php } ?>