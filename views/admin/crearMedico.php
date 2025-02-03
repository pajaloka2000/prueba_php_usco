<h2 class="headings"><?php echo $titulo;?></h2>

<div class="acciones">
    <a href="/admin/crear/cita" class="btn-enlace">Volver</a>
</div>
<div class="contenedor">

    <form method="post" class="formulario">
        <fieldset>
            <legend>Informacion del medico:</legend>

            <div class="formulario-campo">
                <label for="">Nombre: </label>
                <input type="text" name="nombre" id="nombre">
            </div>

            <div class="formulario-campo">
                <label for="">Especialidad: </label>
                <select name="especialidad_id" id="especialidad_id">
                    <option value="">-Selccionar</option>
                    <?php foreach($especialidades as $especialidad):?>
                        <option value="<?php echo $especialidad->id;?>"><?php echo $especialidad->nombre;?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <input type="submit" value="Crear Medico" class="btn-enviar">
            
        </fieldset>
        

    </form>

</div>