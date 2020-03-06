<?php
    class Tblgenero_model{
        private $bd;
        private $tblgenero;

        public function __construct(){
            $this->bd=Conexion::getConexion();
            $this->tblgenero=array();
        }

        public function consultarGenero(){
            $consultaGenero=$this->bd->query("SELECT * FROM tblgenero");
            while($fila=$consultaGenero->fetch_assoc()){
                $this->tblgenero[]=$fila;
            }
            return $this->tblgenero;
        }
    }
?>