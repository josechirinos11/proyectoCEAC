<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soluciones Integrales</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/menu-mobile.css">
    <script src="<?php echo BASE_URL; ?>js/script.js" defer></script>
    <script src="<?php echo BASE_URL; ?>js/menu.js" defer></script>
</head>

<body>
    <!-- Menú de navegación -->
    <header class="header">
        <button class="menu-toggle" aria-label="Abrir menú">
            &#9776;
        </button>
        <nav class="nav">
            <div class="navLinks">
                <a href="index.php?controller=dashboard&action=home" class="navLink">
                    Inicio
                </a>
                <a href="index.php?controller=aseguradora&action=index" class="navLink">
                    Aseguradoras
                </a>
                <a href="index.php?controller=asegurado&action=index" class="navLink">
                    Asegurados
                </a>
                <a href="index.php?controller=reparacion&action=index" class="navLink">
                    Reparaciones
                </a>
                <a href="index.php?controller=auth&action=logout" class="navLink">
                    Cerrar Sesión
                </a>
            </div>
        </nav>
    </header>
    <div class="header-spacer"></div>