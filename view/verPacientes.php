<?php require_once 'view/header.php'; ?>
<h2>Opción ver pacientes.</h2>
<table>
    <thead>
        <tr>
            <th>Tipo documento</th>
            <th>Número documento</th>
            <th>Nombre completo</th>
            <th>Género</th>
            <th>Edad</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($consultaPacientes as $dato): ?>
        <tr>
            <td><?php echo $dato['tipodoc']; ?></td>
            <td><?php echo $dato['numerodocumento']; ?></td>
            <td><?php echo $dato['nombre'] . " " . $dato['apellido']; ?></td>
            <td><?php echo $dato['genero']; ?></td>
            <td><?php echo $dato['edad']; ?></td>
            <td><a href="./?accion=modificarPacientes&id=<?php echo $dato['numerodocumento']; ?>">Modificar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<br>
<a href="./?accion=menuPacientes">Registrar paciente</a>
<br>
<br>
<a href="./">Menú principal</a>


<?php require_once 'view/footer.php'; ?>