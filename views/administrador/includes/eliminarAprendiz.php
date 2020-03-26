<?php

include '../../../database/conexion.php';

$id = $_GET['id_a'];

$sql = "DELETE FROM tbl_aprendiz WHERE id_a = '".$id."'";

mysqli_query($conexion, $sql);

header("location: ../aprendicesAgregados");

?>