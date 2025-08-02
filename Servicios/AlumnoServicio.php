<?php
require_once __DIR__ . '/../Repositorio/AlumnoRepositorio.php';

class AlumnoServicio {
    private $repo;

    public function __construct($conexion) {
        $this->repo = new AlumnoRepositorio($conexion);
    }

    // 🔹 Obtener todos los alumnos
    public function obtenerTodos() {
        return $this->repo->obtenerTodos();
    }

    // 🔹 Insertar uno o varios alumnos
    public function insertar($data) {
        $alumnos = isset($data[0]) ? $data : [$data];
        foreach ($alumnos as $alumno) {
            if (!isset($alumno['nombre'], $alumno['carnet'], $alumno['carrera'], $alumno['fecha_ingreso'])) {
                return false;
            }
            $this->repo->insertar($alumno);
        }
        return true;
    }

    // 🔹 Actualizar alumno
    public function actualizar($alumno) {
        if (!isset($alumno['id'], $alumno['nombre'], $alumno['carnet'], $alumno['carrera'], $alumno['fecha_ingreso'])) {
            return false;
        }
        return $this->repo->actualizar($alumno);
    }

    // 🔹 Eliminar alumno
    public function eliminar($id) {
        return $this->repo->eliminar($id);
    }
}
