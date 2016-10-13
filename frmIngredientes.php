
<!doctype html>
<html lang="es">
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" href="css/w3.css">
</head>

<body>

<div action="altaIngredientes.php" class="w3-card-4">

<div class="w3-container  w3-red">
  <h2>Ingredientes</h2>
  </div>
  
  <img src="img/ingredientes.png" alt="Ingredientes" style="width:30%">
  <p>Captura la información de cada ingrediente.</p>
  <form id="frmIngredientes" name="frmIngredientes" action="altaIngredientes.php" method="post" class="w3-container" target="frameIngredientes" >
  <label for="txtNombre" class="w3-label w3-validate">Nombre: </label>
  <input type="text" placeholder="Nombre del ingrediente" id="txtNombre" name="txtNombre" required class="w3-input w3-border">
   <br> <br> 
   <label for="txtTPorcion" class="w3-label w3-validate">Tamaño de la porción: </label>
  <input type="text" placeholder="Tamaño de la porción, ejemplo: 100 gr." id="txtTPorcion" name="txtTPorcion" required class="w3-input w3-border">
   <br><br> 
  <label for="txtAgua" class="w3-label w3-validate">Agua: </label>
  <input type="text" placeholder="Proporción de agua." id="txtAgua" name="txtAgua" required class="w3-input w3-border">
   <br><br> 
   <label for="txtKCal" class="w3-label w3-validate">Kilocalorías: </label>
  <input type="text" placeholder="Kilocalorías que aporta." id="txtKCal" name="txtKCal" required class="w3-input w3-border">
   <br> <br>  
   <label for="txtProteina" class="w3-label w3-validate">Proteinas: </label>
  <input type="text" placeholder="Proteinas." id="txtProteina" name="txtProteina" required class="w3-input w3-border">
   <br><br> 
	<label for="txtLipidos" class="w3-label w3-validate">Lípidos: </label>
  <input type="text" placeholder="Lípidos." id="txtLipidos" name="txtLipidos" required class="w3-input w3-border">
   <br> <br>   
   <label for="txtCarb" class="w3-label w3-validate">Carbohidratos: </label>
  <input type="text" placeholder="Carbohidratos." id="txtCarb" name="txtCarb" required class="w3-input w3-border">
   <br><br> 
   <label for="txtFibra" class="w3-label w3-validate">Fibra: </label>
  <input type="text" placeholder="Fibra." id="txtFibra" name="txtFibra" required class="w3-input w3-border">
   <br> <br>  
   <label for="selOrigen" class="w3-label w3-validate">Origen: </label>
  <select id="selOrigen" name="selOrigen" required class="w3-select">
  <option value="Animal">Animal</option>
  <option value="Verduras o frutas">Verduras o frutas</option>
   <option value="Cereales o tubérculos">Cereales o tubérculos</option>
  </select>
   <br><br> 
<!--   <input type="submit" id="btnEnviar" name="btnEnviar">
-->  
<button class="w3-btn w3-brown">Guardar</button></p>

</form>
</div>


</body>
</html>