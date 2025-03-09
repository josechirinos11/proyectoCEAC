<?php
class AseguradoController {
    private $pdo;
    
    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
    }
    
    // Listado de asegurados
    public function index() {
        $aseguradoModel = new Asegurado($this->pdo);
        $asegurados = $aseguradoModel->getAll();
        include "../app/views/asegurados/index.php";
    }
    
    // Formulario para crear un asegurado
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre'               => $_POST['nombre'],
                'direccion'            => $_POST['direccion'],
                'telefono'             => $_POST['telefono'],
                'domicilio_reparacion' => $_POST['domicilio_reparacion']
            ];
            $aseguradoModel = new Asegurado($this->pdo);
            $aseguradoModel->create($data);
            header("Location: index.php?controller=asegurado&action=index");
            exit;
        } else {
            include "../app/views/asegurados/create.php";
        }
    }

 

    // Formulario para eliminar un asegurado


    public function delete() {
        if (isset($_POST['id'])) {
            $id = $_POST['id']; // Obtener el ID de la aseguradora
            
            $aseguradoModel = new Asegurado($this->pdo);
            $result = $aseguradoModel->delete($id);
    
            if ($result) {
                echo 'Aseguradora eliminada'; // Mensaje de éxito
            } else {
                echo 'Error al eliminar'; // Mensaje de error
            }
            exit; // Evitar que el código siga ejecutándose
        }
    }


        // Formulario para actualizar una aseguradora
        public function update() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'id'              => $_POST['id'],
                    'nombre'          => $_POST['nombre'],
                    'direccion'       => $_POST['direccion'],
                    'telefono'             => $_POST['telefono'],
                    'domicilio_reparacion'        => $_POST['domicilio_reparacion']
                ];
                
                $aseguradoModel = new Asegurado($this->pdo);
                $aseguradoModel->update($data);
        
                header("Location: index.php?controller=aseguradora&action=index");
                exit;
            }
        }


}
?>
