<?php 

include '../../../database/conexion.php';

session_start();
$id = $_SESSION['aprendiz'];

$nit = $_POST['nit'];
$nombre = $_POST['nombre_empresa'];
$direccion = $_POST['direccion'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$nombre_jefe= $_POST['nombre_jefe'];

$sql = "INSERT INTO tbl_empresa(NIT, nombre, direccion, telefono, email, nombre_jefe, id_a) 
        VALUES ('$nit', '$nombre', '$direccion', '$tel', '$email', '$nombre_jefe', '$id') ";   

$resultado = mysqli_query($conexion, $sql);
    
if(!$resultado){
    echo '<script>
        alert("Los datos NO se han registrados correctamente.");
        window.history.go(-1);
    </script>';
} else{
    echo '
    <script>
        alert("Datos registrados correctamente");
        window.history.go(-1);
    </script>';
}

mysqli_close($conexion);