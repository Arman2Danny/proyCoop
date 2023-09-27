<?php 

class Socios extends Controller{
    public function __construct(){
        session_start();
      
        parent::__construct();
       
    }
    public function index(){ 
        
        if(empty($_SESSION['activo'])){
            header("location: ".base_url);
        }

       $data['roles'] = $this->model->getPermiso();
       $this->views->getView($this, "index", $data);
       
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
                $_SESSION['apellido']= $data['apellidosocio'];
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

    public function listar(){
        $data= $this->model->getSocios();
        for($i=0; $i<count($data) ; $i++){
            if($data[$i]['estado'] == 1){
                $data[$i]['estado'] ='<span class="badge bg-primary">Activo</span>';
            if($data[$i]['idsocio'] == 1){
                $data[$i]['acciones']='<div><span class="badge bg-primary">Administrador</span></div>';

            }else{
                
                $data[$i]['acciones']='<div class="d-inline ">
                <a class="btn btn-dark mb-1" href="'.base_url.'Socios/permisos/'.$data[$i]['idsocio'].'" ><i class="fa fa-key" aria-hidden="true">Editar</i></a>
                <button class="btn btn-warning mb-1" type="button" onclick="btnEditarSocio('.$data[$i]['idsocio'].');"><i class="fa fa-pencil-square" aria-hidden="true">Editar</i></button></div>
            

           <div class="d-inline "> <button class="btn btn-danger" type="button" onclick="btnEliminarSocio('.$data[$i]['idsocio'].');"><i class="fa fa-trash" aria-hidden="true">Eliminar</i></button>
            </div> ';

            }
            }else{
                $data[$i]['estado'] ='<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones']='<div class="d-inline "><button class="btn btn-warning mb-1" type="button" onclick="btnEditarSocio('.$data[$i]['idsocio'].');"><i class="fa fa-pencil-square" aria-hidden="true">Editar</i></button></div>
             ';
            }
            
            
        
            
           
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar(){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $passw = $_POST['password'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $permiso = $_POST['permiso'];
    $id = $_POST['idsocio'];
    $hash = hash("SHA256",$passw);
    if(empty($nombre) || empty($apellido) || empty($direccion) || empty($telefono)   || empty($passw) || empty($email) || empty($permiso)){
        $msg= "Todos los campos son obligatorios";

    }else{
        if($id==""){
           $data= $this->model->registrarSocios($nombre,$apellido, $direccion, $telefono, $hash, $cedula, $email, $estado, $permiso);
            if($data == "ok"){
              $msg= "si";

                 }else if($data == "existe"){
                     $msg= "el socio ya existe";
                 }else{
                 $msg = "error al registrar el socio";
              }

        }else{
            $data= $this->model->modificarSocios($nombre,$apellido, $direccion, $telefono, $hash, $cedula, $email, $estado, $permiso, $id);
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

    //editar socios
    public function editar($id){
     
        $data=$this->model->socioEditar($id);
      
       echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();

    }

    public function eliminar($id){
      //  print_r($id);
      $data=$this->model->eliminarSocio($id);
      //print_r($data);
      if($data == 1){
        $msg = "ok";
      }else{
        $msg = "error al eliminar el usuario";
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();

      }

      public function permisos($id){ 
        
        if(empty($_SESSION['activo'])){
            header("location: ".base_url);
        }

       $data['datos'] = $this->model->getPermisos();
       $permisos = $this->model->getDetallePermisos($id);
       $data['asignados']= array();
       foreach($permisos as $permiso){
        $data['asignados'][$permiso['id_permiso']] = true;
       }
       $data['id_socio'] = $id;
       $this->views->getView($this, "permisos", $data);
       
    }

    public function registrarPermiso(){
        $msg = '';
        $id_socio = $_POST['id_socio'];
       $eliminar= $this->model->eliminarPermisos($id_socio);

       if($eliminar == "ok"){
        foreach($_POST['permisos'] as $id_permiso){
           $msg= $this->model->registrarPermisos($id_socio, $id_permiso);
            if($msg == 'ok'){
                $msg = array('msg' => 'Permisos Asignados', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al asignar los permisos', 'icono' => 'error');
            }

        }


       }else{
        $msg = array('msg'=> 'Error al eliminar los permisos anteriores', 'icono' => 'error');

       }
       echo json_encode ($msg);
      
    }

      public function salir(){
        session_unset();
        session_destroy();
        header("location: ".base_url);
      }

      


    }
    





?>
