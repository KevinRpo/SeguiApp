<?php

require_once '../database/conexion.php';
session_start();

//Recibir datos del formulario
$id = $_POST['id'];
$clave = $_POST['clave'];

//Consulta de credenciales
$sql = "SELECT * FROM tbl_registros WHERE id = '$id'"; 
$result = mysqli_query($conexion, $sql) or die (mysqli_error($conexion));

//Buscar en los registros la consulta solicitada
if(mysqli_num_rows($result) > 0 ){
    $filas = mysqli_fetch_assoc($result);

    //Verificar contraseña
    $verify = password_verify($clave, $filas['clave']);

    if($verify){
        //Comprobar si el usuario está inhabilitado
        if($filas['estatus'] == 1){

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
        } else{
            echo '
            <script>
                alert("Tu usuario se encuentra inhabilitado.");
                window.history.go(-1);
            </script>';
        }
    } else{
        echo '
        <script>
            alert("Usuario incorrecto, intente de nuevo");
            window.history.go(-1);
        </script>';
    }
}else {
    echo '
        <script>
            alert("Usuario incorrecto, intente de nuevo");
            window.history.go(-1);
        </script>';
}

//Liberar memoria empleada para realizar la consulta
mysqli_free_result($result);

//Cerrar conexion 
mysqli_close($conexion);