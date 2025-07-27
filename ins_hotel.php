<?php

// SCRIPT PROCESO DE DATOS - REGISTRO

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = trim($_POST['nombre']);
  $ubicacion = trim($_POST['ubicacion']);
  $habitaciones = (int)$_POST['habitaciones'];
  $tarifa = (float)$_POST['tarifa'];

  if ($nombre && $ubicacion && $habitaciones > 0 && $tarifa >= 0) {
    $stmt = $conexion->prepare("INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $nombre, $ubicacion, $habitaciones, $tarifa);
    if ($stmt->execute()) {
      echo "<p>Hotel registrado</p>";
    } else {
      echo "<p>Error al registrar el hotel</p>";
    }
    $stmt->close();
  } else {
    echo "<p>Por favor complete todos los campos correctamente.</p>";
  }
} else {
  echo "<p>Acceso no permitido</p>";
}
?>
