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

$sql = "INSERT INTO platillo (nombre, tporcion)
VALUES ('$nombre', '$tporcion')";

if ($conn->query($sql) === TRUE) {
    echo "Se agregó el platillo";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: index.php?r=2');
?>

</body>
</html>