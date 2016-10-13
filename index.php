<?php require("conectar.php"); ?>
<!DOCTYPE html>
<html lang="es">
<html>
<head>
<title>DBMezquital</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/iFrameCSS.css">

<script>
function showList() {
		pl=document.frmPlatillosIngredientes.selNombreP.value; 
		ing=document.frmPlatillosIngredientes.selNombreI.value; 
		Npor=document.frmPlatillosIngredientes.txtNoPorcion.value; 
		
    if (pl.length == 0 || ing.length == 0 || Npor.length==0) { 
        document.getElementById("Lista").innerHTML = "";
		
        return;
    } else { 
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
			
           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ListaIngredientes").innerHTML = xmlhttp.responseText;
				
            }
        };
		
        xmlhttp.open("GET", "procesaPlatilloIngrediente.php?p=" + pl+"&i="+ing+"&Np="+Npor, true);
		 xmlhttp.send();
		//document.getElementById("Lista").innerHTML = xmlhttp.responseText;
       
    }
}


function quitarIngr(id_platillo_ingrediente) {
		
		
    if (pl.length == 0 || ing.length == 0 || Npor.length==0) { 
        document.getElementById("Lista").innerHTML = "";
		
        return;
    } else { 
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
			
           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ListaIngredientes").innerHTML = xmlhttp.responseText;
				
            }
        };
		
        xmlhttp.open("GET", "QuitarIngrediente.php?id="+id_platillo_ingrediente, true);
		 xmlhttp.send();
		
       
    }
}

function showBuscar() {
	
		tabla=document.frmBuscar.selTabla.value; 
		criterio=document.frmBuscar.txtCriterio.value; 
	//alert(tabla + criterio);		
    if (tabla.length == 0 || criterio.length == 0 ) { 
        document.getElementById("ListaBuscar").innerHTML = "";
		
        return;
    } 
	else 
	{ 
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {

           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mensaje").innerHTML = msj;
				
            }
        };
		if (tabla=="ingrediente")	
		{	
		//alert(tabla);
        xmlhttp.open("GET", "buscaIngrediente.php?c=" + criterio, true);
		
		}
		
		else if (tabla=="platillo")	
		{	
        xmlhttp.open("GET", "buscaPlatillo.php?c=" + criterio, true);
		}
		else if (tabla=="platillo_ingrediente")	
		{	
        xmlhttp.open("GET", "buscaPlatilloIngrediente.php?p=" + criterio, true);
		}
		xmlhttp.send();       
    }
}



//Se llama para borrar un ingrediente después de buscarlo
function borraIngrediente(id_ingrediente) {
		
	//alert("entra para borrar");
		criterio=document.frmBuscar.txtCriterio.value; 
    if (id_ingrediente.length == 0 || criterio.length == 0) { 
        document.getElementById("ListaBuscar").innerHTML = "";
		
        return;
    } else { 
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
			
           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ListaBuscar").innerHTML = xmlhttp.responseText;
				
            }
        };
		
        xmlhttp.open("GET", "eliminarIngrediente.php?id="+id_ingrediente+"&c="+criterio, true);
		xmlhttp.send();
		
       
    }
}


//Se llama para borrar un platillo después de buscarlo
function borraPlatillo(id_platillo) {
		
	//alert("entra para borrar");
		criterio=document.frmBuscar.txtCriterio.value; 
    if (id_platillo.length == 0 || criterio.length == 0) { 
        document.getElementById("ListaBuscar").innerHTML = "";
		
        return;
    } else { 
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
			
           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ListaBuscar").innerHTML = xmlhttp.responseText;
				
            }
        };
		
        xmlhttp.open("GET", "eliminarPlatillo.php?id="+id_platillo+"&c="+criterio, true);
		xmlhttp.send();
		
       
    }
}

function quitarIngrPlatillo(id_platillo_ingrediente) {
		
		
    if (id_platillo_ingrediente.length == 0) { 
        document.getElementById("ListaBuscar").innerHTML = "";
		
        return;
    } else { 
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
			
           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ListaBuscar").innerHTML = xmlhttp.responseText;
				
            }
        };
		
        xmlhttp.open("GET", "QuitarIngredientePlatillo.php?id="+id_platillo_ingrediente, true);
		 xmlhttp.send();
		
       
    }
}

