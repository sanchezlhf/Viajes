<!-- RECUPERACIÓN DE DATOS -->
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $destino = trim($_POST['destino'] ?? '');
    $fecha = $_POST['fecha'] ?? '';
    $duracion = intval($_POST['duracion'] ?? 0);

    if ($destino === '' || $fecha === '' || $duracion <= 0) {
        echo "<p>Complete todos los campos correctamente.</p>";
        exit;
    }

    echo "<h2>INFORMACIÓN REGISTRADA:</h2>";
    echo "<p><strong>Destino:</strong> " . htmlspecialchars($destino) . "</p>";
    echo "<p><strong>Fecha:</strong> " . htmlspecialchars($fecha) . "</p>";
    echo "<p><strong>Duración:</strong> " . $duracion . " días</p>";
} else {
    echo "No se permite el acceso";
}
