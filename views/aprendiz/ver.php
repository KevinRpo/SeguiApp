<?php 

    session_start();
    $id = $_SESSION['aprendiz'];

    if(!isset($id)){
        header("location:../../index");
    } else {

        include '../../database/conexion.php';

        $sql = "SELECT * FROM tbl_bitacora WHERE id = '". $_GET['id']."'";
  
        $resultado = mysqli_query($conexion, $sql);
  
        if($fila = mysqli_fetch_assoc($resultado)) { 
            if($fila['nombre'] == ""){ ?>
                <h2>No hay archivos que mostrar</h2>
            <?php } else{ 
                header('content-type: application/pdf');
                readfile('Bitacoras/'.$fila['nombre']);
            } 
        }

    } 