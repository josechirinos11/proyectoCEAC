<?php include "../app/views/templates/header.php"; ?>

<h2>Añadir Aseguradora</h2>
<form action="index.php?controller=aseguradora&action=create" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    
    <label for="domicilio">Domicilio:</label>
    <input type="text" name="domicilio" id="domicilio">
    
    <label for="CIF">CIF:</label>
    <input type="text" name="CIF" id="CIF">
    
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono">
    
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    
    <label for="persona_contacto">Persona de Contacto:</label>
    <input type="text" name="persona_contacto" id="persona_contacto">
    
    <button type="submit">Guardar</button>
</form>

<?php include "../app/views/templates/footer.php"; ?>
