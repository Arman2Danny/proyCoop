<?php
class Evento extends Controller{
    public function __construct(){
        session_start();
        parent::__construct();
    }

    //abrir el archivo index de vistas
    public function index(){
        if(empty($_SESSION['activo'])){
            header("location: ".base_url);

        }
        //$data['evento']= $this->model->getEvento();
         $this->views->getView($this, "index");


    }
    public function array_envia($array){
      $tmp = serialize($array);
      $tmp = urlencode($tmp);
      return $tmp;
    }

    public function listar(){
        $data = $this->model->getEventos();
         $id= $data['idevento'];
         $id= $data['idevento'];
         $id= $data['idevento'];
         $id= $data['idevento'];
        echo json_encode($id);
       
       

        

  

    // $array = array_envia($data);

     /*  for($i=0; $i<count($data) ; $i++){
           
       
            $data[$i]['acciones']='<div class="d-inline "><button class="btn btn-warning mb-1" type="button" onclick="btnEditarEvento('.$data[$i]['idevento'].');"><i class="fa fa-pencil-square" aria-hidden="true">Editar</i></button></div>
           <div class="d-inline "> <button class="btn btn-danger mb-1" type="button" onclick="btnEliminarEvento('.$data[$i]['idevento'].');"><i class="fa fa-trash" aria-hidden="true">Eliminar</i></button>
         </div>
         
        


         
         ';

         $data[$i]['acciones'].=' <div class="d-inline "> <a class="btn btn-info" type="button" onclick="btnReporteEvento('.$data[$i]['idevento'].');"><i class="fas fa-file-pdf" aria-hidden="true">reporte</i></a>
         </div>';
    
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();*/
       

    }
    
//registrar Eventos
    public function registrar(){
        $evento = $_POST['nombre_evento'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $orden = $_POST['orden'];
      
        $id = $_POST['idevento'];
       
        if(empty($evento) || empty($descripcion) || empty($fecha) || empty($hora) || empty($orden) ){
            $msg= "Todos los campos son obligatorios";
      
        }else{
            if($id==""){
               $data= $this->model->registrarEvento($evento,$descripcion, $fecha,$hora, $orden);
                if($data == "ok"){
                  $msg= "si";
      
                     }else if($data == "existe"){
                         $msg= "el evento ya existe";
                     }else{
                     $msg = "error al registrar el evento";
                  }
      
            }else{
                $data= $this->model->modificarEvento($evento,$descripcion, $fecha,$hora, $orden,$id);
                if($data == "modificado"){
                  $msg= "modificado";
                     }else{
                     $msg = "error al modificar el evento";
                  }
      
            }
          
      
        }
        echo $msg;
        die();
        
        }

          //editar Evento
  public function editar($id){
     
    $data=$this->model->eventoEditar($id);
  
   echo json_encode($data,JSON_UNESCAPED_UNICODE);
    die();

}

public function eliminar($id){
    //  print_r($id);
    $data=$this->model->eliminarEvento($id);
    //print_r($data);
    if($data == 1){
      $msg = "ok";
    }else{
      $msg = "error al eliminar el evento";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();

    }
public function dato($id){
  
  $data=$this->model->datoEvento($id);
   if($data == 1){
    $msg = $id;
  }else{
    $msg = "error al eliminar el evento";
  }
  echo json_encode($msg, JSON_UNESCAPED_UNICODE);
  die();

}


}
?>