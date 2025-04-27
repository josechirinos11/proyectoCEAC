<?php include "../app/views/templates/header.php"; ?>

<div class="pageHome tipoForm">

<form action="index.php?controller=asegurado&action=create" method="POST">
<h2>Añadir Asegurado</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" id="direccion">
    
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono">
    
    <label for="domicilio_reparacion">Domicilio Reparación:</label>
    <input type="text" name="domicilio_reparacion" id="domicilio_reparacion">
    
    <button type="submit">Guardar</button>
    <button id="closeBtn" type="button" onclick="window.location.href='index.php?controller=asegurado&action=index'">Cancelar</button>
</form>

</div>

<?php include "../app/views/templates/footer.php"; ?>
