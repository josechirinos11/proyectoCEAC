<?php include "../app/views/templates/header.php"; ?>

<section class="login-form">
    <h2>Iniciar Sesión</h2>
    <?php if(isset($error)) { echo "<p class='error'>{$error}</p>"; } ?>
    <div class="login">
    <form action="index.php?controller=auth&action=login" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" value="jose" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" value="$2y$10$F3T10UhFdMfhcTFzPQsz9eLI2vt98QvtL6.kP6xwvB3DabLj8oVcq" required>
        
        <button type="submit" class="btn">Entrar</button>
    </form>
    </div>
</section>

<?php include "../app/views/templates/footer.php"; ?>
