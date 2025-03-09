<?php
class Reparacion {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    // Insertar una reparación
    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO reparaciones (id_aseguradora, id_asegurado, id_estado, fecha, descripcion, imagen) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['id_aseguradora'],
            $data['id_asegurado'],
            $data['id_estado'],
            $data['fecha'],
            $data['descripcion'],
            $data['imagen']  // Aquí se almacena la ruta de la imagen subida
        ]);
    }
    
    // Obtener todas las reparaciones (con datos relacionados)
    public function getAll() {
        $stmt = $this->pdo->query("SELECT r.*, 
                                   a.id AS id_aseguradora, a.nombre AS aseguradora, 
                                   ag.id AS id_asegurado, ag.nombre AS asegurado, 
                                   e.id AS id_estado, e.estado 
                                   FROM reparaciones r 
                                   JOIN aseguradoras a ON r.id_aseguradora = a.id 
                                   JOIN asegurados ag ON r.id_asegurado = ag.id 
                                   JOIN estados e ON r.id_estado = e.id");
        return $stmt->fetchAll();
    }
    // funcion de actualizar
    public function update($data) {
        $stmt = $this->pdo->prepare("UPDATE reparaciones SET id_aseguradora = ?, id_asegurado = ?, id_estado = ?, fecha = ?, descripcion = ?, imagen = ? WHERE id = ?");
        return $stmt->execute([
            $data['id_aseguradora'],
            $data['id_asegurado'],
            $data['id_estado'],
            $data['fecha'],
            $data['descripcion'],
            $data['imagen'],
            $data['id']
        ]);
    }
    // funcion de eliminar
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM reparaciones WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
}
?>
