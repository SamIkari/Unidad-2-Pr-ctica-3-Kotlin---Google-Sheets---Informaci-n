<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json'); // Asegura que la respuesta sea JSON

// Configuración de la base de datos
$host = 'localhost';
$dbname = 'ubicaciones';
$user = 'postgres';
$password = 'Sendokai';

try {
    // Conexión a la base de datos
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Captura de datos enviados desde la app
    $nombres = $_POST['nombres'] ?? null;
    $primer_apellido = $_POST['primer_ap'] ?? null;
    $segundo_apellido = $_POST['segundo_ap'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $fecha_nacimiento = $_POST['fecha_nac'] ?? null;

    // Validación de datos
    if (!$nombres || !$primer_apellido || !$segundo_apellido || !$edad || !$fecha_nacimiento) {
        echo json_encode(["error" => "Todos los campos son obligatorios."]);
        exit;
    }

    // Inserción en la base de datos
    $sql = "INSERT INTO persona 
            (nombres, primer_apellido, segundo_apellido, edad, fecha_nacimiento) 
            VALUES 
            (:nombres, :primer_apellido, :segundo_apellido, :edad, :fecha_nacimiento)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombres' => $nombres,
        ':primer_apellido' => $primer_apellido,
        ':segundo_apellido' => $segundo_apellido,
        ':edad' => $edad,
        ':fecha_nacimiento' => $fecha_nacimiento
    ]);

    echo json_encode(["success" => "Datos guardados correctamente."]);

} catch (PDOException $e) {
    echo json_encode(["error" => "Error al guardar los datos: " . $e->getMessage()]);
}
