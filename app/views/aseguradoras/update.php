<?php
include "../config/db.php"; // Conexión a la BD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $domicilio = $_POST['domicilio'];
    $CIF = $_POST['CIF'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $persona_contacto = $_POST['persona_contacto'];

    // Validar que el ID exista
    if (!empty($id)) {
        $sql = "UPDATE aseguradoras SET 
                nombre = ?, 
                domicilio = ?, 
                CIF = ?, 
                telefono = ?, 
                email = ?, 
                persona_contacto = ? 
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $domicilio, $CIF, $telefono, $email, $persona_contacto, $id]);

        header("Location: index.php?controller=aseguradora&action=index");
        exit;
    } else {
        echo "Error: No se recibió el ID.";
    }
}
?>
