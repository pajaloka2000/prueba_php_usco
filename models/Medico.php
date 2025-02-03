<?php

namespace Model;


class Medico extends ActiveRecord{
    protected static $tabla = 'medico';
    protected static $columnasDB = ['id', 'nombre', 'especialidad_id'];

    public $id;
    public $nombre;
    public $especialidad_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->especialidad_id = $args['especialidad_id'] ?? '';
    }

}



?>