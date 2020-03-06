<?php
require_once 'model/Tbldoctores_model.php';
require_once 'model/Tbltipodocumento_model.php';
    class Tbldoctores_controller{
        private $model_doctores;
        private $model_documento;
    

    public function __construct(){
        $this->model_doctores = new Tbldoctores_model();
        $this->model_documento = new Tbltipodocumento_model();
    }

    public function menuDoctores(){
        $consultaDoctores = $this->model_doctores->consultarDoctores();
        $consultaDocumento = $this->model_documento->consultarDocumento();
        require_once 'view/menuDoctores.php';
    }

    public function guardarDoctores(){
        $dato['nombre']=$_POST["txtnombredoctor"];
        $dato['tipodoc']=$_POST["seldocumento"];
        $dato['numerodocumento']=$_POST["txtnumerodocumento"];
        $this->model_doctores->insertarDoctores($dato);
        $this->menuDoctores();
    }

    public function modificarDoctores(){
        $id = $_REQUEST['id'];
        $consultaDocumento = $this->model_documento->consultarDocumento();
        $consultaDoctores = $this->model_doctores->consultarDoctorPorId($id);
        require_once 'view/tbldoctores_modificar.php';
    }

    public function guardarCambiosDoctores(){
        $dato['nombre']=$_POST["txtnombredoctor"];
        $dato['tipodoc']=$_POST["seldocumento"];
        $dato['numerodocumento']=$_POST["txtnumerodocumento"];
        $this->model_doctores->actualizarDoctores($dato);
        $this->menuDoctores();
    }
}
?>