<?php

include '../../../database/conexion.php';

if(isset($_POST['subir'])){
    session_start();
    $id = $_SESSION['instructor'];

    $archivo = $_FILES['archivo']['name'];
    $guardado = $_FILES['archivo']['tmp_name'];
    $tipo = $_FILES['archivo']['type'];

    if($tipo == 'application/pdf'){

        mysqli_query($conexion, "INSERT INTO tbl_informe(id_informe, archivo, tipo, fecha, id_a, id_instructor)
         VALUES (NULL, '$archivo', '$tipo', CURDATE(), '$id_a', '$id')");

        if(!file_exists('../Informes')){
            mkdir('../Informes', 0777, true);
            if(file_exists('../Bitacoras')){
                if(move_uploaded_file($guardado, '../Informes/'. $archivo)){
                    echo "
                        <script>
                            alert('Archivo guardado correctamente');
                            window.history.go(-1);
                        </script>";
                }else {
                    "<script>
                        alert('El archivo NO se ha guardado correctamente');
                        window.history.go(-1);
                    </script>";
                }
            }
        }else{
            if(move_uploaded_file($guardado, '../Informes/'. $archivo)){
                echo "
                    <script>
                        alert('Archivo guardado correctamente');
                        window.history.go(-1);
                    </script>";
            }else {
                echo "<script>
                    alert('El archivo NO se ha guardado correctamente');
                    window.history.go(-1);
                </script>";
            }
    }
    }else{
        echo "<script>
                alert('Solo archivos de tipo PDF.');
                window.history.go(-1);
            </script>";
    }
}

