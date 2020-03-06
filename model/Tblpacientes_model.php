<?php
    class Tblpacientes_model{
        private $bd;
        private $tblpacientes;

        public function __construct(){
            $this->bd=Conexion::getConexion();
            $this->tblpacientes=array();
        }

        public function consultarPacientes(){
            $consultaPacientes=$this->bd->query("SELECT * FROM tblpacientes ORDER BY nombre");
            while($fila=$consultaPacientes->fetch_assoc()){
                $this->tblpacientes[]=$fila;
            }
            return $this->tblpacientes;
        }

        public function insertarPacientes($dato){
            $nombre=$dato['nombre'];
            $apellido=$dato['apellido'];
            $tipodoc=$dato['tipodoc'];
            $numerodocumento=$dato['numerodocumento'];
            $genero=$dato['genero'];
            $edad=$dato['edad'];
            $consultaPacientes = "INSERT INTO tblpacientes (numerodocumento, tipodoc, nombre, apellido, genero, edad) VALUES ($numerodocumento, $tipodoc, '$nombre', '$apellido', $genero, $edad)";
            mysqli_query($this->bd, $consultaPacientes) or die ("Error al insertar los datos");
        }

        public function actualizarPacientes($dato){
            $nombre=$dato['nombre'];
            $apellido=$dato['apellido'];
            $genero=$dato['genero'];
            $edad=$dato['edad'];
            $tipodoc=$dato['tipodoc'];
            $numerodocumento=$dato['numerodocumento'];
            $consultaPacientes = "UPDATE tblpacientes SET numerodocumento=$numerodocumento, tipodoc=$tipodoc, nombre='$nombre', apellido='$apellido', genero=$genero, edad=$edad WHERE numerodocumento = $numerodocumento";
            mysqli_query($this->bd, $consultaPacientes) or die ("Error al actualizar los cambios del paciente.");
        }

        public function consultarPacientePorId($numerodocumento){
            $consultaPacientes = $this->bd->query("SELECT * FROM tblpacientes WHERE numerodocumento = " . $numerodocumento);
            $fila = $consultaPacientes->fetch_assoc();
            $this->tblpacientes[] = $fila;
            return $this->tblpacientes;
        }
    }


?>