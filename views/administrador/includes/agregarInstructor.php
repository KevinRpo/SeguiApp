<?php

include '../../../database/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['tel'];
$rol = $_POST['rol'];
$programa = $_POST['programa'];

$sql = "INSERT INTO tbl_instructor(id_instructor, nombres, apellidos, email, telefono, rol, programa) 
        VALUES ('$id', '$nombre', '$apellidos', '$email', '$telefono', '$rol', '$programa')";

//Comprobamos que la identificación del instructor no ha sido ingresada anteriormente
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM tbl_instructor WHERE id_instructor = '$id'");
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