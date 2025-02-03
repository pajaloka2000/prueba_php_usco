<?php 

namespace Controllers;

use Model\Estudiante;

use MVC\Router;

class MedicoController{
    public static function index (Router $router){
        $estudiantes = Estudiante::all();

        $router->render('/medico/index', [
            'titulo' => 'Panel de Medico',
            'estudiantes' => $estudiantes
        ]);
    }
}


?> 
