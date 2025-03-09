<?php
// Incluir el archivo de conexión
require_once "../config/database.php";

try {
    // Ejecutar una consulta simple
    $stmt = $pdo->query("SELECT 'Conexión exitosa' AS mensaje");
    $resultado = $stmt->fetch();
    echo $resultado['mensaje'];
} catch (Exception $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}
?>
