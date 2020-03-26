<?php

include '../../../database/conexion.php';


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['tel'];
$rol = $_POST['rol'];
$ficha = $_POST['numero_ficha'];
$nit = $_POST['nit'];
$estatus = 1;

$sql = "INSERT INTO tbl_aprendiz(id_a, nombres, apellidos, email, telefono, rol, numero_ficha, estatus, NIT) 
        VALUES ('$id', '$nombre', '$apellidos', '$email', '$telefono', '$rol', '$ficha', '$estatus', '$nit')";

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM tbl_aprendiz WHERE id_a = '$id'");
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
    window.history.go(-1);
    </script>';
} else{
    echo '
    <script>
        alert("Se ha registrado correctamente");
        window.history.go(-2);
    </script>';
}
mysqli_close($conexion);