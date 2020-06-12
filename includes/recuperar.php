<?php

//Incluir y usar las librerias PHPMailer
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if(isset($_POST['enviar'])){
    require_once '../database/conexion.php';

    $email = $_REQUEST['email'];

    $sql = "SELECT id, nombre, email FROM tbl_registros WHERE email = '$email'"; 

    //Ejecutar consulta
    $result = mysqli_query($conexion, $sql)or die (mysqli_error($conexion));
    $row = mysqli_fetch_array($result);

    //Comprobar si el email ingresado existe en la base de datos
    if(mysqli_num_rows($result) == 1){
        $token = uniqid();
        $sql = "UPDATE tbl_registros SET token = '$token' WHERE email = '$email'";
        $act = mysqli_query($conexion, $sql);

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
        $mail->addAddress($email);                          // Agregar destino de envío

        // Contenido
        $mail->isHTML(true);                                // Establecer formato de HTML
        $mail->Subject = "Recuperar Clave";
        $mail->Body    = "Hola " . $row['nombre'] . " , haz solictado cambiar tu contraseña, ingresa al siguiente link<br /><br />";
        $mail->Body .= "http://localhost/SeguiApp/views/nuevaClave.php?user=".$row['id']."&token=".$token."<br /><br />";
        $mail->Body .= "**********************NO RESPONDER - Mensaje Generado Automáticamente********************** <br /><br />
        Este correo es únicamente informativo y es de uso exclusivo del destinatario(a), puede contener información privilegiada y/o confidencial. Si no es usted el destinatario(a) deberá borrarlo inmediatamente. Queda notificado que el mal uso, divulgación no autorizada, alteración y/o  modificación malintencionada sobre este mensaje y sus anexos quedan estrictamente prohibidos y pueden ser legalmente sancionados. -SeguiApp  no asume ninguna responsabilidad por estas circunstancias.";
        $mail->CharSet = 'utf-8';
        $mail->send();
        
        echo "<script>
                alert('Te hemos enviado un email para cambiar tu contraseña');
                window.history.go(-2);
            </script>";
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado: {$mail->ErrorInfo}";
    }

    }else {
        echo "<script>
                alert('Esta dirección de correo electrónico no existe, vuelvalo a intentar.');
                window.history.go(-1);
            </script>";
    }
}

//Liberar memoria
mysqli_free_result($result);

//Cerrar conexion
mysqli_close($conexion);

?>