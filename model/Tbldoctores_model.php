<?php
    class Tbldoctores_model{
        private $bd;
        private $tbldoctores;

        public function __construct(){
            $this->bd=Conexion::getConexion();
            $this->tbldoctores=array();
        }

        public function consultarDoctores(){
            $consultaDoctores=$this->bd->query("SELECT * FROM tblmedicos ORDER BY nombre");
            while($fila=$consultaDoctores->fetch_assoc()){
                $this->tbldoctores[]=$fila;
            }
            return $this->tbldoctores;
        }

        public function insertarDoctores($dato){
            $nombre=$dato['nombre'];
            $tipodoc=$dato['tipodoc'];
            $numerodocumento=$dato['numerodocumento'];
            $consultaDoctores = "INSERT INTO tblmedicos (numerodocumento, tipodoc, nombre) VALUES ($numerodocumento, $tipodoc, '$nombre')";
            mysqli_query($this->bd, $consultaDoctores) or die ("Error al insertar los datos");
        }

        public function actualizarDoctores($dato){
            $nombre=$dato['nombre'];
            $tipodoc=$dato['tipodoc'];
            $numerodocumento=$dato['numerodocumento'];
            $consultaDoctores = "UPDATE tblmedicos SET numerodocumento=$numerodocumento,tipodoc=$tipodoc, nombre='$nombre' WHERE numerodocumento = $numerodocumento";
            mysqli_query($this->bd, $consultaDoctores) or die ("Error al actualizar los cambios del doctor.");
        }

        public function consultarDoctorPorId($numerodocumento){
            $consultaDoctores = $this->bd->query("SELECT * FROM tblmedicos WHERE numerodocumento = " . $numerodocumento);
            $fila = $consultaDoctores->fetch_assoc();
            $this->tbldoctores[] = $fila;
            return $this->tbldoctores;
        }
    }
?>