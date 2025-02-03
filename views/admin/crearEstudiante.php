<h2 class="headings"><?php echo $titulo;?></h2>

<div class="acciones">
    <a href="/admin/crear/cita" class="btn-enlace">Volver</a>
</div>


<div class="contenedor">

    <form method="post" class="formulario">
        <fieldset>
            <legend>Informacion del estudiante:</legend>

            <div class="formulario-campo">
                <label for="">Nombre: </label>
                <input type="text" name="nombre" id="nombre">
            </div>

            <div class="formulario-campo">
                <label for="">Correo: </label>
                <input type="text" name="correo" id="correo">
            </div>

            <div class="formulario-campo">
                <label for="">Programa academico: </label>
                <select name="programaAcademico_id" id="programaAcademico_id">
                    <option value="">-Selccionar</option>
                    <?php foreach($programasAcademicos as $programasAcademico):?>
                        <option value="<?php echo $programasAcademico->id;?>"><?php echo $programasAcademico->nombre;?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <input type="submit" value="Crear Estudiante" class="btn-enviar">
            
        </fieldset>
        

    </form>

</div>