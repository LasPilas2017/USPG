<?php
// Encabezados CORS
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

// Cargar dependencias
require_once __DIR__ . '/config/conexion.php';
require_once __DIR__ . '/Controles/AlumnoControl.php';
require_once __DIR__ . '/Controles/CatedraticoControl.php';

$conexion = getConexion();
$method = $_SERVER['REQUEST_METHOD'];
$tipo = $_GET['tipo'] ?? '';
$data = json_decode(file_get_contents("php://input"), true);

// Aquí los nombres deben coincidir con tus clases reales
if ($tipo === 'alumno') {
    $controller = new AlumnoControl($conexion);
    $resultado = $controller->manejar($method, $data);
    echo json_encode($resultado);
} elseif ($tipo === 'catedratico') {
    $controller = new CatedraticoControl($conexion);
    $resultado = $controller->manejar($method, $data);
    echo json_encode($resultado);
} else {
    echo json_encode(["error" => "Parámetro 'tipo' no válido"]);
}
