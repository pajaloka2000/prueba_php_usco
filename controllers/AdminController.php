<?php 

namespace Controllers;

use Model\Estudiante;
use Model\Cita;
use Model\Medico;
use Model\Programa;
use Model\Especialidad;

use MVC\Router;

class AdminController{
    public static function index (Router $router){

        $router->render('/admin/index', [
            'titulo' => 'Panel de Admin'
        ]);
    }

    public static function crearCita (Router $router){
        $cita = new Cita;
        $estudiantes = Estudiante::all();
        $medicos = Medico::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Crear una nueva cita
            $cita->sincronizar($_POST);

            if($cita){
                $resultado = $cita->guardar();
                if($resultado){
                    header('Location: /admin');
                }
            }
        }

        $router->render('/admin/crearCita', [
            'titulo' => 'Crear cita',
            'estudiantes' => $estudiantes,
            'medicos' => $medicos
        ]);
    }

    public static function crearEstudiante (Router $router){

        $estudiante = new Estudiante;
        $programasAcademicos = Programa::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Crear un nuevo estudiante
            $estudiante->sincronizar($_POST);

            if($estudiante){
                $resultado = $estudiante->guardar();
                if($resultado){
                    header('Location: /admin/crear/cita');
                }
            }
        }

        $router->render('/admin/crearEstudiante', [
            'titulo' => 'Crear estudiante',
            'programasAcademicos' => $programasAcademicos
        ]);
    }

    public static function crearMedico(Router $router){
        $medico = new Medico;
        $especialidades = Especialidad::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Crear un nuevo medico
            $medico->sincronizar($_POST);

            if($medico){
                $resultado = $medico->guardar();
                if($resultado){
                    header('Location: /admin/crear/cita');
                }
            }
        }

        $router->render('/admin/crearMedico', [
            'titulo' => 'Crear medico',
            'especialidades' => $especialidades
        ]);
    }
}


?> 