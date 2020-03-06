<?php
    class Tbltipodocumento_model{
        private $bd;
        private $tbltipodocumento;

        public function __construct(){
            $this->bd=Conexion::getConexion();
            $this->tbltipodocumento=array();
        }

        public function consultarDocumento(){
            $consultaDocumento=$this->bd->query("SELECT * FROM tbltipodocumento");
            while($fila=$consultaDocumento->fetch_assoc()){
                $this->tbltipodocumento[]=$fila;
            }
            return $this->tbltipodocumento;
        }
        
        public function consultarDocumentoPorId($id){
            $consultaDocumento = $this->bd->query("SELECT * FROM tbltipodocumento WHERE idtipodoc = " . $id);
            $fila = $consultaDocumento->fetch_assoc();
            $this->tbltipodocumento[] = $fila;
            return $this->tbltipodocumento;
        }
    }

?>