<?php 

include '../../../database/conexion.php';

$id = $_GET['id_a'];

$sql = "UPDATE tbl_aprendiz set estatus = 0 WHERE id_a = '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../aprendicesAgregados");

?>