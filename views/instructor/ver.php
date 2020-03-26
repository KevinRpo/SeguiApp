<?php 

    session_start();
    $id = $_SESSION['instructor'];

    if(!isset($id)){
        header("location:../../index");
    } else {

        include '../../database/conexion.php';

        $sql = "SELECT * FROM tbl_informe WHERE id_informe = '". $_GET['id']."'";
  
        $resultado = mysqli_query($conexion, $sql);
  
        if($fila = mysqli_fetch_assoc($resultado)) { 
            if($fila['archivo'] == ""){ ?>
                <h2>No hay archivos que mostrar</h2>
            <?php } else{ 
                header('content-type: application/pdf');
                readfile('Informes/'.$fila['archivo']);
            } 
        }

    } 