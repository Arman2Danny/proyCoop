<?php
 class Asistencia extends Controller{
    public function __construct(){
        session_start();
        parent::__construct();
    } 

    public function index(){
        if(empty($_SESSION['activo'])){
            header("location: ".base_url);
        }
      
          $data['socio']=$this->model->getSocio();
          $data["evento"]=$this->model->getEvento();
          $this->views->getView($this, "index",$data);

    }

    public function listapellido(){
        if(isset($_POST['id_nombre'])){
            $id_nombre = $_POST['id_nombre'];
            $data= $this->model->consultApellido($id_nombre);
           
            if($data){
                $msg = $data['apellidosocio'];
                //$msg = "si";
            }else{
                $msg = "no";
            }
        }
        echo $msg;
        die();

    }

    public function multa (){
        if(isset($_POST["vestado"])){
            $estado= $_POST["vestado"];
            $pre=0;
            $mul=20;
            $ju=0;
           if ($estado=="Presente"){
            echo $pre;
        }
            if($estado== "Falta"){
                echo $mul;
            }

            if($estado == "Justificado"){
                echo $ju;
            
           }

        }
    }

 }

?>