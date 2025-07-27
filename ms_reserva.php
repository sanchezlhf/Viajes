<?php

include("conexion.php");

// REGISTRO DE RESERVAS

$vuelos = $conexion->query("SELECT id_vuelo, origen, destino, fecha FROM VUELO");

$hoteles = $conexion->query("SELECT id_hotel, nombre, ubicacion FROM HOTEL");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Formulario de Reserva</title>
  <link rel="stylesheet" href="style.css" />

</form>

</head>
<body>
  <h1>Formulario Ingreso de Reserva</h1>

  <form method="POST" action="ins_reserva.php" class="search-container">
    <input type="number" name="id_cliente" placeholder="ID del Cliente" required min="1" />

    <input type="date" name="fecha_reserva" required />

    <select name="id_vuelo" required>
      <option value="">Seleccionar un vuelo</option>
      <?php while ($v = $vuelos->fetch_assoc()): ?>
        <option value="<?= $v['id_vuelo'] ?>">
          Vuelo: <?= htmlspecialchars($v['origen']) ?> a <?= htmlspecialchars($v['destino']) ?> (<?= $v['fecha'] ?>)
        </option>
      <?php endwhile; ?>
    </select>

    <select name="id_hotel" required>
      <option value="">Seleccione el hotel</option>
      <?php while ($h = $hoteles->fetch_assoc()): ?>
        <option value="<?= $h['id_hotel'] ?>">
          Hotel: <?= htmlspecialchars($h['nombre']) ?> (<?= htmlspecialchars($h['ubicacion']) ?>)
        </option>
      <?php endwhile; ?>
    </select>

    <button type="submit">Registrar la reserva</button>
  </form>

  <p><a href="codigo_base.php">Volver al inicio</a></p>
</body>
</html>
