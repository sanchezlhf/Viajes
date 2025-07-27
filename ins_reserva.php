<?php
include("conexion.php");

// PROCESA LOS DATOS INGRESADOS Y LOS MUESTRA EN LA TABLA "RESERVA"

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_cliente = intval($_POST['id_cliente'] ?? 0);
    $fecha_reserva = $_POST['fecha_reserva'] ?? '';
    $id_vuelo = intval($_POST['id_vuelo'] ?? 0);
    $id_hotel = intval($_POST['id_hotel'] ?? 0);

    if ($id_cliente > 0 && $fecha_reserva && $id_vuelo > 0 && $id_hotel > 0) {
        $stmt = $conexion->prepare("INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isii", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel);

        if ($stmt->execute()) {
            echo "La reserva ha sido registrada correctamente";
        } else {
            echo "Surgió un error al registrar la reserva" . $stmt->error;
        }
    } else {
        echo "Por favor complete todos los campos";
    }
} else {
    echo "Acceso no permitido.";
}
?>
