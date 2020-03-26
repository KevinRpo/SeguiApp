<?php

include '../../../database/conexion.php';

if(isset($_POST['subir'])){
    session_start();
    $id = $_SESSION['aprendiz'];

    $archivo = $_FILES['archivo']['name'];
    $guardado = $_FILES['archivo']['tmp_name'];
    $tipo = $_FILES['archivo']['type'];

    if($tipo == 'application/pdf'){

        mysqli_query($conexion, "INSERT INTO tbl_bitacora(id, nombre, tipo, fecha, id_a) VALUES (NULL, '$archivo', '$tipo', CURDATE(), '$id')");

        if(!file_exists('../Bitacoras')){
            mkdir('../Bitacoras', 0777, true);
            if(file_exists('../Bitacoras')){
                if(move_uploaded_file($guardado, '../Bitacoras/'. $archivo)){
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
            if(move_uploaded_file($guardado, '../Bitacoras/'. $archivo)){
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

