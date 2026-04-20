<?php
// comprar.php
require_once 'includes/config.php'; // Conexión a la BD
header('Content-Type: application/json');

// Leer los datos enviados por el JavaScript
$json = file_get_contents('php://input');
$datos = json_decode($json, true);

if (!$datos) {
    echo json_encode(['success' => false, 'message' => 'No se recibieron datos']);
    exit;
}

try {
    // Insertar el pedido en la base de datos
    $sql = "INSERT INTO pedidos (producto_id, nombre_cliente, email_cliente) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $datos['id'],
        $datos['nombre'],
        $datos['email']
    ]);

    echo json_encode([
        'success' => true, 
        'message' => '¡Pago procesado con éxito! Gracias por su compra.'
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'success' => false, 
        'message' => 'Error en el servidor: ' . $e->getMessage()
    ]);
}
?>