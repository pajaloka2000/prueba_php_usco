<?php

namespace Model;


class Estudiante extends ActiveRecord{
    protected static $tabla = 'estudiante';
    protected static $columnasDB = ['id', 'nombre', 'correo', 'programaAcademico_id'];

    public $id;
    public $nombre;
    public $correo;
    public $programaAcademico_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->programaAcademico_id = $args['programaAcademico_id'] ?? '';
    }

}



?>