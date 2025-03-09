<?php include "../app/views/templates/header.php"; ?>

<h2>Listado de Aseguradoras</h2>


<!-- Barra de búsqueda con filtro -->
<div class="search-container">
    <a href="index.php?controller=aseguradora&action=create" class="btn">Añadir Aseguradora</a>
    <input type="text" id="searchInput" placeholder="Buscar...">
    <select id="filterSelect">
        <option value="0">Nombre</option>
        <option value="1">Domicilio</option>
        <option value="2">CIF</option>
        <option value="3">Teléfono</option>
        <option value="4">Email</option>
        <option value="5">Contacto</option>
    </select>
</div>

<!-- Encabezados tipo tabla -->
<div class="header">
    <span>Nombre</span>
    <span>Domicilio</span>
    <span>CIF</span>
    <span>Teléfono</span>
    <span>Email</span>
    <span>Contacto</span>
</div>

<!-- Contenedor con los cards -->
<div class="cards-container">
    <?php foreach ($aseguradoras as $aseguradora): ?>
        <div class="card" data-id="<?php echo $aseguradora['id']; ?>">
            <span><?php echo $aseguradora['nombre']; ?></span>
            <span><?php echo $aseguradora['domicilio']; ?></span>
            <span><?php echo $aseguradora['CIF']; ?></span>
            <span><?php echo $aseguradora['telefono']; ?></span>
            <span><?php echo $aseguradora['email']; ?></span>
            <span><?php echo $aseguradora['persona_contacto']; ?></span>
        </div>
    <?php endforeach; ?>
</div>



<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <!-- Formulario de actualización -->
        <form id="updateForm" action="index.php?controller=aseguradora&action=update" method="POST">
            <input type="hidden" name="id" id="modalId"> <!-- ID oculto -->

            <label for="modalNombre">Nombre:</label>
            <input type="text" name="nombre" id="modalNombre">

            <label for="modalDomicilio">Domicilio:</label>
            <input type="text" name="domicilio" id="modalDomicilio">

            <label for="modalCIF">CIF:</label>
            <input type="text" name="CIF" id="modalCIF">

            <label for="modalTelefono">Teléfono:</label>
            <input type="text" name="telefono" id="modalTelefono">

            <label for="modalEmail">Email:</label>
            <input type="email" name="email" id="modalEmail">

            <label for="modalContacto">Persona de Contacto:</label>
            <input type="text" name="persona_contacto" id="modalContacto">

            <button type="submit">Actualizar</button>
        </form>

        <!-- Formulario de eliminación (SEPARADO) -->
       
        <form id="deleteForm" onsubmit="deleteAseguradora(event)">
            <input type="hidden" name="id" id="deleteId">
            <button type="submit" style="background-color: red; color: white;">Eliminar</button>
        </form>


        <!-- Botón de cancelar -->
        <button type="button" id="closeBtn">Cancelar</button>
    </div>
</div>


<script src="script.js"></script>

<?php include "../app/views/templates/footer.php"; ?>