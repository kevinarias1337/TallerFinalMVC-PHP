<?php
require_once 'model/Tblhistorial_model.php';
require_once 'model/Tblpacientes_model.php';
require_once 'model/Tbldoctores_model.php';
require_once 'model/Tbltipodocumento_model.php';

    class Tblhistorial_controller{
        private $model_historial;
        private $model_pacientes;
        private $model_doctores;
        private $model_documento;
        private $model_consultaph;

        public function __construct(){
            $this->model_historial = new Tblhistorial_model();
            $this->model_pacientes = new Tblpacientes_model();
            $this->model_doctores = new Tbldoctores_model();
            $this->model_documento = new Tbltipodocumento_model();
        }

        public function menuHistorial(){
            $consultaHistorial = $this->model_historial->consultarHistorial();
            $consultaPacientes = $this->model_pacientes->consultarPacientes();
            $consultaDoctores = $this->model_doctores->consultarDoctores();
            $consultaDocumento = $this->model_documento->consultarDocumento();
            require_once 'view/menuHistorial.php';
        }

        public function guardarHistorial(){
            $dato['paciente']=$_POST["selpaciente"];
            $dato['medico']=$_POST["seldoctor"];
            $dato['observacion']=$_POST["txtobservaciones"];
            $dato['fecha']=$_POST["txtfecha"];
            $this->model_historial->insertarHistorial($dato);
            $this->menuHistorial();
        }

        public function eliminarHistorial(){
            $id=$_REQUEST['id'];
            $this->model_historial->descartarHistorial($id);
            $this->menuHistorial();
            
        }

        public function verHistorial(){
            $consultaHistorial=$this->model_historial->consultarHistorial();
            $consultaDoctores = $this->model_doctores->consultarDoctores();
            require_once 'view/verHistorial.php';
        }
    }
    
?>