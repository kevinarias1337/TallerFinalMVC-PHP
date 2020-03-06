<?php require_once 'view/header.php'; ?>
<h2>Historial médico</h2>
<?php foreach($consultaHistorial as $datos): ?>
    <p>Historial médico de <?php echo $datos['pnombre'] . " " . $datos['apellido'] . " por el médico " . $datos['mnombre'];?></p>
<?php endforeach; ?>
<table>
    <thead>
        <tr>
            <th>Observaciones</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($consultaHistorial as $dato): ?>
        <tr>
            <td><?php echo $dato['observacion']; ?></td>
            <td><?php echo $dato['fecha']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="./?accion=menuHistorial">Menú historial médico</a>
<br>
<a href="./">Menú principal</a>
<?php require_once 'view/footer.php'; ?>