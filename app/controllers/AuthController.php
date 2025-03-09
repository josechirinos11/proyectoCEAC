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

            // Mostrar los datos enviados en el formulario
            //  var_dump($_POST); // Verifica qué está enviando el formulario
            //  error_log("Datos recibidos: " . print_r($_POST, true));

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

    // Cerrar sesión
    public function logout()
    {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
        exit;
    }
}
