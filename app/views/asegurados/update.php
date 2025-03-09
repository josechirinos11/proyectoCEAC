<?php
include "../config/db.php"; // Conexión a la BD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $domicilio_reparacion = $_POST['domicilio_reparacion'];
    

    // Validar que el ID exista
    if (!empty($id)) {
        $sql = "UPDATE asegurados SET 
                nombre = ?, 
                direccion = ?, 
                telefono = ?, 
                domicilio_reparacion = ?, 
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $direccion, $telefono, $telefono, $domicilio_reparacion, $id]);

        header("Location: index.php?controller=asegurado&action=index");
        exit;
    } else {
        echo "Error: No se recibió el ID.";
    }
}
?>
