<?php
class Tblhistorial_model{
    private $bd;
    private $tblhistorial;

    public function __construct(){
        $this->bd=Conexion::getConexion();
        $this->tblhistorial=array();
    }

    public function consultarHistorial(){
        $consultaHistorial=$this->bd->query("SELECT p.numerodocumento, p.tipodoc, p.nombre AS pnombre, p.apellido, h.idhistoria, h.observacion, h.fecha, m.nombre AS mnombre FROM tblpacientes p INNER JOIN tblhistorial h ON p.numerodocumento = paciente INNER JOIN tblmedicos m ON m.numerodocumento = medico");
        while($fila=$consultaHistorial->fetch_assoc()){
            $this->tblhistorial[]=$fila;
        }
        return $this->tblhistorial;
    }

    public function insertarHistorial($dato){
        $paciente=$dato['paciente'];
        $medico=$dato['medico'];
        $observacion=$dato['observacion'];
        $fecha=$dato['fecha'];
        $consultaHistorial = "INSERT INTO tblhistorial (paciente, medico, observacion, fecha) VALUES ($paciente, $medico, '$observacion', '$fecha')";
        mysqli_query($this->bd, $consultaHistorial) or die ("Error al insertar los datos");
    }

    public function descartarHistorial($id){
        $consulta="DELETE FROM tblhistorial WHERE idhistoria=$id";
        mysqli_query($this->bd, $consulta) or die ("Error al eliminar los datos");
    }
}

?>