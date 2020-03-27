<?php

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
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'projectsena50@gmail.com';                     // SMTP username
    $mail->Password   = 'proyectosena123';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('projectsena50@gmail.com', 'SeguiApp');
    $mail->addAddress($correo_jefe);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Visita al Aprendiz";
    $mail->Body    = "Cordial saludo, se le informa que el día ".$fecha." con hora ".$hora." el instructor ".$row['nombres']. "" .$row['apellidos']." \n\n";
    $mail->Body .= "con dirección de correo electrónico ".$row['email']." y número de teléfono ".$row['telefono']."\n\n";
    $mail->CharSet = 'utf-8';
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        echo '
        <script>
            alert("Cita agendada correctamente");
            window.history.go(-1);
        </script>';
}

mysqli_close($conexion);
