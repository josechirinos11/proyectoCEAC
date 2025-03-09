<?php
// Configuración de la base de datos con variables de entorno
$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'soluciones_integrales';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '01200300'; // Tu contraseña local
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (Exception $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

// Opcional: Devuelve el objeto PDO para usarlo en otros archivos
return $pdo;