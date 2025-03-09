<?php
class Aseguradora {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    // Insertar una nueva aseguradora
    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO aseguradoras (nombre, domicilio, CIF, telefono, email, persona_contacto) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nombre'],
            $data['domicilio'],
            $data['CIF'],
            $data['telefono'],
            $data['email'],
            $data['persona_contacto']
        ]);
    }
    
    // Obtener todas las aseguradoras
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM aseguradoras");
        return $stmt->fetchAll();
    }

    // Actualizar una aseguradora
    public function update($data) {
        $sql = "UPDATE aseguradoras SET 
                nombre = ?, 
                domicilio = ?, 
                CIF = ?, 
                telefono = ?, 
                email = ?, 
                persona_contacto = ? 
                WHERE id = ?";
    
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['nombre'], 
            $data['domicilio'], 
            $data['CIF'], 
            $data['telefono'], 
            $data['email'], 
            $data['persona_contacto'], 
            $data['id']
        ]);
    }


       // Eliminar una aseguradora
    public function delete($id) {
        $sql = "DELETE FROM aseguradoras WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
    
    
}
?>
