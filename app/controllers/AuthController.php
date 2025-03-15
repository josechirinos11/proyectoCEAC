<?php
class AuthController
{
    
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Mostrar formulario de login y validar usuario
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];
        
            // Instanciar el modelo de Usuario
            $usuarioModel = new Usuario($this->pdo);
            $user = $usuarioModel->getUserByUsername($username);
       
            if ($user) {
                          
                if (password_verify($password, $user['password'])) {
                    error_log("Contraseña válida, autenticando...");
                    $_SESSION['user'] = $user;
                    header("Location: index.php?controller=dashboard&action=home");
                    exit;
                } else {
                    error_log("Contraseña incorrecta.");
                }
            }
            



            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: index.php?controller=dashboard&action=home");
                exit;
            } else {
                $error = "Usuario o contraseña incorrectos. verificacion log";
                include "../app/views/auth/login.php";
            }
        } else {
            include "../app/views/auth/login.php";
        }
    }

    // Mostrar formulario de registro y guardar usuario
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Instanciar el modelo de Usuario
            $usuarioModel = new Usuario($this->pdo);
            $user = $usuarioModel->getUserByUsername($username);

            if ($user) {
                $error = "El usuario ya existe.";
                include "../app/views/auth/register.php";
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $usuarioModel->createUser($username, $password);
                header("Location: index.php?controller=auth&action=login");
                exit;
            }
        } else {
            include "../app/views/auth/register.php";
        }
    }

    // Cerrar sesión
    public function logout()
    {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
        exit;
    }
}
