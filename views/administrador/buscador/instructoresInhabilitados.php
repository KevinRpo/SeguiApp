<?php
	//Conexión a la base de datos 
	$servername = "localhost";
    $username = "root";
  	$password = "";
	$dbname = "seguiapp";
	$port = "3308";

	$conn = new mysqli($servername, $username, $password, $dbname, $port);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

	$query = "SELECT * FROM tbl_registros WHERE estatus = 0 AND rol = 'instructor'";

    if (isset($_POST['consulta'])) {
		//Escapamos los datos
		$q = $conn->real_escape_string($_POST['consulta']);
		
		//Consulta de busqueda
    	$query = "SELECT id,nombre,apellidos,email,telefono FROM tbl_registros WHERE rol = 'instructor' 
		AND estatus = 1 AND (id LIKE '%" .$q. "%' OR nombre LIKE '%" .$q. "%' OR apellidos LIKE '%" .$q. "%'
		OR email LIKE '%" .$q. "%' OR telefono LIKE '%" .$q. "%')";
    }

	$resultado = $conn->query($query);
	
	//Comprobamos que los datos existan 
    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>Identificación</td>
    					<td>Nombres</td>
    					<td>Apellidos</td>
    					<td>Email</td>
                        <td>Telefono</td>
                        <td>Acción</td>
    				</tr>
    			</thead>
    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
                        <td>".$fila['id']."</td>
                        <td>".$fila['nombre']."</td>
                        <td>".$fila['apellidos']."</td>
                        <td>".$fila['email']."</td>
                        <td>".$fila['telefono']."</td>
                        <td><a href='../administrador/editarInstructor?id=".$fila['id']." '><ion-icon name='create-outline' class='editar' title='Editar'></ion-icon></a> ||
						<a href='../administrador/includes/eliminarInstructor.php?id=".$fila['id']."'><ion-icon name='trash-outline' class='eliminar' title='Eliminar' id='confirm'></ion-icon></a> || 
						<a href='../administrador/includes/habilitarInstructor.php?id=".$fila['id']."'><ion-icon name='thumbs-up-outline' class='inhabilitar' title='Habilitar'></ion-icon></a></td>
                    </tr>";
    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="Los datos que buscas no se encuentran en el momento.";
    }

	//Imprimimos los datos 
    echo $salida;

	//Cerramos la consulta 
    $conn->close();



?>

<script src="../administrador/js/confirmarDel.js"></script>