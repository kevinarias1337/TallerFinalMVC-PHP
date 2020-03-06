<?php require_once 'view/header.php'; ?>
<h2>Opción médico</h2>
<form name="form1" method="POST" action="./?accion=guardarDoctores">
    <p>Tipo documento: 
        <select name="seldocumento">
            <option value="">Seleccione...</option>
            <?php foreach($consultaDocumento as $datos): ?>
                <option value="<?php echo $datos['idtipodoc']; ?>"><?php echo $datos['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>Número documento: <input type="text" name="txtnumerodocumento"></p>
    <p>Nombre: <input type="text" name="txtnombredoctor"></p>
    <p><input type="submit" name="btnguardardoctor" value="Guardar doctores"></p>
    <h3>Médicos registrados</h3>
    <table>
    <thead>
        <tr>
            <th>Tipo documento</th>
            <th>Número documento</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($consultaDoctores as $dato): ?>
        <tr>
            <td><?php echo $dato['tipodoc']; ?></td>
            <td><?php echo $dato['numerodocumento']; ?></td>
            <td><?php echo $dato['nombre'];?></td>
            <td><a href="./?accion=modificarDoctores&id=<?php echo $dato['numerodocumento']; ?>">Modificar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    <br>
    <br>
    <a href="./">Volver</a> 
</form>
<?php require_once 'view/footer.php'; ?>