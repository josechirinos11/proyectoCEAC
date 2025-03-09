<?php include "../app/views/templates/header.php"; ?>

<h2>Añadir Asegurado</h2>
<form action="index.php?controller=asegurado&action=create" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" id="direccion">
    
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono">
    
    <label for="domicilio_reparacion">Domicilio Reparación:</label>
    <input type="text" name="domicilio_reparacion" id="domicilio_reparacion">
    
    <button type="submit">Guardar</button>
</form>

<?php include "../app/views/templates/footer.php"; ?>
