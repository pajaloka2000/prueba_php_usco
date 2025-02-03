<h2 class="headings"><?php echo $titulo;?></h2>

<div class="acciones">
    <a href="/admin" class="btn-enlace">Volver</a>
    <a href="/admin/crear/estudiante" class="btn-enlace">Crear Estudiante</a>
    <a href="/admin/crear/medico" class="btn-enlace">Crear Medico</a>
</div>



<div class="contenedor">

    <form method="post" class="formulario">
        <fieldset>
            <legend>Informacion de la cita:</legend>

            <div class="formulario-campo">
                <label for="">Estudiante: </label>
                <select name="estudiante_id" id="estudiante_id">
                    <option value="">-Selccionar</option>
                    <?php foreach($estudiantes as $estudiante):?>
                        <option value="<?php echo $estudiante->id;?>"><?php echo $estudiante->nombre;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="formulario-campo">
                <label for="">medico: </label>
                <select name="medico_id" id="medico_id">
                    <option value="">-Selccionar</option>
                    <?php foreach($medicos as $medico):?>
                        <option value="<?php echo $medico->id;?>"><?php echo $medico->nombre;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="formulario-campo">
                <label for="">Fecha: </label>
                <input type="date" name="fecha" id="fecha">
            </div>
            <div class="formulario-campo">
                <label for="">Hora: </label>
                <input type="time" name="hora" id="hora">
            </div>
            
            <div class="formulario-campo">
                <label for="">Estado: </label>
                <select name="estado" id="">
                    <option value="">-Selccionar</option>
                    <option value="1">Pendiente</option>
                    <option value="2">Atendida</option>
                    <option value="3">Cancelada</option>
                </select>
            </div>

            <input type="submit" value="Crear Cita" class="btn-enviar">
            
        </fieldset>
        

    </form>

</div>