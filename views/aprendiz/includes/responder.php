<?php 

include '../../../database/conexion.php';

session_start();
$id = $_SESSION['aprendiz'];

$id_instructor = $_POST['id_instructor'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO tbl_mensaje(id_instructor, fecha, mensaje, id_aprendiz) VALUES ('$id_instructor', CURDATE(), '$mensaje', '$id')";

$ejecutar = mysqli_query($conexion, $sql);

if(!$ejecutar){
    echo '<script>
        alert("El mensaje no se ha enviado correctamente.");
        window.history.go(-1);
    </script>';
} else{
    echo '
    <script>
        alert("Mensaje enviado correctamente");
        window.history.go(-1);
    </script>';
}

mysqli_close($conexion);