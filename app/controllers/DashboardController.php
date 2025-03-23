<?php
class DashboardController {
    private $pdo;
    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
    }
    
    public function home() {

        // Instanciar el modelo de Usuario
        $usuarioModel = new Usuario($this->pdo);

        // Obtener todos los usuarios
        $usuarios = $usuarioModel->getAllUsers();


        include "../app/views/dashboard/home.php";
    }
}
?>
