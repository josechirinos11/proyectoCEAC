<?php
class Estado {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    // Obtener todos los estados
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM estados");
        return $stmt->fetchAll();
    }
}
?>
