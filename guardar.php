<?php

include "conexion.php";

$nombre = $_POST['nombre_tarea'];
$responsable = $_POST['responsable'];
$inicio = $_POST['fecha_inicio'];
$fin = $_POST['fecha_fin'];
$estado = $_POST['estado'];
$descripcion = $_POST['descripcion'];

$stmt = $conn->prepare("INSERT INTO tareas 
(nombre_tarea, responsable, fecha_inicio, fecha_fin, estado, descripcion)
VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssss", $nombre, $responsable, $inicio, $fin, $estado, $descripcion);

if ($stmt->execute()) {
    echo "✔ Tarea guardada correctamente";
} else {
    echo "❌ Error: " . $conn->error;
}

?>