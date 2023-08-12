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
        $data['listar'] = $this->model->getListarTicket();
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

    public function displayTicket(){
        if(isset($_POST['displaySend'])){
            $table='
            <div class="container">
<div class="row">
<div class="col-lg-12">
        <table class="table mt-5 display nowrap bg-light " cellspacing="0" id="mitabla" width="100%" >
            <thead class="table-light table-striped">
                <tr>
                <th class="text-warning">NumeroTicket</th>
                <th class="text-warning">Nombre_Socios</th>
                <th class="text-warning">Apellido_Socios</th>
                 <th class="text-warning">Valor</th>
                 <th class="text-warning">Detalle</th>
                 <th class="text-warning">Fecha</th>
                 <th></th>
                 <th></th>
              
                </tr>
            </thead>
            ';
            $data = $this->model->getListarTicket();

            foreach($data as $row){
                $id = $row['idnombresocio'];
                $codigo= $row['codigoticket'];
                $nombre = $row['nombresocio'];
                $apellido = $row['apellidosocio'];
                $valor = $row['valor'];
                $detalle = $row['detalle'];
                $fecha = $row['fechaticket'];
                $table.= '<tr>
                <td >'.$codigo.'</td>
                <td>'. $nombre .'</td>
                <td>'. $apellido .'</td>
                <td>'. $detalle .'</td>
                <td>'. $valor .'</td>
                <td>'. $fecha .'</td>

                <td><button class= "btn btn-info" onclick="editarTicket('.$id.')"  data-bs-toggle="modal" data-bs-target="#editarModal" data-bs-dismiss="modal" ><i class="fa fa-edit"></i></button> </td>
                
                <td> <a class= "btn btn-success" target="_black" href="Assets/reportes/reporte1.php?id='.$id.'"><i class="fa fa-file" ></i></a></td>
                </tr>';
            }
            echo $table;
        }
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
                $data= $this->model->modificarTicket($ticket,$nombre, $apellido,$valor, $detalle, $fecha, $id);
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

          //editar ticket
  public function editar($id){
     
    $data=$this->model->ticketEditar($id);
  
   echo json_encode($data,JSON_UNESCAPED_UNICODE);
    die();

}
}


?>