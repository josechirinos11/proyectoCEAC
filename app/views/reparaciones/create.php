<?php include "../app/views/templates/header.php"; ?>


<div class="pageHome tipoForm">

<form action="index.php?controller=reparacion&action=create" method="POST" enctype="multipart/form-data">
    
<h2>Registrar Reparación</h2>
    <label for="id_aseguradora">Aseguradora:</label>
    <select name="id_aseguradora" id="id_aseguradora" required>
        <option value="">Seleccione</option>
        <?php foreach($aseguradoras as $aseg): ?>
            <option value="<?php echo $aseg['id']; ?>"><?php echo $aseg['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="id_asegurado">Asegurado:</label>
    <select name="id_asegurado" id="id_asegurado" required>
        <option value="">Seleccione</option>
        <?php foreach($asegurados as $asegdo): ?>
            <option value="<?php echo $asegdo['id']; ?>"><?php echo $asegdo['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="id_estado">Estado:</label>
    <select name="id_estado" id="id_estado" required>
        <option value="">Seleccione</option>
        <?php foreach($estados as $estado): ?>
            <option value="<?php echo $estado['id']; ?>"><?php echo $estado['estado']; ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" required>
    
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" rows="4"></textarea>
    
    <label for="imagen">Imagen (opcional):</label>
    <input type="file" name="imagen" id="imagen" accept="image/*">
    
    <button type="submit">Registrar</button>
</form>


</div>


<?php include "../app/views/templates/footer.php"; ?>
