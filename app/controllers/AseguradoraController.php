<?php
class AseguradoraController {
    private $pdo;
    
    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
    }
    
    // Listado de aseguradoras
    public function index() {
        $aseguradoraModel = new Aseguradora($this->pdo);
        $aseguradoras = $aseguradoraModel->getAll();
        include "../app/views/aseguradoras/index.php";
    }
    
    // Formulario para crear una nueva aseguradora
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre'           => $_POST['nombre'],
                'domicilio'        => $_POST['domicilio'],
                'CIF'              => $_POST['CIF'],
                'telefono'         => $_POST['telefono'],
                'email'            => $_POST['email'],
                'persona_contacto' => $_POST['persona_contacto']
            ];
            $aseguradoraModel = new Aseguradora($this->pdo);
            $aseguradoraModel->create($data);
            header("Location: index.php?controller=aseguradora&action=index");
            exit;
        } else {
            include "../app/views/aseguradoras/create.php";
        }
    }



    // Formulario para actualizar una aseguradora
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id'              => $_POST['id'],
                'nombre'          => $_POST['nombre'],
                'domicilio'       => $_POST['domicilio'],
                'CIF'             => $_POST['CIF'],
                'telefono'        => $_POST['telefono'],
                'email'           => $_POST['email'],
                'persona_contacto'=> $_POST['persona_contacto']
            ];
            
            $aseguradoraModel = new Aseguradora($this->pdo);
            $aseguradoraModel->update($data);
    
            header("Location: index.php?controller=aseguradora&action=index");
            exit;
        }
    }

// Formulario para delete una aseguradora
    public function delete2() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            
            if (!empty($id)) {
                $aseguradoraModel = new Aseguradora($this->pdo);
                $aseguradoraModel->delete($id);
                header("Location: index.php?controller=aseguradora&action=index");
                exit;
            } else {
                echo "Error: ID no válido.";
            }
        }
    }
    // En AseguradoraController.php

public function delete() {
    if (isset($_POST['id'])) {
        $id = $_POST['id']; // Obtener el ID de la aseguradora
        
        $aseguradoraModel = new Aseguradora($this->pdo);
        $result = $aseguradoraModel->delete($id);

        if ($result) {
            echo 'Aseguradora eliminada'; // Mensaje de éxito
        } else {
            echo 'Error al eliminar'; // Mensaje de error
        }
        exit; // Evitar que el código siga ejecutándose
    }
}

    
    

     


}
?>
