<?php 

namespace Controllers;

use Model\Cita;
use Model\Estudiante;
use Model\Medico;
use Model\Programa;
use Model\Especialidad;

class ApiController{
    public static function citas(){

        $citas = Cita::all();

        foreach($citas as $cita){
            $cita->estudiante = Estudiante::find($cita->estudiante_id);
            $cita->medico = Medico::find($cita->medico_id);
            $cita->especialidad = Especialidad::find($cita->medico->especialidad_id);
            $cita->programa = Programa::find($cita->estudiante->programaAcademico_id);
        }

        echo json_encode($citas);
        
    }

    public static function eliminarCita() {
        // Obtener el ID de la cita desde la solicitud
        $id = $_POST['id'] ?? null;

        echo $_POST;

        if ($id) {
            // Buscar la cita en la base de datos
            $cita = Cita::find($id);

            if ($cita) {
                // Eliminar la cita
                $cita->eliminar();

                // Responder con éxito
                echo json_encode(['success' => true]);
            }
        }
    }
    
}


?> 