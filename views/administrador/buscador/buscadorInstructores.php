<?php

	//Conexión a labase de datoss
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

    $query = "SELECT * FROM tbl_instructor ";

    if (isset($_POST['consulta'])) {
		//Escapamos los datos de entrada
		$q = $conn->real_escape_string($_POST['consulta']);
		
		//Consulta de busqueda
    	$query = "SELECT id_instructor,nombres,apellidos,email,telefono,programa FROM tbl_instructor WHERE id_instructor LIKE '%" .$q. "%'
		OR nombres LIKE '%" .$q. "%' OR apellidos LIKE '%" .$q. "%' OR email LIKE '%" .$q. "%' OR telefono LIKE '%" .$q. "%' OR programa LIKE '%" .$q. "%' ";
    }

    $resultado = $conn->query($query);

	//Comprobamos si los datos existen
    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>Identificación</td>
    					<td>Nombres</td>
    					<td>Apellidos</td>
    					<td>Email</td>
                        <td>Telefono</td>
                        <td>Programa</td>
                        <td>Acción</td>
    				</tr>
    			</thead>
    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['id_instructor']."</td>
    					<td>".$fila['nombres']."</td>
    					<td>".$fila['apellidos']."</td>
    					<td>".$fila['email']."</td>
                        <td>".$fila['telefono']."</td>
						<td>".$fila['programa']."</td>
                        <td><a href='../administrador/editarInstructor?id=".$fila['id_instructor']." '><ion-icon name='create-outline' class='editar' title='Editar'></ion-icon></a> ||
                        <a href='../administrador/includes/eliminarInstructor.php?id_instructor=".$fila['id_instructor']."'><ion-icon name='trash-outline' class='eliminar' title='Eliminar' id='confirm'></ion-icon></a>
    				</tr>";
    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="Los datos que buscas no se encuentran en el momento.";
    }

	//Imprimimos los datos
    echo $salida;

	//Cerramos la conexión
    $conn->close();
?>

<script src="js/confirmarDel.js"></script>