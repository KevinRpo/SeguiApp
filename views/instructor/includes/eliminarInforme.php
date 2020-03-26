<?php 

include '../../../database/conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM tbl_informe WHERE id_informe = '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../informeSIGA");

?>