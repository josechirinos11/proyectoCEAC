<?php
class ReparacionController {
    private $pdo;
    
    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
    }
    
// Listado de reparaciones con datos relacionados
public function index() {
    // Cargar modelos
    $reparacionModel = new Reparacion($this->pdo);
    $aseguradoraModel = new Aseguradora($this->pdo);
    $aseguradoModel   = new Asegurado($this->pdo);
    $estadoModel      = new Estado($this->pdo);

    // Obtener datos
    $reparaciones = $reparacionModel->getAll();
    $aseguradoras = $aseguradoraModel->getAll();
    $asegurados   = $aseguradoModel->getAll();
    $estados      = $estadoModel->getAll();

    // Incluir la vista con los datos disponibles
    include "../app/views/reparaciones/index.php";
}
    
    // Formulario para crear una reparación
    public function create() {
        // Para rellenar selects en el formulario
        $aseguradoraModel = new Aseguradora($this->pdo);
        $aseguradoModel   = new Asegurado($this->pdo);
        $estadoModel      = new Estado($this->pdo);
        
        $aseguradoras = $aseguradoraModel->getAll();
        $asegurados   = $aseguradoModel->getAll();
        $estados      = $estadoModel->getAll();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar subida de imagen (si se envía)
            $imagenPath = "";
            if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
                $uploadDir = "../public/images/";
                $fileName  = time() . "_" . basename($_FILES['imagen']['name']);
                $targetFile = $uploadDir . $fileName;
                if(move_uploaded_file($_FILES['imagen']['tmp_name'], $targetFile)){
                    $imagenPath = "images/" . $fileName;
                }
            }
            
            $data = [
                'id_aseguradora' => $_POST['id_aseguradora'],
                'id_asegurado'   => $_POST['id_asegurado'],
                'id_estado'      => $_POST['id_estado'],
                'fecha'          => $_POST['fecha'],
                'descripcion'    => $_POST['descripcion'],
                'imagen'         => $imagenPath
            ];
            $reparacionModel = new Reparacion($this->pdo);
            $reparacionModel->create($data);
            header("Location: index.php?controller=reparacion&action=index");
            exit;
        } else {
            include "../app/views/reparaciones/create.php";
        }
    }



    // Formulario para actualizar una reparacion
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             // Procesar subida de imagen (si se envía)
             $imagenPath = "";
             if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
                 $uploadDir = "../public/images/";
                 $fileName  = time() . "_" . basename($_FILES['imagen']['name']);
                 $targetFile = $uploadDir . $fileName;
                 if(move_uploaded_file($_FILES['imagen']['tmp_name'], $targetFile)){
                     $imagenPath = "images/" . $fileName;
                 }
             }
            $data = [
                'id'             => $_POST['id'],
                'id_aseguradora' => $_POST['id_aseguradora'],
                'id_asegurado'   => $_POST['id_asegurado'],
                'id_estado'      => $_POST['id_estado'],
                'fecha'          => $_POST['fecha'],
                'descripcion'    => $_POST['descripcion'],
                'imagen'         => $imagenPath
            ];
            
            $reparacionModel = new Reparacion($this->pdo);
            $reparacionModel->update($data);
    
            header("Location: index.php?controller=reparacion&action=index");
            exit;
        }
    }





    // Eliminar una reparación
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            
            // Validar que el ID no esté vacío
            if (!empty($id)) {
                $reparacionModel = new Reparacion($this->pdo);
                $reparacionModel->delete($id);
                header("Location: index.php?controller=reparacion&action=index");
                exit;
            } else {
                echo "Error: No se recibió un ID válido.";
            }
        }
    }

}
?>
