<?php 

include '../../../database/conexion.php';

$id = $_GET['id_mensaje'];

$sql = "UPDATE tbl_mensaje SET leido = 0 WHERE id_mensaje = '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../mensajes");

?>