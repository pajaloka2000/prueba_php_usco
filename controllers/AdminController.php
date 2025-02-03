<?php 

namespace Controllers;

use Model\Estudiante;
use Model\Cita;
use Model\Medico;

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
}


?> 