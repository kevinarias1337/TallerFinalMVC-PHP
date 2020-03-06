<?php require_once 'view/header.php'; ?>
<h2>Opción pacientes</h2>
<form name="form1" method="POST" action="./?accion=guardarPacientes">
    <p>Nombre: <input type="text" name="txtnombrepaciente"></p>
    <p>Apellido: <input type="text" name="txtapellidopaciente"></p>
    <p>Tipo documento: 
        <select name="seldocumento">
            <option value="">Seleccione...</option>
            <?php foreach($consultaDocumento as $datos): ?>
                <option value="<?php echo $datos['idtipodoc']; ?>"><?php echo $datos['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>Número documento: <input type="text" name="txtnumerodocumento"></p>
    <p>Genero: 
        <select name="selgenero">
            <option value="">Seleccione...</option>
            <?php foreach($consultaGenero as $datos): ?>
                <option value="<?php echo $datos['idgenero']; ?>"><?php echo $datos['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>Edad: <input type="text" name="txtedad"></p>
    <p><input type="submit" name="btnguardarpaciente" value="Guardar pacientes"></p>

    <a href="./?accion=verPacientes">Consultar pacientes</a>
    <br>
    <br>
    <a href="./">Volver</a> 
</form>
<?php require_once 'view/footer.php'; ?>
