<?php
include "../config/db.php"; // Conexión a la BD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $id_aseguradora = $_POST['id_aseguradora'];
    $id_asegurado = $_POST['id_asegurado']; 
    $id_estado = $_POST['id_estado'];
    $fecha = $_POST['fecha'];   
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen']['name'];
   
    

    // Validar que el ID exista
    if (!empty($id)) {
        $sql = "UPDATE reparaciones SET id_aseguradora = ?, id_asegurado = ?, id_estado = ?, fecha = ?, descripcion = ?, imagen = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_aseguradora, $id_asegurado, $id_estado, $fecha, $descripcion, $imagen, $id]);

        header("Location: index.php?controller=asegurado&action=index");
        exit;
    } else {
        echo "Error: No se recibió el ID.";
    }
}
?>
