<?php
require_once __DIR__ . '/../Repositorio/CatedraticoRepositorio.php';

class CatedraticoServicio {
    private $repo;

    public function __construct($conexion) {
        $this->repo = new CatedraticoRepositorio($conexion);
    }

    // 🔹 Obtener todos los catedráticos
    public function obtenerTodos() {
        return $this->repo->obtenerTodos();
    }

    // 🔹 Insertar uno o varios catedráticos
    public function insertar($data) {
        $catedraticos = isset($data[0]) ? $data : [$data];
        foreach ($catedraticos as $cat) {
            if (!isset($cat['nombre'], $cat['especialidad'], $cat['correo'])) {
                return false;
            }
            $this->repo->insertar($cat);
        }
        return true;
    }

    // 🔹 Actualizar catedrático
    public function actualizar($cat) {
        if (!isset($cat['id'], $cat['nombre'], $cat['especialidad'], $cat['correo'])) {
            return false;
        }
        return $this->repo->actualizar($cat);
    }

    // 🔹 Eliminar catedrático
    public function eliminar($id) {
        return $this->repo->eliminar($id);
    }
}
