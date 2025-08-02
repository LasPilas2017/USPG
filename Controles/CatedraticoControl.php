<?php
require_once __DIR__ . '/../Servicios/CatedraticoServicio.php';

class CatedraticoControl {
    private $servicio;

    public function __construct($conexion) {
        $this->servicio = new CatedraticoServicio($conexion);
    }

    public function manejar($method, $data) {
        switch ($method) {
            case 'GET':
                return $this->servicio->obtenerTodos();
            case 'POST':
                return ["success" => $this->servicio->insertar($data)];
            case 'PUT':
                return ["success" => $this->servicio->actualizar($data)];
            case 'DELETE':
                return isset($_GET['id']) ? ["success" => $this->servicio->eliminar($_GET['id'])] : ["error" => "ID no proporcionado"];
            default:
                return ["error" => "Método no soportado"];
        }
    }
}
