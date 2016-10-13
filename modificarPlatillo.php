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
<form id="frmBuscar" name="frmBuscar" class="w3-container" action="modificarPlatillo.php" method="get">
  <label for="txtPlatillo" class="w3-label w3-validate">Escribe el nombre del platillo: </label>
  <input type=text name="txtPlatillo" id="txtPlatillo" class="w3-input w3-border" required >
  <br> <br> 
	<input type="submit" value="Buscar" ></form>
  </form>
<?php

 
 
if(isset($_GET["txtPlatillo"])){
$pl=$_GET["txtPlatillo"];
$pl=strtoupper($pl);
$consulta = "SELECT * FROM platillo WHERE nombre='$pl'";
$result = $conn->query($consulta);

	if ($result->num_rows > 0) {
		// output data of each row
		echo" <form id=frmMostrar name=frmMostrar method=post class=w3-container action=modificarPlatillo.php>";

		
		while($row = $result->fetch_assoc()) {
			echo "
		
		 <input type=hidden name=txtId id=txtId class='w3-input w3-border' value=".$row['id_platillo'].">
			
		 <label for=txtPlatillo class=w3-label w3-validate>Nombre del platillo: </label>
		 <textarea name=txtPlatillo id=txtPlatillo class='w3-input w3-border' required cols='35' rows='1' >".$row['nombre']."				</textarea>  <br> <br> 
		 <label for=txtTPorcion class=w3-label w3-validate>Tamaño de la porción: </label>
		 <textarea name=txtTPorcion id=txtTPorcion class='w3-input w3-border' required cols='35' rows='1' >".$row['tporcion']."				</textarea>";
		
		}
		
		echo "  <br> <br> <input type=submit value=Modificar ></form>  <br> <br> ";
	}
	else
		echo "No se encontraron resultados";
}




if(isset($_POST["txtPlatillo"])){
$pl=$_POST["txtPlatillo"];
$tp=$_POST["txtTPorcion"];
$id=$_POST["txtId"];
$pl=rtrim($pl); 
$pl=strtoupper($pl);

$sql = "UPDATE platillo SET nombre='$pl', tporcion='$tp' WHERE id_platillo=".$id;

if ($conn->query($sql) === TRUE) {
    echo "Platillo modificado";
} else {
    echo "Error al modificar platillo: " . $conn->error;
}

/*if ($conn->query($sql) === TRUE) {
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
	echo "<td><a href=javascript:modificarIngrediente(".$row['id_ingrediente'].")>Modificar</a></td>";

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
*/
}
$conn->close();
?>
</body>
</html>