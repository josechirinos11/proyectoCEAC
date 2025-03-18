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


}
?>
