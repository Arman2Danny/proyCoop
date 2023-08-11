<?php
 class Escritorio extends Controller{
    public function __construct(){
        session_start();
      
        parent::__construct();
       
    }
    public function index(){
        
        if(empty($_SESSION['activo'])){
            header("location: ".base_url);
        }

       $data['roles'] = $this->model->getPermiso();
       $this->views->getView($this, "index");
       
    }
    public function validar(){
        if(empty($_POST['email']) || empty($_POST['password'])){
            $msg= "los campos estan vacios";
        }else{
            $email= $_POST['email'];
            $clave= $_POST['password'];
             $hash=hash("SHA256",$clave);
            $data= $this->model->getSocio($email, $hash);
            if($data){
                $_SESSION['id_socio'] = $data['idsocio'];
                $_SESSION['nombre'] = $data['nombresocio'];
                $_SESSION['rol'] = $data['id_permiso'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            }else{
                $msg = "Email o contraseña incorrecta ";
            }

        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

 }
?>