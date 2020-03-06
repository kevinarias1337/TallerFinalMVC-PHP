<?php require_once 'view/header.php'; ?>
<h2>Modificar médico</h2>
<form name="form1" method="POST" action="./?accion=guardarCambiosDoctores">
    <p>Tipo documento: 
        <select name="seldocumento">
            <option value="">Seleccione...</option>
            <?php foreach($consultaDocumento as $datos): ?>
                <option value="<?php echo $datos['idtipodoc']; ?>"><?php echo $datos['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <?php foreach($consultaDoctores as $datosDoc): ?>
    <p>Número documento: <input type="text" name="txtnumerodocumento" value="<?php echo $datosDoc['numerodocumento'] ?>"></p>
    <p>Nombre: <input type="text" name="txtnombredoctor" value="<?php echo $datosDoc['nombre'] ?>"></p>
    <p><input type="submit" name="btnguardardoctor" value="Guardar doctores"></p>
    <?php endforeach; ?>
    <br>
    <br>
    <a href="./?accion=menuDoctores">Volver</a> 
</form>
<?php require_once 'view/footer.php'; ?>