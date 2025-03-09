<?php
$hash_en_bd = '$2y$10$F3T10UhFdMfhcTFzPQsz9eLI2vt98QvtL6.kP6xwvB3DabLj8oVcq'; // El hash de tu BD
$password_ingresado = "123456";

if (password_verify($password_ingresado, $hash_en_bd)) {
    echo "✅ La contraseña es correcta.";
} else {
    echo "❌ La contraseña es INCORRECTA.";
}
?>
