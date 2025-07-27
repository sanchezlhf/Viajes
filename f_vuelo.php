<!DOCTYPE html>
<!-- FORMULARIO VUELOS -->
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Vuelo</title>
  <link rel="stylesheet" href="style.css">
  <script>
    function validarVuelo() {
      const origen = document.forms["vueloForm"]["origen"].value.trim();
      const destino = document.forms["vueloForm"]["destino"].value.trim();
      const fecha = document.forms["vueloForm"]["fecha"].value;
      const plazas = document.forms["vueloForm"]["plazas"].value;
      const precio = document.forms["vueloForm"]["precio"].value;

      if (!origen || !destino || !fecha || plazas <= 0 || precio <= 0) {
        alert("Complete todos los campos correctamente.");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
  <h1>Formulario Registro de Vuelos</h1>

  <form name="vueloForm" method="POST" action="ins_vuelo.php" onsubmit="return validarVuelo()" class="search-container">
    <input type="text" name="origen" placeholder="Origen" required>
    <input type="text" name="destino" placeholder="Destino" required>
    <input type="date" name="fecha" required>
    <input type="number" name="plazas" placeholder="Plazas disponibles" min="1" required>
    <input type="number" name="precio" placeholder="Precio" step="0.01" min="0" required>
    <button type="submit">Registrar Vuelo</button>
  </form>
</body>
</html>
