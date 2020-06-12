<?php 

include '../../../database/conexion.php';

session_start();
$id = $_SESSION['admin'];

//Recibimos datos por POST 
$id_instructor = $_POST['id_instructor'];
$nombre_instructor = $_POST['nombre_instructor'];
$apellidos_instructor = $_POST['apellidos_instructor'];
$telefono_instructor = $_POST['telefono_instructor'];
$correo_instructor = $_POST['correo_instructor'];

$id_aprendiz = $_POST['id_aprendiz'];
$nombre_aprendiz = $_POST['nombre_aprendiz'];
$apellidos_aprendiz = $_POST['apellidos_aprendiz'];
$ficha_aprendiz = $_POST['ficha_aprendiz'];
$direccion = $_POST['direccion_aprendiz'];

//Hacemos la inserción en la tabla corespondiente
$sql = "INSERT INTO tbl_asignar_aprendiz(id_asignar, id_aprendiz, nombre_aprendiz, apellidos_aprendiz, 
ficha_aprendiz, direccion_empresa_aprendiz, id_instructor, nombre_instructor, apellidos_instructor,
telefono_instructor, correo_instructor, identificacion)
VAlUES (NULL, '$id_aprendiz', '$nombre_aprendiz', '$apellidos_aprendiz ', '$ficha_aprendiz', '$direccion',
'$id_instructor', '$nombre_instructor',  '$apellidos_instructor', '$telefono_instructor', '$correo_instructor',
'$id');";

//Verificamos posibles errores o repeteciones de identificaciones 
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM tbl_asignar_aprendiz WHERE id_instructor = '$id_instructor'");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
        <script>
            alert("El instructor no está disponible.");
            window.history.go(-1);
        </script>';
    exit;
}

$resultado = mysqli_query($conexion, $sql);
    
if(!$resultado){
    echo '<script>
    alert("Error al guardar, intente de nuevo.");
    window.history.go(-1);
    </script>';
} else{
    echo '
    <script>
        alert("Registro completado correctamente.");
        window.history.go(-1);
    </script>';
}
mysqli_close($conexion);