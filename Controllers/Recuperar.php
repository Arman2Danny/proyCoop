<?php 
 
    class Recuperar extends Controller{
        public function __construct(){
            session_start();
          
            parent::__construct();
           
           
        }
        public function index(){
          
            $this->views->getView($this, "index");
        }

        function recuperarcontra(){
            $email = $_POST['email'];
            $clave = $_POST['contra'];
            $contraactual = $_POST['contra'];
            $hash = hash("SHA256",$clave);
            $consulta = $this->model->Restablecer_Contra($hash, $email);
            if($consulta == 1){
                 $data = $this->model->modificarContra($hash, $email);
                if($data =='modificado'){
                    $msg = "modificado";
                }else{
                    $msg = "Error al modificar la contraseña";
                }
                echo $msg;
                die();
               // echo "1";
                
            }
        }
        

    }
    ?>