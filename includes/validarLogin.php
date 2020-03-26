<?php

require_once ('../database/conexion.php');
session_start();

$id = $_POST['id'];
$clave = $_POST['clave'];

$sql = "SELECT id, clave, rol FROM tbl_registros WHERE id = '$id' AND clave = '$clave'"; 
$result = mysqli_query($conexion, $sql)or die (mysqli_error($conexion));

if(mysqli_num_rows($result) >0 ){
    $filas = mysqli_fetch_array($result);

    if($filas['rol'] == 'administrador'){
        $_SESSION['admin'] = $id;
        header("location:../views/administrador/administrador");
    }
    else if($filas['rol'] == 'aprendiz'){
        $_SESSION['aprendiz'] = $id;
        header("location:../views/aprendiz/aprendiz");
    }
    else if($filas['rol'] == 'instructor'){
        $_SESSION['instructor'] = $id;
        header("location:../views/instructor/instructor");
    } 
}else {
    echo '
        <script>
            alert("Usuario incorrecto, intente de nuevo");
            window.history.go(-1);
        </script>';
}

mysqli_free_result($result);
mysqli_close($conexion);