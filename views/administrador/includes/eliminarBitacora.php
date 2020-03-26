<?php 

include '../../../database/conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM tbl_bitacora WHERE id= '$id'";

mysqli_query($conexion, $sql);

header("location: ../bitacorasAprendices");

?>