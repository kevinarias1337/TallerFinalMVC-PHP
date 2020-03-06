<?php require_once 'view/header.php'; ?>
<h2>Modificar paciente</h2>
<form name="form1" method="POST" action="./?accion=guardarCambiosPacientes">
    <p>Tipo documento: 
        <select name="seldocumento">
            <option value="">Seleccione...</option>
            <?php foreach($consultaDocumento as $datos): ?>
                <option value="<?php echo $datos['idtipodoc']; ?>"><?php echo $datos['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>Género: 
        <select name="selgenero">
            <option value="">Seleccione...</option>
            <?php foreach($consultaGenero as $datosGen): ?>
                <option value="<?php echo $datosGen['idgenero']; ?>"><?php echo $datosGen['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <?php foreach($consultaPacientes as $dato): ?>
    <p>Número documento: <input type="text" name="txtnumerodocumento" value="<?php echo $dato['numerodocumento'];?>"></p>
    <p>Nombre: <input type="text" name="txtnombrepaciente" value="<?php echo $dato['nombre'];?>"></p>
    <p>Apellido: <input type="text" name="txtapellidopaciente" value="<?php echo $dato['apellido'];?>"></p>
    <p>Edad: <input type="text" name="txtedad" value="<?php echo $dato['edad'];?>"></p>
    <p><input type="submit" name="btnguardarpaciente" value="Guardar paciente"></p>
    <?php endforeach; ?>       
    <br>
    <br>
    <br>
    <a href="./?accion=menuPacientes">Volver</a> 
</form>
<?php require_once 'view/footer.php'; ?>