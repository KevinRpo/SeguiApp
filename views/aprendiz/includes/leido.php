<?php 

include '../../../database/conexion.php';

$id = $_GET['id_citacion'];

$sql = "UPDATE tbl_citacion SET leido = 1 WHERE id_citacion = '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../notificaciones");

?>