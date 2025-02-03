<?php

namespace Model;


class Cita extends ActiveRecord{
    protected static $tabla = 'cita';
    protected static $columnasDB = ['id', 'estudiante_id', 'medico_id', 'fecha', 'hora', 'estado'];

    public $id;
    public $estudiante_id;
    public $medico_id;
    public $fecha;
    public $hora;
    public $estado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->estudiante_id = $args['estudiante_id'] ?? '';
        $this->medico_id = $args['medico_id'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->estado = $args['estado'] ?? '';
    }
}