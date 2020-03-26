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

    $query = "SELECT * FROM tbl_aprendiz ";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT id_a,nombres,apellidos,email,telefono,numero_ficha FROM tbl_aprendiz WHERE id_a LIKE '%" .$q. "%'
		OR nombres LIKE '%" .$q. "%' OR apellidos LIKE '%" .$q. "%' OR email LIKE '%" .$q. "%' OR telefono LIKE '%" .$q. "%' OR numero_ficha LIKE '%" .$q. "%' ";
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
                        <td><button class='boton_personalizado'><a href='../administrador/editarAprendiz?id_a=".$fila['id_a']." '><i class='fas fa-edit' title='Editar'></i></a></button> ||
                        <button class='boton_personalizado2' id='confirm'><a href='../administrador/includes/eliminarAprendiz.php?id_a=".$fila['id_a']."'><i class='fas fa-trash' title='Eliminar'></i></a></button>
    				</tr>";
    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="Los datos que buscas no se encuentran en el momento.";
    }

    echo $salida;

    $conn->close();



?>

<script src="../administrador/js/confirmarDel.js"></script>