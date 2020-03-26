<?php 

include '../../../database/conexion.php';

$id = $_GET['id_instructor'];

$sql = "UPDATE tbl_instructor SET estatus = 1 WHERE id_instructor = '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../instructoresAgregados");

?>