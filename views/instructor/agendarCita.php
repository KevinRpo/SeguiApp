<?php 
    session_start();
    $id = $_SESSION['instructor'];

    if(!isset($id)){
        header("location:../../index");
    } else {

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/images/seguiapp.ico" />
        <link rel="stylesheet" href="../../assets/icons/css/all.min.css" />
        <link rel="stylesheet" href="css/estilos.css" />
        <title>SeguiApp</title>
    </head>
    <body>
        <?php require_once './header/header.php'; ?> 
        <main>
            <h1>Agendar Visita <i class="far fa-calendar-alt"></i></h1><br/>
            <form action="includes/agendarCita.php" method="POST" class="form1">
            
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" required /> <br /><br />

                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora"  required /> <br /><br />

                <label for="id_a">Identificación - Aprendiz</label>
                <select name="id_a" id="id_a">
                    <option value="123">123456</option>
                    <option value="456">1234</option>
                </select>  <br /><br />

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" cols="32" rows="3" maxlength="70" minlength="5" required></textarea> <br /><br />

                <input type="submit" value="Enviar" /><br />
            </form>
        </main>
    </body>
</html>

        <?php //} 

    } ?>