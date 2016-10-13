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
// get the q parameter from URL
$c = $_GET["c"];
$c=strtoupper($c);

   // echo "Se agregó el ingrediente al platillo";
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
		<th>Fuente</th>
		<th colspan=2>Acciones a realizar</th>
		</tr></thead>";
		while($row = $result->fetch_assoc()) {
			
		echo "<tr>";
		echo "<td>" . $row['nombre'] . "</td>";
		echo "<td>" . $row['tporcion'] . "</td>";
		echo "<td>" . $row['agua'] . "</td>";
		echo "<td>" . $row['kcal'] . "</td>";
		echo "<td>" . $row['proteinas'] . "</td>";
		echo "<td>" . $row['lipidos'] . "</td>";
		echo "<td>" . $row['carb'] . "</td>";
		echo "<td>" . $row['fibra'] . "</td>";
	echo "<td>" . $row['origen'] . "</td>";
		echo "<td>" . $row['fuente'] . "</td>";

echo  "<td><a href='javascript:borraIngrediente(".$row['id_ingrediente'].")'>Quitar</a></td>";
		}
	echo "</table>";
	
		
	}
	else {
    	echo "No hay resultados";
}

$conn->close();


?>
</body>
</html>