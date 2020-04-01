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
        <link rel="stylesheet" href="css/tables.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?>
        <main>
            <h1>Visitas Realizadas</h1><br/>
            <br /><br />
        <center>
            <table>
                <tr>
                    <th>Fecha - Visita</th>
                    <th>Hora - Vista</th>
                    <th>Identificación - Aprendiz</th>
                </tr>
                <tr>
            <?php 
                    include '../../database/conexion.php';

                    $sql = mysqli_query($conexion, "SELECT * FROM tbl_citacion WHERE id_instructor = '$id' AND fecha < CURDATE() ORDER BY id_citacion DESC");

                        while ($fila = mysqli_fetch_assoc($sql)) {
                            
                    ?>
                            <td><?=$fila['fecha']?></td>
                            <td><?=$fila['hora']?></td>
                            <td><?=$fila['id_a']?></td>
                        </tr> 
                    <?php } ?>
            </table>

            <br />

            <table class="table2">
                <tr>
                    <th>Identificación - Aprendiz</th>
                    <th>Visitas - Realizadas</th>
                </tr>
                <?php 

                    include '../../database/conexion.php';

                        $sql = mysqli_query($conexion, "SELECT id_a, COUNT(id_a) AS total FROM tbl_citacion 
                        GROUP BY id_a");

                        while ($row = mysqli_fetch_assoc($sql)) {
                            
                    ?>  
                            <tr>
                                <td><?=$row['id_a']?></td>
                                <td><?=$row['total']?></td>
                            </tr>
                <?php } ?>
            </table>
        </main>
    </body>
</html>

<?php } ?>