<?php
// includes/config.php
$host = 'localhost';
$db   = 'tienda_marketing';
$user = 'root'; // Usuario por defecto en XAMPP
$pass = '';     // Contraseña por defecto en XAMPP (vacía)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Reportar errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Datos como arreglos
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Seguridad extra
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Si hay error, mostrar un mensaje profesional
    die("Error técnico: No se pudo conectar con la base de datos.");
}
?>