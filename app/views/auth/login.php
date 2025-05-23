<?php
if (isset($_SESSION['usuario_verificado']) && $_SESSION['usuario_verificado'] == true) {
    include "../app/views/templates/header.php";
} else {
    include "../app/views/templates/headerVerificado.php";
}
?>




<div class="page">
  <nav class="nav">
    <div class="navLinks">
      <a href="index.php?controller=auth&action=register" class="navLink">Registro</a>
      <span class="navActive">Login</span>
    </div>
  </nav>
  <div class="content">
    <main class="main">
    <?php if (isset($error)) {
            echo "<p class='error'>{$error}</p>";
        } ?>
      <h1 class="title">Iniciar Sesión</h1>
      
      <form id="loginForm" class="form" action="index.php?controller=auth&action=login" method="POST">
        <div class="inputGroup">
          <label for="email">Correo Electrónico:</label>
          <input type="text" name="username" id="username" required>
        </div>
        <div class="inputGroup">
          <label for="password">Contraseña:</label>
          <input type="password" name="password" id="password" required>
        </div>
        
        <button type="submit" class="button">Login</button>
      </form>
      <p class="link">
        ¿No tienes cuenta?
        <a href="index.php?controller=auth&action=register" class="registerLink">Regístrate aquí</a>
      </p>
    </main>
  </div>
</div>



<?php include "../app/views/templates/footer.php"; ?>