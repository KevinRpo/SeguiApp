<?php 

include '../../../database/conexion.php';

$id = $_POST['txtid'];
$nombre = $_POST['txtnombre'];
$apellidos = $_POST['txtapellidos'];
$email = $_POST['txtemail'];
$telefono = $_POST['txttel'];
$clave = $_POST['txtclave'];
$confirmar_clave = $_POST['txtconfirmar_clave'];

//Encriptar contraseñas
$hash = password_hash($clave, PASSWORD_BCRYPT, ['cost' => 4]);
$hash2 = password_hash($confirmar_clave, PASSWORD_BCRYPT, ['cost' => 4]);

if ($nombre != null || $apellidos != null || $email != null || $telefono != null || $ficha != null) {
    $sql2 = "UPDATE tbl_registros SET nombre = '".$nombre."', apellidos = '".$apellidos."', email = '".$email."', 
    telefono = '".$telefono."', clave = '".$hash."', confirmarClave =  '".$hash2."'
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