</script>

</head>
<body>

<header class="w3-container w3-red">
  <h1>Categorización de alimentos comunes en el Valle del Mezquital</h1>
</header>


<div class="w3-container">
<p>
Es necesario capturar la información de los ingredientes antes que la información de los platillos.
</p>

<p>
 <?PHP if(isset($_GET["r"]))
 {
 	if ($_GET["r"]==1)
	{
	echo "<p>Se agregó el ingrediente</p>";
	}
	if ($_GET["r"]==2)
	{
	echo "<p>Se agregó el platillo</p>";
	}
 }
?> 
</p>
</div>

<div class="w3-row-padding w3-section">
<ul class="w3-navbar w3-lime">
  <li><a href="#" onclick="openC('Ingredientes')">Ingredientes</a></li>
  <li><a href="#" onclick="openC('Platillos')">Platillos</a></li>
  <li><a href="#" onclick="openC('PlatillosIngredientes')">Platillos e ingredientes</a></li>
  <li><a href="#" onclick="openC('Buscar')">Buscar y eliminar</a></li>
  <li><a href="#" onclick="openC('BuscarModificar')">Modificar platillo</a></li>
    <li><a href="#" onclick="openC('ModificarIngrediente')">Modificar ingrediente</a></li>
</ul>

<div id="Ingredientes" class="w3-container city" id="divIngredientes">
<div action="index.html" class="w3-card-4">
<!--<iframe name="frameIngredientes" id="frameIngredientes" src="frmIngredientes.php" class="mi-iframe" frameborder="0">
</iframe>
-->
<div class="w3-container  w3-red">
  <h2>Ingredientes</h2>
  </div>
  
  <img src="img/ingredientes.png" alt="Ingredientes" style="width:30%">
  <p>Captura la información de cada ingrediente.</p>
  <form id="frmIngredientes" name="frmIngredientes" action="altaIngredientes.php" method="post" class="w3-container" >
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
   <label for="txtFuente" class="w3-label w3-validate">Fuente: </label>
  <input type="text" placeholder="Fuente" id="txtFuente" name="txtFuente" required class="w3-input w3-border">
   <br> <br>  
<!--   <input type="submit" id="btnEnviar" name="btnEnviar">
-->  
<button class="w3-btn w3-brown">Guardar</button></p>

</form>
</div>

</div>

<div id="Platillos" class="w3-container city">
<div action="altaPlatillo.php" class="w3-card-4">

  <div class="w3-container  w3-red">
  <h2>Platillos</h2>
  </div>
   <img src="img/platillos.png" alt="Platillos" style="width:30%">
  <p>Captura aquí la información de cada platillo.</p>
  <form id="frmPlatillos" name="frmPlatillos" action="altaPlatillo.php" method="post" class="w3-container" >
  <label for="txtNombre" class="w3-label w3-validate">Nombre del platillo: </label>
  <input type="text" placeholder="Nombre del platillo, por ejemplo: huevos a la mexicana" id="txtNombre" name="txtNombre" required class="w3-input w3-border">
   <br> <br> 
   <label for="txtTPorcion" class="w3-label w3-validate">Tamaño de la porción: </label>
  <input type="text" placeholder="Tamaño de la porción, ejemplo: 200 gr." id="txtTPorcion" name="txtTPorcion" required class="w3-input w3-border">
   <br><br> 
   
<button class="w3-btn w3-brown">Guardar</button></p>

</form>
</div>
</div>

