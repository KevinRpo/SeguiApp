<?php 

    session_start();
    $id = $_SESSION['aprendiz'];

    //Si la sesión no existe redirigimos al index
    if(!isset($id)){
        header("location:../../index");
    } else {

        include '../../../database/conexion.php';

        $sql = "SELECT * FROM tbl_bitacora WHERE id = '". $_GET['id']."'";
  
        $resultado = mysqli_query($conexion, $sql);
  
        if($fila = mysqli_fetch_assoc($resultado)) { 
            //Recorremos el array asociativo
            if($fila['nombre'] == ""){ ?>
                <h2>No hay archivos que mostrar</h2>
            <?php } else{ 
                 //Usamos el MIME o Ultipurpose Internet Mail Extensions (extensiones multipropósito de correo de internet)
                header('content-type: application/pdf');
                readfile('../Bitacoras/'.$fila['nombre']);
            } 
        }

    } 