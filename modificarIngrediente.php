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
<form id="frmBuscar" name="frmBuscar" class="w3-container" action="modificarIngrediente.php" method="get">
  <label for="txtPlatillo" class="w3-label w3-validate">Escribe el nombre del ingrediente: </label>
  <input type=text name="txtIngrediente" id="txtIngrediente" class="w3-input w3-border" required >
  <br> <br> 
	<input type="submit" value="Buscar" ></form>
  </form>
<?php



if(isset($_GET["txtIngrediente"])){
$in=$_GET["txtIngrediente"];
$in=strtoupper($in);
$consulta = "SELECT * FROM ingrediente WHERE nombre='$in'";
$result = $conn->query($consulta);

	if ($result->num_rows > 0) {
		// output data of each row
		echo" <form id=frmMostrar name=frmMostrar method=post class=w3-container action=modificarIngrediente.php>";

		
		while($row = $result->fetch_assoc()) {
		echo "
		
		 <input type=hidden name=txtId id=txtId class='w3-input w3-border' value=".$row['id_ingrediente'].">
			
		 <label for=txtPlatillo class=w3-label w3-validate>Nombre del ingrediente: </label>
		 <textarea name=txtIngrediente id=txtIngrediente class='w3-input w3-border' required cols='35' rows='1' >".$row['nombre']."				</textarea>  <br> <br> 
		 <label for=txtTPorcion class=w3-label w3-validate>Tamaño de la porción: </label>
		 <textarea name=txtTPorcion id=txtTPorcion class='w3-input w3-border' required cols='35' rows='1' >".$row['tporcion']."				</textarea>";
		
		echo "<label for=agua class=w3-label w3-validate>Agua: </label><textarea name='agua' id='agua' class='w3-input w3-border' required cols='35' rows='1'>" . $row['agua'] . "</textarea>";
		echo "<label for=txtkcal class=w3-label w3-validate>Kilocalorías: </label><textarea name='kcal' id='kcal' class='w3-input w3-border' required cols='35' rows='1'>" . $row['kcal'] . "</textarea>";
		echo "<label for=proteinas class=w3-label w3-validate>Proteinas: </label><textarea name='proteinas' id='proteinas' class='w3-input w3-border' required cols='35' rows='1'>" . $row['proteinas'] . "</textarea>";
		echo "<label for=lipidos class=w3-label w3-validate>Lípidos: </label><textarea name='lipidos' id='kcal' class='w3-input w3-border' required cols='35' rows='1'>" . $row['lipidos'] . "</textarea>";
		echo "<label for=carb class=w3-label w3-validate>Carbohidratos: </label><textarea name='carb' id='carb' class='w3-input w3-border' required cols='35' rows='1'>" . $row['carb'] . "</textarea>";
		echo "<label for=fibra class=w3-label w3-validate>Fibra: </label><textarea name='fibra' id='fibra' class='w3-input w3-border' required cols='35' rows='1'>" . $row['fibra'] . "</textarea>";
		echo "<label for=origen class=w3-label w3-validate>Origen: </label><textarea name='origen' id='origen' class='w3-input w3-border' required cols='35' rows='1'>" . $row['origen'] . "</textarea>";
		echo "<label for=fuente class=w3-label w3-validate>Fuente: </label><textarea name='fuente' id='fuente' class='w3-input w3-border' required cols='35' rows='1'>" . $row['fuente'] . "</textarea>";
		}
		
		echo "  <br> <br> <input type=submit value=Modificar ></form>  <br> <br> ";
	}
	else
		echo "No se encontraron resultados";
}




if(isset($_POST["txtIngrediente"])){
$in=$_POST["txtIngrediente"];
$tp=$_POST["txtTPorcion"];
$id=$_POST["txtId"];
$agua=$_POST["agua"];
$kcal=$_POST["kcal"];
$proteinas=$_POST["proteinas"];
$lipidos=$_POST["lipidos"];
$carb=$_POST["carb"];
$fibra=$_POST["fibra"];
$origen=$_POST["origen"];
$fuente=$_POST["fuente"];
$in=rtrim($in); 
$in=strtoupper($in);
$agua=rtrim($agua); 
$agua=strtoupper($agua);
$kcal=rtrim($kcal); 
$kcal=strtoupper($kcal);
$proteinas=rtrim($proteinas); 
$proteinas=strtoupper($proteinas);
$lipidos=rtrim($lipidos); 
$lipidos=strtoupper($lipidos);
$carb=rtrim($carb); 
$carb=strtoupper($carb);
$fibra=rtrim($fibra); 
$fibra=strtoupper($fibra);
$origen=rtrim($origen); 
$origen=strtoupper($origen);
$fuente=rtrim($fuente); 
$fuente=strtoupper($fuente);

$sql = "UPDATE ingrediente SET nombre='$in', tporcion='$tp', agua='$agua', kcal='$kcal', proteinas='$proteinas', lipidos='$lipidos', carb='$carb',  fibra='$fibra', origen='$origen', fuente='$fuente' WHERE id_ingrediente=".$id;

if ($conn->query($sql) === TRUE) {
    echo "Ingrediente modificado";
} else {
    echo "Error al modificar platillo: " . $conn->error;
}

}
$conn->close();
?>
</body>
</html>