<?php 

include '../../../database/conexion.php';

$id = $_GET['id'];

$sql = "UPDATE tbl_registros SET estatus = 1 WHERE id= '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../instructoresAgregados");

?>