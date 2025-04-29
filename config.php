<?php

// Configuración de base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'ramiro_espana');
define('DB_PASS', 'AbcdeUdeC');
define('DB_NAME', 'act1_devweb');

// Conexión a la base de datos con PDO
try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Autoload para cargar clases automáticamente
function autoload($className) {
    $file = __DIR__ . '/Controllers/' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('autoload');
?>
