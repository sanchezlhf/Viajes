<!-- FORMULARIO INTENCIÓN DE VIAJE (INGRESO DE DATOS ) -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de viaje</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>FORMULARIO INTENCIÓN DE VIAJE</h1>

  <form method="POST" action="p_intencion.php" class="search-container">
    <input type="text" name="destino" placeholder="Destino" required />
    <input type="date" name="fecha" placeholder="Fecha de viaje" required />
    <input type="number" name="duracion" min="1" placeholder="Duración (días)" required />
    <button type="submit">Enviar información</button>
  </form>
</body>
</html>
