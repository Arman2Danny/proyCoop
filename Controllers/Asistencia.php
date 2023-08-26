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
    
    public function displayAsistencia(){

     
           
  
        if(isset($_POST['displaySend']) AND isset($_POST['resultSend'])){
          $fechaHoy = $_POST['resultSend'];
      
       $table = '
          <div class="container">
          <div class="row">
          <div class="col-lg-12">
                  <table class="table mt-5 display nowrap" cellspacing="0" id="mitabla" width="100%" >
                      <thead class="table-secondary table-striped">
                          <tr>
                          <th>Fecha</th>
                          <th>Nombre_Socios</th>
                          <th>Apellido_Socios</th>
                           <th>Estado</th>
                           <th>Multa</th>
                           
                           <th></th>
                        
                          </tr>
                      </thead>
          ';
          $dateStr = null;
          $data = $this->model->getAsistenciaLista($fechaHoy);
          foreach($data as $row){
              $id= $row['idasistencia'];
              $nombre = $row['nombresocio'];
              $apellido= $row['apellidosocio'];
              $estado = $row['estado'];
              $dateStr =date("Y-m-d", strtotime($row['fecha_asist'])) ;
              $multa = $row['monto_multa'];
              $evento = $row['id_evento'];
            
            
              $table.= '<tr>
              <td >'.$dateStr.'</td>
              <td>'. $nombre .'</td>
              <td>'. $apellido .'</td>
              <td>'. $estado .'</td>
              <td>'. $multa .'</td>
              <td><button class= "btn btn-info" onclick="btnEditarAsistencia('.$id.',\''.$dateStr.'\') "  data-bs-toggle="modal" data-bs-target="#editarModal" data-bs-dismiss="modal" ><i class="fa fa-edit"></i></button> </td>
        
           ';
          }
          echo '<script type="text/JavaScript"> 
          $("#mitabla").DataTable();
          </script>';
         echo $table;
        
      }
  }

  public function registrarAsist(){

    $id = $_POST['codigoasistencia'];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $estado = $_POST["estado"];
    $fecha = $_POST["fechafrm"];
    $multa = $_POST["multa"];
    $evento = $_POST["evento"];

    if($id ==""){
        $data= $this->model->registrarAsistencia($nombre,$apellido, $estado, $fecha, $multa,$evento);
        if($data == "ok"){
            $msg= "si";

               }else if($data == "existe"){
                   $msg= "la asistencia del socio ya existe";
               }else{
               $msg = "error al registrar la asistencia";
            }
    }else{
        $data= $this->model->modificarAsistencia($nombre,$apellido, $estado,$fecha, $multa, $evento, $id);
        if($data == "modificado"){
          $msg= "modificado";
             }else{
             $msg = "error al modificar el socio";
          }

    }
    
    echo $msg;
    die();


  }

   public function editarAsist(){
    $id= $_POST['id'];
    $fecha = $_POST['fecha'];
   // echo $id;
   // echo $fecha;
    $data=$this->model->AsistenciaEditar($id, $fecha);
    //print_r($data);
    echo json_encode($data);
    die();


   }

 }

?>
