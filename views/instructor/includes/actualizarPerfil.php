<?php

include '../../../database/conexion.php';

//Recibir datos del formulario
$id = $_POST['txtid'];
$nombre = $_POST['txtnombre'];
$apellidos = $_POST['txtapellidos'];
$email = $_POST['txtemail'];
$telefono = $_POST['txttel'];
$clave = $_POST['txtclave'];
$confirmar_clave = $_POST['txtconfirmar_clave'];

//Comprobar si es diferente de Null 
if ($nombre != null || $apellidos != null || $email != null || $telefono != null || $clave != null || $confirmar_clave != null) {
    $sql2 = "UPDATE tbl_registros SET nombre = '".$nombre."', apellidos = '".$apellidos."', email = '".$email."', 
    telefono = '".$telefono."', clave = '".$clave."', confirmarClave =  '".$confirmar_clave."'
    WHERE id = '".$id."'";

    mysqli_query($conexion, $sql2);
    if ($sql2) {
        echo '<script>
                    alert("Actualizado Correctamente.");
                    window.history.go(-1);
            </script>';
    } else {
        echo '<script>
                    alert("Error al actualizar, intente de nuevo.");
                    window.history.go(-1);
            </script>';
    }
}
