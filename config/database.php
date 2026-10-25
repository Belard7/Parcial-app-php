<?php
// Si estamos en Render, leerá las variables de entorno del sistema. 
// Si estamos local, podemos usar $_ENV o valores por defecto.
$host = getenv('DB_HOST') ?: 'localhost';
$port = getenv('DB_PORT') ?: '3306';
$db   = getenv('DB_NAME') ?: 'parcial_db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (\PDOException $e) {
    // En producción es mejor no mostrar el error exacto de conexión por seguridad
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}