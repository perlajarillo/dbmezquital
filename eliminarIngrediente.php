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
$sql = "DELETE FROM ingrediente WHERE id_ingrediente='$id'";

if ($conn->query($sql) === TRUE) {
echo "Se eliminó el ingrediente";
$consulta = "SELECT * FROM ingrediente WHERE nombre='$c'";
$result = $conn->query($consulta);

	if ($result->num_rows > 0) {
		// output data of each row
		echo "<table class='w3-table w3-striped w3-border'>
		<thead>
		<tr class='w3-red'>		
		<th>Nombre del ingrediente</th>
		<th>Tamaño de la porción</th>
		<th>Agua</th>
		<th>Kilocalorías</th>
		<th>Proteinas</th>
		<th>Lípidos</th>
		<th>Carbohidratos</th>
		<th>Fibra</th>
		<th>Origen</th>
		<th colspan=2>Acciones a realizar</th>
		</tr></thead>";
		while($row = $result->fetch_assoc()) {
			
		echo "<tr>";
		echo "<td><input type='text' name='nombre' id='nombre' value=" . $row['nombre'] . " required class='w3-input w3-border'></td>";
		echo "<td> <input type='text' name='tp' id='tp' value=" . $row['tporcion'] . " required class='w3-input w3-border'></td>";
		echo "<td><input type='text' name='agua' id='agua' value=" . $row['agua'] . " required class='w3-input w3-border'></td>";
		echo "<td><input type='text' name='kcal' id='kcal' value=" . $row['kcal'] . " required class='w3-input w3-border'></td>";
		echo "<td><input type='text' name='proteinas' id='proteinas' value=" . $row['proteinas'] . " required class='w3-input w3-border'></td>";
		echo "<td><input type='text' name='lipidos' id='lipidos' value=" . $row['lipidos'] . " required class='w3-input w3-border'></td>";
		echo "<td><input type='text' name='carb' id='carb' value=" . $row['carb'] . " required class='w3-input w3-border'></td>";
		echo "<td><input type='text' name='fibra' id='fibra' value=" . $row['fibra'] . " required class='w3-input w3-border'></td>";
		echo "<td><input type='text' name='origen' id='origen' value=" . $row['origen'] . " required class='w3-input w3-border'></td>";
		
	echo  "<td><a href='javascript:borraIngrediente(".$row['id_ingrediente'].")'>Quitar</a></td>";
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