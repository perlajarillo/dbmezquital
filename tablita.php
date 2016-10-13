<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<table class="w3-table w3-striped w3-border">
<thead>
<tr class="w3-red">
  <th>ID Ingrediente</th>
  <th>Nombre</th>
  <th>Tamaño de la porción</th>
  <th>Agua</th>
  <th>Kilocalorías</th>
  <th>Proteinas</th>
  <th>Lípidos</th>
  <th>Carbohidratos</th>
  <th>Fibra</th>
  <th>Origen</th>
</tr>
</thead>

<?PHP
/*echo "<form id=frmbusca name=frmbusca method=post action=Consulta_Usuario.php>
    <p>
      <label>Escriba el nombre del usuario</label>
      <input name=txtusuario type=text />
      
    </p> </form>";

if(isset($_POST["txtusuario"])){
	$Criterio=$_POST["txtusuario"];*/

$sql = "SELECT * FROM ingrediente";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

echo "<tr>";
	echo "<td>" . $row['id_ingrediente'] . "</td>";
	echo "<td>" . $row['nombre'] . "</td>";
	echo "<td>" . $row['tporcion'] . "</td>";
	echo "<td>" . $row['agua'] . "</td>";
	echo "<td>" . $row['kcal'] . "</td>";
	echo "<td>" . $row['proteinas'] . "</td>";
	echo "<td>" . $row['lipidos'] . "</td>";
	echo "<td>" . $row['carb'] . "</td>";
	echo "<td>" . $row['fibra'] . "</td>";
	echo "<td>" . $row['origen'] . "</td>";
echo "</tr>";
	}
}
else {
    echo "0 results";
}
$conn->close();
?>
</table>

</body>
</html>