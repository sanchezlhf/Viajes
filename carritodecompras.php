<?php
session_start();

$paquetes = [
  1 => "Paquete a Argentina",
  2 => "Paquete a Argentina 2",
  3 => "Paquete a Estados Unidos",
  4 => "Paquete a Japón",
  5 => "Paquete a Brasil"
];

if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = [];
}

// AGREGA EL PAQUETE DE VIAJE AL CARRITO
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['paquete_id'])) {
  $id = (int)$_POST['paquete_id'];
  if (array_key_exists($id, $paquetes) && !in_array($id, $_SESSION['carrito'])) {
    $_SESSION['carrito'][] = $id;
  }
}

// VACIAR CARRITO
if (isset($_POST['accion']) && $_POST['accion'] === 'vaciar') {
  $_SESSION['carrito'] = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Carrito de Compras</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <h1>Carrito de Paquetes</h1>

  <ul>
    <?php if (!empty($_SESSION['carrito'])): ?>
      <?php foreach ($_SESSION['carrito'] as $id): ?>
        <li><?= htmlspecialchars($paquetes[$id]) ?></li>
      <?php endforeach; ?>
    <?php else: ?>
      <li>El carrito está vacío</li>
    <?php endif; ?>
  </ul>

  <form method="POST">
    <input type="hidden" name="accion" value="vaciar" />
    <button type="submit">Vaciar carrito</button>
  </form>

  <p><a href="codigo_base.php">← Volver a la página principal</a></p>
</body>
</html>
