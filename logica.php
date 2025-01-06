<?php
include 'conexion.php';

// Manejo de acciones
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $sql = "INSERT INTO dulces (nombre, precio, cantidad) VALUES ('$nombre', '$precio', '$cantidad')";
        $conn->query($sql);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $sql = "UPDATE dulces SET nombre='$nombre', precio='$precio', cantidad='$cantidad' WHERE id=$id";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM dulces WHERE id=$id";
        $conn->query($sql);
    }
}

// Obtener datos de dulces
$result = $conn->query("SELECT * FROM dulces");
?>
