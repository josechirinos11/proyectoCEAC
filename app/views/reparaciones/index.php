<?php include "../app/views/templates/header.php"; ?>

<h2>Listado de Reparaciones</h2>



<!-- Barra de búsqueda con filtro -->
<div class="search-container">
    <a href="index.php?controller=reparacion&action=create" class="btn">Registrar Reparación</a>
    <input type="text" id="searchInputReparacion" placeholder="Buscar...">
    <select id="filterSelectReparacion">
        <option value="0">Aseguradora</option>
        <option value="1">Asegurado</option>
        <option value="2">Fecha</option>
        <option value="3">Estado</option>
        <option value="4">Descripción</option>
        <option value="5">Imagen</option>

    </select>
</div>


<!-- Encabezados tipo tabla -->
<div class="header">
    <span>Aseguradora</span>
    <span>Asegurado</span>
    <span>Fecha</span>
    <span>Estado</span>
    <span>Descripción</span>
    <span>Imagen</span>

</div>




<!-- Contenedor con los cards -->
<!-- Contenedor con los cards -->
<div class="cards-container">
    <?php foreach ($reparaciones as $rep): ?>
        <div class="cardReparacion"
            data-id="<?php echo $rep['id']; ?>"
            data-id-aseguradora="<?php echo $rep['id_aseguradora']; ?>"
            data-id-asegurado="<?php echo $rep['id_asegurado']; ?>"
            data-id-estado="<?php echo $rep['id_estado']; ?>">
            <span><?php echo $rep['aseguradora']; ?></span>
            <span><?php echo $rep['asegurado']; ?></span>
            <span><?php echo $rep['fecha']; ?></span>
            <span><?php echo $rep['estado']; ?></span>
            <span><?php echo $rep['descripcion']; ?></span>
            <?php if ($rep['imagen']): ?>
                <span><img src="<?php echo BASE_URL . $rep['imagen']; ?>" alt="Imagen" width="100"></span>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>



<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <button id="closeBtn">Cerrar</button>
        <!-- Formulario de actualización -->
        <form id="updateForm" action="index.php?controller=reparacion&action=update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="modalId">
            <input type="hidden" name="imagen" id="modalImagenPath">

            <label for="modalAseguradora">Aseguradora:</label>

            <select name="id_aseguradora" id="id_aseguradora" required>
                <option value="">Seleccione</option>
                <?php foreach ($aseguradoras as $aseg): ?>
                    <option value="<?php echo $aseg['id']; ?>"><?php echo $aseg['nombre']; ?></option>
                <?php endforeach; ?>
            </select>





          

            <label for="modalAsegurado">Asegurado:</label>
            <select name="id_asegurado" id="id_asegurado" required>
                <option value="">Seleccione</option>
                <?php foreach ($asegurados as $asegdo): ?>
                    <option value="<?php echo $asegdo['id']; ?>"><?php echo $asegdo['nombre']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="modalEstado">Estado:</label>
            <select name="id_estado" id="id_estado" required>
                <option value="">Seleccione</option>
                <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado['id']; ?>"><?php echo $estado['estado']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="modalFecha">Fecha:</label>
            <input type="date" name="fecha" id="modalFecha" required>

            <label for="modalDescripcion">Descripción:</label>
            <textarea name="descripcion" id="modalDescripcion" rows="4"></textarea>

            <label>Imagen actual:</label>
            <div id="currentImageContainer">
                <img id="currentImage" src="" alt="Imagen actual" style="max-width: 100%; display: none;">
            </div>

            <label for="modalImagen">Cambiar Imagen (opcional):</label>
            <input type="file" name="imagen" id="modalImagen" accept="image/*">

            <button type="submit">Actualizar</button>
        </form>

        <!-- Formulario de eliminación -->
        <form id="deleteForm" action="index.php?controller=reparacion&action=delete" method="POST">
            <input type="hidden" name="id" id="deleteId">
            <button type="submit">Eliminar</button>
        </form>
    </div>
</div>

<script src="script.js"></script>


<?php include "../app/views/templates/footer.php"; ?>