<?php 

include '../../../database/conexion.php';

$id = $_GET['id'];

$sql = "UPDATE tbl_registros set estatus = 1 WHERE id = '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../aprendicesAgregados");

?>