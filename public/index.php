<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\MedicoController;
use Controllers\AdminController;
use Controllers\ApiController;
$router = new Router();

//Area admin
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/crear/cita', [AdminController::class, 'crearCita']);
$router->post('/admin/crear/cita', [AdminController::class, 'crearCita']);
$router->get('/admin/crear/estudiante', [AdminController::class, 'crearEstudiante']);
$router->post('/admin/crear/estudiante', [AdminController::class, 'crearEstudiante']);
$router->get('/admin/crear/medico', [AdminController::class, 'crearMedico']);
$router->post('/admin/crear/medico', [AdminController::class, 'crearMedico']);



//Area de medicos
$router->get('/medico', [MedicoController::class, 'index']);

//API
$router->get('/api/citas', [ApiController::class, 'citas']);
$router->post('/api/citas/eliminar', [ApiController::class, 'eliminarCita']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();