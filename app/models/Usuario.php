<?php
class Usuario {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    // Obtener usuario por nombre de usuario
    public function getUserByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function createUser($username, $password, $role = 'user')
    {
        $sql = "INSERT INTO usuarios (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':role' => $role
        ]);
    }


        // Obtener todas las usuario
        public function getAllUsers()
        {
            $sql = "SELECT id, username FROM usuarios"; // Asegúrate de que 'usuarios' es el nombre correcto de la tabla
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        //eliminar usuario
        public function deleteUser($id)
        {
            $sql = "DELETE FROM usuarios WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$id]);
        }

}
?>
