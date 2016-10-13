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
//		echo "<td><a href='javascript:borraIngrediente(1,Fresas)'>Quitar</a></td>";
//		echo "<td><a href=javascript:;  onclick='javascript:borraIngrediente(4,CREMA);'>Quitar</a></td>";
		//<input type="button" href="javascript:;" onclick="realizaProceso($('#valor1').val(), $('#valor2').val());return false;" value="Calcula"/>
	//echo "<td><a href=javascript:showBuscar()>Quitar</a></td>";
	//echo "<td><a href=javascript:modificarIngrediente(".$row.")>Modificar</a></td> </tr>";

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