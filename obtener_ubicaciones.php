<?php
header('Content-Type: application/json');

// Configuración de la base de datos
$host = 'localhost';
$dbname = 'ubicaciones';
$user = 'postgres';
$password = 'Sendokai';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar los datos
    $stmt = $pdo->query("SELECT nombres, primer_apellido, segundo_apellido, edad, fecha_nacimiento FROM persona");

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convertir los resultados a JSON
    echo json_encode($result);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
