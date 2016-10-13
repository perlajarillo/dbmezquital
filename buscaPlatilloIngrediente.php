<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/iFrameCSS.css">

</head>

<body>


<?php require("conectar.php"); ?>
<?php
// get the q parameter from URL
$p = $_GET["p"];


$consulta = "SELECT ingrediente.nombre, ingrediente.tporcion, ingrediente.agua, ingrediente.kcal, ingrediente.proteinas, ingrediente.lipidos, ingrediente.carb, ingrediente.fibra, ingrediente.origen, platillo_ingrediente.noPorciones, platillo.nombre,id_platillo_ingrediente FROM ingrediente, platillo, platillo_ingrediente WHERE platillo.id_platillo=platillo_ingrediente.id_platillo AND ingrediente.id_ingrediente=platillo_ingrediente.id_ingrediente AND '$p'=platillo.nombre";
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
		<th>Número de porciones adicionadas al platillo</th>
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
		echo "<td>" . $row['noPorciones'] . "</td>";
		
	echo "<td><a href=javascript:quitarIngrPlatillo(".$row['id_platillo_ingrediente'].")>Quitar</a></td>";
	
	//echo "<td><a href=ModificarUsuarios.php?id=".$row['id_usuario'].">Modificar</a></td>";
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