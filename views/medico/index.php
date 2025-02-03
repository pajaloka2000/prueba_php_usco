<h1><?php echo $titulo ;?></h1>

<a href="/admin/crear" class="btn btn-primary">Crear Cita</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Programa</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($estudiantes as $estudiante): ?>
            <tr>
                <td><?php echo $estudiante->id; ?></td>
                <td><?php echo $estudiante->nombre; ?></td>
                <td><?php echo $estudiante->correo; ?></td>
                <td><?php echo $estudiante->programa_id; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>