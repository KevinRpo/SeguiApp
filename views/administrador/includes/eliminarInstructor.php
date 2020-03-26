<?php

include '../../../database/conexion.php';

$id = $_GET['id_instructor'];

$sql = "DELETE FROM tbl_instructor WHERE id_instructor = '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../instructoresAgregados");

?>