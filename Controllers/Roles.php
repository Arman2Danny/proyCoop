<?php
class Roles extends Controller{
    public function __construct(){
           session_start();
           parent::__construct();
    }
    public function index(){
        if(empty($_SESSION['activo'])){
            header("location: ".base_url);
        }
        $id_socio = $_SESSION['id_socio'];
        echo $id_socio;
       $verificar =  $this->model->verificarPermisos($id_socio, 'roles' );
      if(!empty($verificar) || $id_socio == 1){
        $this->views->getView($this, "index");

      }else{
        header('location: '.base_url.'Errors/permisos');

      }
          //$data['vehiculo']=$this->model->getVehiculo();
          

    }

    public function listar(){
        $data= $this->model->getPermisos();
        for($i=0; $i<count($data) ; $i++){
            $data[$i]['acciones']='<div class="d-inline "><button class="btn btn-warning mb-1" type="button" onclick="btnEditarRoles('.$data[$i]['tipopermiso'].');"><i class="fa fa-pencil-square" aria-hidden="true">Editar</i></button></div>
           <div class="d-inline "> <button class="btn btn-danger" type="button" onclick="btnEliminarRoles('.$data[$i]['tipopermiso'].');"><i class="fa fa-trash" aria-hidden="true">Eliminar</i></button>
            </div>';
    
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //registrar roles

    public function registrar(){
        $tiposocio = $_POST['tiposocio'];
        $tipopermiso = $_POST['tipopermiso'];
        
        if(empty($tiposocio)){
            $msg= "Todos los campos son obligatorios";
    
        }else{
            if($tipopermiso==""){
               $data= $this->model->registrarRoles($tiposocio);
                if($data == "ok"){
                  $msg= "si";
    
                     }else if($data == "existe"){
                         $msg= "el Rol ya existe";
                     }else{
                     $msg = "error al registrar el Rol";
                  }
    
            }else{
                $data= $this->model->modificarRoles($tiposocio, $tipopermiso);
                if($data == "modificado"){
                  $msg= "modificado";
                     }else{
                     $msg = "error al modificar los Roles";
                  }
    
            }
          
    
        }
        echo $msg;
        die();
        
        }

         //editar Roles
    public function editar($id){
     
        $data=$this->model->rolesEditar($id);
      
       echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();

    }

    //eliminar Roles
    public function eliminar($id){
        //  print_r($id);
        $data=$this->model->eliminarRoles($id);
        //print_r($data);
        if($data == 1){
          $msg = "ok";
        }else{
          $msg = "error al eliminar el rol";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
  
        }
  
    

}

?>