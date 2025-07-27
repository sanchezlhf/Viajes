<!DOCTYPE html>
<html lang="es">
<!-- FORMULARIO HOTELES -->
<head>
  <meta charset="UTF-8">
  <title>Registrar Hotel</title>
  <link rel="stylesheet" href="style.css">
  <script>
    function validarHotel() {
      const nombre = document.forms["hotelForm"]["nombre"].value.trim();
      const ubicacion = document.forms["hotelForm"]["ubicacion"].value.trim();
      const habitaciones = document.forms["hotelForm"]["habitaciones"].value;
      const tarifa = document.forms["hotelForm"]["tarifa"].value;

      if (!nombre || !ubicacion || habitaciones <= 0 || tarifa <= 0) {
        alert("Por favor, completar todos los campos correctamente.");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
  <h1>Formulario Registro de Hoteles</h1>

  <form name="hotelForm" method="POST" action="ins_hotel.php" onsubmit="return validarHotel()" class="search-container">
    <input type="text" name="nombre" placeholder="Nombre del hotel" required>
    <input type="text" name="ubicacion" placeholder="Ubicación" required>
    <input type="number" name="habitaciones" placeholder="Habitaciones disponibles" min="1" required>
    <input type="number" name="tarifa" placeholder="Tarifa por noche" step="0.01" min="0" required>
    <button type="submit">Registrar Hotel</button>
  </form>
</body>
</html>
