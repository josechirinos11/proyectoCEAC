<?php
class Asegurado
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Insertar un asegurado
    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO asegurados (nombre, direccion, telefono, domicilio_reparacion) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['nombre'],
            $data['direccion'],
            $data['telefono'],
            $data['domicilio_reparacion']
        ]);
    }

    // Obtener todos los asegurados
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM asegurados");
        return $stmt->fetchAll();
    }


    // Eliminar una aseguradora
    public function delete($id)
    {
        $sql = "DELETE FROM asegurados WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    // Actualizar una aseguradora
    public function update($data)
    {
        $sql = "UPDATE asegurados SET 
                nombre = ?, 
                direccion = ?, 
                telefono = ?, 
                domicilio_reparacion = ? 
                WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['nombre'],
            $data['direccion'],
            $data['telefono'],
            $data['domicilio_reparacion'],
            $data['id']
        ]);
    }
}
