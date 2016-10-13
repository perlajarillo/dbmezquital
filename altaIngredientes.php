<?php require("conectar.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?PHP
$nombre = $_POST["txtNombre"];
$nombre=strtoupper($nombre);
$tporcion = $_POST["txtTPorcion"];
$agua = $_POST["txtAgua"];
$kcal = $_POST["txtKCal"];
$proteina = $_POST["txtProteina"];
$lipidos = $_POST["txtLipidos"];
$carb = $_POST["txtCarb"];
$fibra = $_POST["txtFibra"];
$origen = $_POST["selOrigen"];
$fuente = $_POST["txtFuente"];
$origen=strtoupper($origen);
$fuente=strtoupper($fuente);

$sql = "INSERT INTO ingrediente (nombre, tporcion, agua, kcal, proteinas, lipidos, carb, fibra, origen, fuente)
VALUES ('$nombre', '$tporcion', '$agua', '$kcal', '$proteina', '$lipidos', '$carb', '$fibra', '$origen', '$fuente')";

if ($conn->query($sql) === TRUE) {
    echo "Se agregó el ingrediente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: index.php?r=1');
?>

</body>
</html>