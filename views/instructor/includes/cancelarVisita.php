<?php 

include '../../../database/conexion.php';

$id = $_GET['id_citacion'];

$sql = "DELETE FROM tbl_citacion WHERE id_citacion = '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../agendas");

?>