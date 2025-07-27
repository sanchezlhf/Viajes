<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="style.css">
 
<!-- SE AGREGA ENLACE DEL CARRITO DE COMPRAS A LA PÁGINA PRINCIPAL -->
 <a href="carritodecompras.php" style="display:inline-block; margin-top:20px; font-weight:bold;"> Ver carrito de compras
</a>

 <title>Agencia de Viajes IACC</title>
</head>
<body>
<?php
$mensajeOferta = "¡Ofertas especiales de viajes!.";

echo "<script>
  window.addEventListener('DOMContentLoaded', () => {
    mostrarNotificacion('" . addslashes($mensajeOferta) . "');
  });
</script>";
?>

    <h1>AGENCIA DE VIAJES IACC S8</h1>
    <p>Por favor, ingresar destino y fecha a realizar el viaje</p>
 <div class="search-container">
   <input type="text" id="destination" placeholder="Destino">
   <input type="date" id="travel-date">
   <button onclick="search()">Buscar</button>
 </div>

 <div id="results-container">
   <!-- Los resultados de la búsqueda se mostrarán aquí -->
 </div>

 <script src="jscript.js"></script> 
   <!-- SE AGREGA EL ENLACE AL ARCHIVO JSCRIPT.JS -->
</body>
</html>