<?php
include 'conexion.php';

// SCRIPT PROCESO DE DATOS - REGISTRO

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $origen = trim($_POST['origen']);
  $destino = trim($_POST['destino']);
  $fecha = $_POST['fecha'];
  $plazas = (int)$_POST['plazas'];
  $precio = (float)$_POST['precio'];

  if ($origen && $destino && $fecha && $plazas > 0 && $precio >= 0) {
    $stmt = $conexion->prepare("INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $origen, $destino, $fecha, $plazas, $precio);
    if ($stmt->execute()) {
      echo "<p>Vuelo registrado</p>";
    } else {
      echo "<p>Error al registrar</p>";
    }
    $stmt->close();
  } else {
    echo "<p>Por favor complete todos los campos correctamente</p>";
  }
} else {
  echo "<p>Acceso no permitido.</p>";
}
?>
