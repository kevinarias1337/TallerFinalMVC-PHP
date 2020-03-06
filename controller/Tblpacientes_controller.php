<?php
require_once 'model/Tblpacientes_model.php';
require_once 'model/Tbltipodocumento_model.php';
require_once 'model/Tblgenero_model.php';
    class Tblpacientes_controller{
        private $model_pacientes;
        private $model_documento;
        private $model_genero;

        public function __construct(){
            $this->model_pacientes = new Tblpacientes_model();
            $this->model_documento = new Tbltipodocumento_model();
            $this->model_genero = new Tblgenero_model();
        }

        public function menuPacientes(){
            $consultaDocumento = $this->model_documento->consultarDocumento();
            $consultaGenero = $this->model_genero->consultarGenero();
            require_once 'view/menuPacientes.php';
        }

        public function verPacientes(){
            $consultaPacientes=$this->model_pacientes->consultarPacientes();
            require_once 'view/verPacientes.php';
        }

        public function guardarPacientes(){
            $dato['nombre']=$_POST["txtnombrepaciente"];
            $dato['apellido']=$_POST["txtapellidopaciente"];
            $dato['tipodoc']=$_POST["seldocumento"];
            $dato['numerodocumento']=$_POST["txtnumerodocumento"];
            $dato['genero']=$_POST["selgenero"];
            $dato['edad']=$_POST["txtedad"];
            $this->model_pacientes->insertarPacientes($dato);
            $this->menuPacientes();
        }

        public function modificarPacientes(){
            $id = $_REQUEST['id'];
            $consultaDocumento = $this->model_documento->consultarDocumento();
            $consultaGenero = $this->model_genero->consultarGenero();
            $consultaPacientes = $this->model_pacientes->consultarPacientePorId($id);
            require_once 'view/tblpacientes_modificar.php';
        }

        public function guardarCambiosPacientes(){
            $dato['nombre']=$_POST["txtnombrepaciente"];
            $dato['apellido']=$_POST["txtapellidopaciente"];
            $dato['tipodoc']=$_POST["seldocumento"];
            $dato['genero']=$_POST["selgenero"];
            $dato['edad']=$_POST["txtedad"];
            $dato['numerodocumento']=$_POST["txtnumerodocumento"];
            $this->model_pacientes->actualizarPacientes($dato);
            $this->menuPacientes();
        }
    }
?>