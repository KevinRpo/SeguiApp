<?php

include '../../../database/conexion.php';

session_start();
$id = $_SESSION['instructor'];

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$mensaje = $_POST['mensaje'];
$id_a = $_POST['id_a'];

$sql = "INSERT INTO tbl_citacion(id_citacion, fecha, hora, id_a, mensaje, id_instructor) 
        VALUES (NULL, '$fecha', '$hora', '$id_a', '$mensaje', '$id')";

$resultado = mysqli_query($conexion, $sql);
    
if(!$resultado){
        echo '<script>
            alert("Error al agendar la cita, intente de nuevo.");
            window.history.go(-1);
        </script>';
}  else{
        echo '
        <script>
            alert("Cita agendada correctamente");
            window.history.go(-1);
        </script>';
}

mysqli_close($conexion);
