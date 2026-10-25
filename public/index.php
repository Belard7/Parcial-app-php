<?php
require_once __DIR__ . '/../config/database.php';

$mensaje = "";
try {
    // Prueba rápida de conexión consultando la versión de la BD o listando registros
    $stmt = $pdo->query("SELECT VERSION() as version");
    $row = $stmt->fetch();
    $mensaje = "Conexión exitosa a la Base de datos en la nube. Versión MySQL: " . $row['version'];
} catch (Exception $e) {
    $mensaje = "Error de conexión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parcial - Aplicación PHP CRUD</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; color: #333; }
        .container { max-width: 600px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #007bff; }
        .alert { padding: 10px; background: #e2f0cb; border-left: 5px solid #55a630; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Evaluación Parcial - PaaS (Aplicación PHP)</h1>
        <p>Módulo CRUD implementado correctamente con Stack Clásico.</p>
        <div class="alert">
            <strong>Estado:</strong> <?php echo $mensaje; ?>
        </div>
    </div>
</body>
</html>