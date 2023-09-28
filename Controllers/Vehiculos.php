<?php
class Vehiculos extends Controller{
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
 $verificar =  $this->model->verificarPermisos($id_socio, 'socios' );
if(!empty($verificar) || $id_socio == 1){
  $data['vehiculo']=$this->model->getVehiculo();

  $this->views->getView($this, "index",$data);

}else{
  header('location: '.base_url.'Errors/permisos');

}
  
   // $data['vehiculo']=$this->model->getVehiculo();
  
  } 
  public function listar(){
    $data= $this->model->getVehiculos();
    for($i=0; $i<count($data) ; $i++){
       
        $data[$i]['acciones']='<div class="d-inline "><button class="btn btn-warning mb-1" type="button" onclick="btnEditarVehiculo('.$data[$i]['idvehiculo'].');"><i class="fa fa-pencil-square" aria-hidden="true">Editar</i></button></div>
       <div class="d-inline "> <button class="btn btn-danger" type="button" onclick="btnEliminarVehiculo('.$data[$i]['idvehiculo'].');"><i class="fa fa-trash" aria-hidden="true">Eliminar</i></button>
        </div>';

    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
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

  //editar Vehiculo
  public function editar($id){
     
    $data=$this->model->vehiculoEditar($id);
  
   echo json_encode($data,JSON_UNESCAPED_UNICODE);
    die();

}

//eliminar vehiculos
public function eliminar($id){
  //  print_r($id);
  $data=$this->model->eliminarVehiculo($id);
  //print_r($data);
  if($data == 1){
    $msg = "ok";
  }else{
    $msg = "error al eliminar vehiculo";
  }
  echo json_encode($msg, JSON_UNESCAPED_UNICODE);
  die();

  }


}

?>