<div id="PlatillosIngredientes" class="w3-container city">
<div class="w3-card-4">

  <div class="w3-container  w3-red">
  <h2>Platillos e ingredientes</h2>
  </div>
   <img src="img/preparando.jpg" alt="Platillos" style="width:30%">
  <p>Especifica qué ingredientes lleva cada platillo.</p>
  <!--action="procesaPlatilloIngrediente.php"-->
  <form id="frmPlatillosIngredientes" name="frmPlatillosIngredientes"  method="post" class="w3-container" >
  <label for="selNombreP" class="w3-label w3-validate">Nombre del platillo: </label>
   <select class="w3-input w3-select" id="selNombreP" name="selNombreP">
 <?PHP
   $sql = "SELECT * FROM platillo";
   $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<option value=".$row['id_platillo'].">".$row['nombre']."</option>";
	}
}
else {
    echo "0 results";
}
//$conn->close();
?>   
   </select>
   <br> <br> 
   <label for="selNombreI" class="w3-label w3-validate">Ingrediente: </label>
   <select class="w3-select" id="selNombreI" name="selNombreI" >
  <?PHP
   $sql = "SELECT * FROM ingrediente";
   $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<option value=".$row['id_ingrediente'].">".$row['nombre']."</option>";
	}
}
else {
    echo "0 results";
}
//$conn->close();
?>   
</select>
   <br><br> 
  <label for="txtNoPorcion" class="w3-label w3-validate">Número de porciones: </label>
  <input type="text" placeholder="Número de porciones que se adicionan al platillo, ejemplo: 1, 0.5, 2, etc." id="txtNoPorcion" name="txtNoPorcion" required class="w3-input w3-border">
   <br><br>
   
 <a href="javascript:showList()"><img src="img/agregar.jpg" alt="Agregar ingrediente" width="95" height="92" style=" margin-right:10px; margin-left:1100px"></img></a>  
<!--<button class="w3-brown"  onClick="showList()">Agregar</button></p>-->
 <br><br>
	
  </form>
	<div id="ListaIngredientes">
    <p id="mensaje"></p>
    </div>
     <br><br>
</div>
</div>

<div id="Buscar" class="w3-container city">
<div class="w3-card-4">

  <div class="w3-container  w3-red">
  <h2>Buscar</h2>
  </div>
  <!-- <img src="img/platillos.png" alt="Platillos" style="width:30%">-->
  <p>Aquí puedes eliminar.</p>
  <form id="frmBuscar" name="frmBuscar"  method="post" class="w3-container" >
  <label for="selTabla" class="w3-label w3-validate">Selecciona qué quieres buscar: </label>
  <select name="selTabla" id="selTabla" class="w3-input w3-select">
  <option value="platillo">Platillo</option>
  <option value="ingrediente">Ingrediente</option>
  <option value="platillo_ingrediente">Ingredientes de platillos</option>
  </select>
  
   <br><br> 
   <label for="txtCriterio" class="w3-label w3-validate">Nombre de lo que buscas: </label>
  <input type="text" placeholder="Nombre del platillo o ingrediente, por ejemplo: huevos a la mexicana o jitomate" id="txtCriterio" name="txtCriterio" required class="w3-input w3-border">
   <br> <br> 
   
<a href="javascript:showBuscar()"><img src="img/buscador.jpg" alt="Buscar" width="95" height="92" style=" margin-right:10px; margin-left:1100px"></img></a>  
<br> <br>

<div id="ListaBuscar"></div>
     <br><br>
 
</form>

</div>
</div>

<div id="BuscarModificar" class="w3-container city">
<div class="w3-card-4">

  <div class="w3-container  w3-red">
  <h2>Buscar</h2>
  </div>
  <!-- <img src="img/platillos.png" alt="Platillos" style="width:30%">-->
  <p>Aquí puedes modificar platillos.</p>
 <div><iframe name="bModificar" id="bModificar" class="mi-iframe" src="modificarPlatillo.php" frameborder="0"></iframe></div>


</div>
</div>

<div id="ModificarIngrediente" class="w3-container city">
<div class="w3-card-4">

  <div class="w3-container  w3-red">
  <h2>Buscar</h2>
  </div>
  <!-- <img src="img/platillos.png" alt="Platillos" style="width:30%">-->
  <p>Aquí puedes modificar ingredientes.</p>
 <div><iframe name="bModificarIngrediente" id="bModificarIngrediente" class="mi-iframe"  frameborder="0" src="modificarIngrediente.php"></iframe></div>


</div>
</div>





<footer class="w3-container w3-red">
  <h5>Desarrollada por Perla Ivet Jarillo Nieto</h5>
  <p>Proyecto: Aplicación móvil para el seguimiento de los comportamientos de autocuidado para la prevención y control de la diabetes, y su impacto en el Valle del Mezquital del estado de Hidalgo.</p>
</footer>

<script>
openC("Ingredientes")
function openC(cName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    document.getElementById(cName).style.display = "block";
}
</script>
</body>
</html>