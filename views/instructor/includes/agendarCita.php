<?php

//Incluir y usar las librerias PHPMailer
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require '../../../includes/PHPMailer/Exception.php';
require '../../../includes/PHPMailer/PHPMailer.php';
require '../../../includes/PHPMailer/SMTP.php';

include '../../../database/conexion.php';

session_start();
$id = $_SESSION['instructor'];

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$mensaje = $_POST['mensaje'];

$correo_jefe = $_POST['correo_jefe'];

$id_a = $_POST['id_a'];

$sql = "INSERT INTO tbl_citacion(id_citacion, fecha, hora, id_a, mensaje, correo_jefe, id_instructor) 
        VALUES (NULL, '$fecha', '$hora', '$id_a', '$mensaje', '$correo_jefe', '$id')";

$resultado = mysqli_query($conexion, $sql);
    
if(!$resultado){
        echo '<script>
            alert("Error al agendar la cita, intente de nuevo.");
            window.history.go(-1);
        </script>';
}  else{

        $sql = "SELECT * FROM tbl_instructor WHERE id_instructor = '$id'"; 

        $result = mysqli_query($conexion, $sql)or die (mysqli_error($conexion));
        $row = mysqli_fetch_array($result);

        $mail = new PHPMailer(true);

try {
    //Configuración del servidor
    $mail->SMTPDebug = 0;                               // Habilitar salida de depuración detallada
    $mail->isSMTP();                                    // Enviar usando SMTP
    $mail->Host       = 'smtp.gmail.com';               // Configuración del servidor SMTP para envio a través de gmail
    $mail->SMTPAuth   = true;                           // Habilitar autenticación SMTP
    $mail->Username   = 'projectsena50@gmail.com';      // Dirección de correo electrónico del emisor
    $mail->Password   = 'proyectosena123';              // Contraseña email emisor
    $mail->SMTPSecure = 'tls';                          // Habilitar cifrado tls
    $mail->Port       = 587;                            // Puerto TCP para conexión

    //Recipientes
    $mail->setFrom('projectsena50@gmail.com', 'SeguiApp');
    $mail->addAddress($correo_jefe);                    // Agregar destino de envío

    // Contenido
    $mail->isHTML(true);                                // Establecer formato de HTML
    $mail->Subject = "Visita al Aprendiz";
    $mail->Body  = "Cordial saludo, se le informa que el día ".$fecha." con hora ".$hora." el instructor ".$row['nombres']. " " .$row['apellidos']." \n\n";
    $mail->Body .= "con dirección de correo electrónico ".$row['email']." y número de teléfono ".$row['telefono']."\n\n";
    $mail->Body .= "realizará la visita al aprendiz para llevar a cabo un debido proceso.";
    $mail->CharSet = 'utf-8';
    $mail->send();
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado: {$mail->ErrorInfo}";
}
        echo '
        <script>
            alert("Cita agendada correctamente");
            window.history.go(-1);
        </script>';
}

mysqli_close($conexion);
