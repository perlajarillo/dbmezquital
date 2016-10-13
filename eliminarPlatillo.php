<?php require("conectar.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/iFrameCSS.css">

</head>

<body>

<?php
$id=$_GET["id"];
$c=$_GET["c"];
$sql = "DELETE FROM platillo WHERE id_platillo='$id'";

if ($conn->query($sql) === TRUE) {
echo "Se eliminó el platillo";
$consulta = "SELECT * FROM platillo WHERE nombre='$c'";
$result = $conn->query($consulta);

	if ($result->num_rows > 0) {
		// output data of each row
		echo "<table class='w3-table w3-striped w3-border'>
		<thead>
		<tr class='w3-red'>		
		<th>Nombre del platillo</th>
		<th>Tamaño de la porción</th>
				<th colspan=2>Acciones a realizar</th>
		</tr></thead>";
		while($row = $result->fetch_assoc()) {
			
		echo "<tr>";
		echo "<td><input type='text' name='nombre' id='nombre' value=" . $row['nombre'] . " required class='w3-input w3-border'></td>";
		echo "<td> <input type='text' name='tp' id='tp' value=" . $row['tporcion'] . " required class='w3-input w3-border'></td>";
		
	echo  "<td><a href='javascript:borraPlatillo(".$row['id_platillo'].")'>Quitar</a></td>";
	//echo "<td><a href=javascript:modificarIngrediente(".$row['id_ingrediente'].")>Modificar</a></td>";

	//echo "<td><a href=ModificarUsuarios.php?id=".$row['id_usuario'].">Modificar</a></td>";
		}
	echo "</table>";
	
		
	}
	else {
    	echo "No hay resultados";
}


} else {
    echo "Error al borrar el ingrediente: " . $conn->error;
}
$conn->close();
?>
</body>
</html>