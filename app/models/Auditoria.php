<?php
class Auditoria {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    // Registrar una acción
    public function log($id_usuario, $accion, $descripcion = "") {
        $stmt = $this->pdo->prepare("INSERT INTO auditoria (id_usuario, accion, descripcion) VALUES (?, ?, ?)");
        return $stmt->execute([$id_usuario, $accion, $descripcion]);
    }
}
?>
