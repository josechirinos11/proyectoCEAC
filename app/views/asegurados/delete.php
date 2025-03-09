<?php
include "../config/db.php"; // Conexión a la BD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Validar que el ID no esté vacío
    if (!empty($id)) {
        $sql = "DELETE FROM asegurados WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        header("Location: index.php?controller=asegurado&action=index");
        exit;
    } else {
        echo "Error: No se recibió un ID válido.";
    }
}
?>
