<?php include "../app/views/templates/header.php"; ?>


<div class="pageHome">

<h2>Listado de Asegurados</h2>



<!-- Barra de búsqueda con filtro -->
<div class="search-container">
    <a href="index.php?controller=asegurado&action=create" class="btn">Añadir Aseguradora</a>
    <input type="text" id="searchInputAsegurado" placeholder="Buscar...">
    <select id="filterSelectAsegurado">
        <option value="0">Nombre</option>
        <option value="1">Dirección</option>
        <option value="2">Teléfono</option>
        <option value="3">Domicilio Reparación</option>
        
    </select>
</div>


<!-- Encabezados tipo tabla -->
<div class="header">
    <span>Nombre</span>
    <span>Dirección</span>
    <span>Teléfono</span>
    <span>Domicilio Reparación</span>
  
</div>



<!-- Contenedor con los cards -->
<div class="cards-container">
    <?php foreach ($asegurados as $asegurado): ?>
        <div class="cardAsegurado" data-id="<?php echo $asegurado['id']; ?>">
            <span><?php echo $asegurado['nombre']; ?></span>
            <span><?php echo $asegurado['direccion']; ?></span>
            <span><?php echo $asegurado['telefono']; ?></span>
            <span><?php echo $asegurado['domicilio_reparacion']; ?></span>
    
        </div>
    <?php endforeach; ?>
</div>





<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <!-- Formulario de actualización -->
        <form id="updateForm" action="index.php?controller=asegurado&action=update" method="POST">
            <input type="hidden" name="id" id="modalId"> <!-- ID oculto -->

            <label for="modalNombre">Nombre:</label>
            <input type="text" name="nombre" id="modalNombre">

            <label for="modalDireccion">Direccion:</label>
            <input type="text" name="direccion" id="modalDireccion">

            <label for="modalTelefono">Teléfono:</label>
            <input type="text" name="telefono" id="modalTelefono">

            <label for="modalDomicilio_reparacion">Domicilio Reparación:</label>
            <input type="text" name="domicilio_reparacion" id="modalDomicilio_reparacion">



            <button type="submit">Actualizar</button>
        </form>

        <!-- Formulario de eliminación (SEPARADO) -->
       
        <form id="deleteForm" onsubmit="deleteAsegurado(event)">
            <input type="hidden" name="id" id="deleteId">
            <button type="submit" >Eliminar</button>
                  
        </form>

        <form id="deleteForm" >
           
        <button type="button" id="closeBtn">Cancelar</button>
        </form>
  
    </div>
</div>


</div>

<script src="script.js"></script>

<?php include "../app/views/templates/footer.php"; ?>
