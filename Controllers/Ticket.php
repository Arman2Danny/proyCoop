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


    public function datosTicket(){
        
        $data = $this->model->ticket();
        foreach($data as $row){
            $numero = $row['codigoticket'];
        }
        $sum = intval($numero) + 1;
        echo $sum;
    }

    public function listar(){
        $array[]="";
        $array=$data = $this->model->getListarTicket();
      
      $conver = json_encode($array);
      echo $conver;
        
    }

    public function registrar(){
        $ticket = $_POST['ticket'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $valor = $_POST['valor'];
        $detalle = $_POST['detalle'];
        $fecha = $_POST['fecha'];
       // $idsocio = $_POST['idsocio'];
        $id = $_POST['idticket'];
        $numero_ticket = substr($ticket,3);
       
        if(empty($ticket) || empty($nombre) || empty($apellido) || empty($valor) || empty($detalle) || empty($fecha)){
            $msg= "Todos los campos son obligatorios";
      
        }else{
            if($id==""){
               $data= $this->model->registrarTicket($numero_ticket,$nombre, $apellido,$valor, $detalle, $fecha);
                if($data == "ok"){
                  $msg= "si";
      
                     }else if($data == "existe"){
                         $msg= "el ticket ya existe";
                     }else{
                     $msg = "error al registrar el ticket";
                  }
      
            }else{
                $data= $this->model->modificarTicket($numero_ticket,$nombre, $apellido,$valor, $detalle, $fecha, $id);
                if($data == "modificado"){
                  $msg= "modificado";
                     }else{
                     $msg = "error al modificar el ticket";
                  }
      
            }
          
      
        }
        echo $msg;
        die();
        
        }
}


?>