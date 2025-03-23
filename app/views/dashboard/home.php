<?php include "../app/views/templates/header.php"; ?>
<div class="page">
<div class="content">
    <main class="main">
        <h1 class="title">Bienvenido al Dashboard</h1>
        <p>Listado de usuarios creados.</p>

        <!-- Contenedor con los cards -->
<div class="cards-container">

    <?php foreach ($usuarios as $usuario): ?>
        <div class="cardUsuario" data-id="<?php echo $usuario['id']; ?>">
            <span><?php echo $usuario['username']; ?></span>
          
        </div>
    <?php endforeach; ?>
</div>

<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <!-- Formulario de actualización -->
       

        <!-- Formulario de eliminación (SEPARADO) -->
       
        <form id="deleteForm" onsubmit="deleteUsuario(event)">
            <input type="hidden" name="id" id="deleteId">
            <button type="submit" >Eliminar</button>
            
       
        </form>

        <form id="deleteForm" >
           
        <button type="button" id="closeBtn">Cancelar</button>
        </form>



    </div>
</div>




    </main>
</div>
</div>

<script src="script.js"></script>

<?php include "../app/views/templates/footer.php"; ?>