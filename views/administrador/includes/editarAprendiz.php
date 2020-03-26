<?php

include '../../../database/conexion.php';

$id = $_POST['txtid'];
$nombre = $_POST['txtnombre'];
$apellidos = $_POST['txtapellidos'];
$email = $_POST['txtemail'];
$telefono = $_POST['txttel'];
$ficha = $_POST['txtnumero_ficha'];

if ($nombre != null || $apellidos != null || $email != null || $telefono != null || $ficha != null) {
    $sql2 = "UPDATE tbl_aprendiz SET nombres = '".$nombre."', apellidos = '".$apellidos."', email = '".$email."', 
    telefono = '".$telefono."', numero_ficha = '".$ficha."' WHERE id_a = '".$id."'";
    mysqli_query($conexion, $sql2);
    if ($sql2) {
        echo '<script>
                    alert("Actualizado Correctamente.");
                    window.history.go(-2);
            </script>';
    } else {
        echo '<script>
                    alert("Error al actualizar, intente de nuevo.");
                    window.history.go(-1);
            </script>';
    }
}


