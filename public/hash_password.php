<?php
$hashed_password = password_hash("123456", PASSWORD_DEFAULT);
echo "Nueva contraseña hasheada: " . $hashed_password;
?>
