<?php
class Ticket extends Controller{
    public function __construct(){
        session_start();
        parent::__construct();
    }
    public function index(){
        if(empty($_SESSION['activo'])){
            header("location: ".base_url);
        }
        $data['ticket']=$this->model->getTicket();
        $this->views->getView($this, "index", $data);
    }

    public function registrar(){
        $unidad = $_POST['unidad'];
        $placa = $_POST['placa'];
        $chasis = $_POST['chasis'];
        $marca = $_POST['marca'];
        $fecha = $_POST['fecha'];
        $habilitacion = $_POST['habilitacion'];
        $idsocio = $_POST['idsocio'];
        $id = $_POST['idvehiculo'];
       
        if(empty($unidad) || empty($placa) || empty($chasis) || empty($marca) || empty($fecha) || empty($habilitacion)){
            $msg= "Todos los campos son obligatorios";
      
        }else{
            if($id==""){
               $data= $this->model->registrarVehiculos($unidad,$placa, $chasis,$marca, $fecha, $habilitacion,$idsocio);
                if($data == "ok"){
                  $msg= "si";
      
                     }else if($data == "existe"){
                         $msg= "el socio ya existe";
                     }else{
                     $msg = "error al registrar el socio";
                  }
      
            }else{
                $data= $this->model->modificarVehiculos($unidad,$placa, $chasis,$marca, $fecha, $habilitacion, $idsocio,$id);
                if($data == "modificado"){
                  $msg= "modificado";
                     }else{
                     $msg = "error al modificar el socio";
                  }
      
            }
          
      
        }
        echo $msg;
        die();
        
        }
}


?>