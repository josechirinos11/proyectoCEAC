<?php include "../app/views/templates/header.php"; ?>

<section class="login-form">
    <h2>Iniciar Sesión</h2>
    <?php if(isset($error)) { echo "<p class='error'>{$error}</p>"; } ?>
    <div class="login">
    <form action="index.php?controller=auth&action=login" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username"  required>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password"  required>
        
        <button type="submit" class="btn">Entrar</button>
    </form>
    </div>
</section>

<?php include "../app/views/templates/footer.php"; ?>
