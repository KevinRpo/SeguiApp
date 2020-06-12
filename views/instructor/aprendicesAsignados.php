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
        <main>
            <h1>Tus Aprendices</h1><br/>
            <center>
                <table class="table">
                    <tr>
                        <th>Identificación - Aprendiz</th>
                        <th>Nombre - Aprendiz</th>
                        <th>Ficha del Aprendiz</th>
                        <th>Dirección - Empresa</th>
                        <th>Correo - Jefe</th>
                    </tr>
                    <tr>
                    <?php
                    
                     include '../../database/conexion.php';

                        //Mostramos datos de los aprendices asignados al instructor que haya ingresado
                        $sql = "SELECT * FROM tbl_asignar_aprendiz AS asig INNER JOIN tbl_empresa AS em
                        ON asig.id_aprendiz = em.id_a WHERE id_instructor = '$id'";

                        $resultado = mysqli_query($conexion, $sql);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            
                        ?>
                        <td><?=$fila['id_aprendiz']?></td>
                        <td><?=$fila['nombre_aprendiz']?> <?=$fila['apellidos_aprendiz']?></td>
                        <td><?=$fila['ficha_aprendiz']?></td>
                        <td><?=$fila['direccion_empresa_aprendiz']?></td>
                        <td><?=$fila['correo_jefe']?></td>
                    </tr>
                    <?php } ?>
                </table>
            </center>
        </main>
    </body>
</html>

<?php } ?>