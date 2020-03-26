<?php

include '../database/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];
$clave = $_POST['clave'];
$confirmarClave = $_POST['confirmarClave'];
$estatus = 1;

// $hash = password_hash($clave, PASSWORD_BCRYPT, ['cost' => 4]);
// $hash2 = password_hash($confirmarClave, PASSWORD_BCRYPT, ['cost' => 4]);

$sql = "INSERT INTO tbl_registros(id, nombre, apellidos, email, telefono, rol, clave, confirmarClave, estatus, fecha) 
        VALUES ('$id', '$nombre', '$apellidos', '$email', '$telefono', '$rol', '$clave', '$confirmarClave', '$estatus', CURDATE())";

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM tbl_registros WHERE id = '$id'");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
        <script>
            alert("El usuario ya está registrado");
            window.history.go(-1);
        </script>';
    exit;
}

$resultado = mysqli_query($conexion, $sql);
    
if(!$resultado){
    echo '<script>
        alert("Error al registrarse, intente de nuevo.");
        window.history.go(-2);
    </script>';
} else{
    echo '
    <script>
        alert("Se ha registrado correctamente");
        window.history.go(-2);
    </script>';
}
mysqli_close($conexion);
