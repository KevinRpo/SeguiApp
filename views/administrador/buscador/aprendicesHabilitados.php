<?php
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

	$query = "SELECT * FROM tbl_aprendiz WHERE estatus = 1 ";

    if (isset($_POST['consulta'])) {
		$q = $conn->real_escape_string($_POST['consulta']);
		
    	$query = "SELECT id_a,nombres,apellidos,email,telefono,numero_ficha FROM tbl_aprendiz WHERE estatus = 1 AND (id_a LIKE '%" .$q. "%'
		OR nombres LIKE '%" .$q. "%' OR apellidos LIKE '%" .$q. "%' OR email LIKE '%" .$q. "%' OR numero_ficha LIKE '%" .$q. "%')";
    }

	$resultado = $conn->query($query);
	
    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>Identificación</td>
    					<td>Nombres</td>
    					<td>Apellidos</td>
    					<td>Email</td>
                        <td>Telefono</td>
                        <td>Número Ficha</td>
                        <td>Acción</td>
    				</tr>
    			</thead>
    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['id_a']."</td>
    					<td>".$fila['nombres']."</td>
    					<td>".$fila['apellidos']."</td>
    					<td>".$fila['email']."</td>
                        <td>".$fila['telefono']."</td>
                        <td>".$fila['numero_ficha']."</td>
                        <td><a href='../administrador/editarAprendiz?id_a=".$fila['id_a']." '><ion-icon name='create-outline' class='editar' title='Editar'></ion-icon></a> ||
                        <a href='../administrador/includes/eliminarAprendiz.php?id_a=".$fila['id_a']."'><ion-icon name='trash-outline' class='eliminar' title='Eliminar' id='confirm'></ion-icon></a>|| 
                        <a href='../administrador/includes/inhabilitarAprendiz.php?id_a=".$fila['id_a']."'><ion-icon name='thumbs-down-outline' class='habilitar' title='Inhabilitar'></ion-icon></a></td>
    				</tr>";
    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="Los datos que buscas no se encuentran en el momento.";
    }

    echo $salida;

    $conn->close();

?>
<script src="js/confirmarDel.js"></script>