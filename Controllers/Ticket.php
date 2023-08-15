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
        <table class="table display nowrap bg-light " cellspacing="0" id="mitabla" width="100%" >
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
                 <td><span class="badge bg-success">Pagado</span></td>
                <td><button class= "btn btn-info" onclick="editarTicket('.$id.')"  data-bs-toggle="modal" data-bs-target="#editarModal" data-bs-dismiss="modal" ><i class="fa fa-edit"></i></button> </td>
                
                <td> <button class= "btn btn-success" data-bs-toggle="modal" onclick="reporteTicket('.$id.')" > <i class="fa fa-file" ></i></button></td>
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

public function generarPdf($id){

        
   require('Libraries/fpdf/fpdf.php');


    date_default_timezone_set('America/Guayaquil');
       
        $data = $this->model->listarReporte($id);
        print_r($data);
        
       foreach($data as $row){
        $cod = $data[0]['codigoticket'];
        $nombre = $data[0]['nombresocio'];
        $apellido= $data[0]['apellidosocio'];
        $valor = $data[0]['valor'];
        $detalle = $data[0]['detalle'];
        $fecha = $data[0]['fechaticket'];


       }
       $hoy = date("F j, Y, g:i a");
       define('dolar',chr(36));

      
      
       
       $pdf = new FPDF('P','mm',array(100,90));
       $pdf->AddPage();
       $pdf->SetTitle("Reporte Ticket");
$pdf->Ln(5);
// CABECERA
$pdf->SetTextColor(59,131,189);
$pdf->SetFont('Helvetica','B',8);

$pdf->Cell(75,4,'"Coop. Taxi Cardenal de la Torre No:134 "',0,1,'C');
$pdf->Cell(60,4, $pdf->Image(base_url.'/Assets/img/taxi.jpg', $pdf->GetX(), $pdf->GetY(),20),0,1,'R');
$pdf->SetTextColor(254,0,0);
$pdf->SetFont('Times','',8);
$pdf->Cell(115,4,'No:'.'0000'.$cod ,0,1,'C');
$pdf->SetTextColor(59,131,189);
$pdf->SetFont('Helvetica','',8);
 
// DATOS FACTURA        
$pdf->Ln(5);
$pdf->Cell(15,4,'Recibe: ' ,0,0,'');
$pdf->Cell(40,4,$nombre .'  '.utf8_decode($apellido) ,0,0,'');
$pdf->Cell(60,4,'Por: '. $valor .' '. dolar ,0,1,'');
$pdf->Cell(18,4,'La suma de : ' ,0,0,'');
$pdf->Cell(38,4,'_______________________________' ,0,1,'');
$pdf->Cell(15,4,'__________________________________________' ,0,1,'');
$pdf->Cell(30,4,'Detalle del concepto',0,0,'');
$pdf->Cell(40,4, $detalle ,0,1,'');
$pdf->Cell(15,4,'__________________________________________' ,0,1,'');
$pdf->Cell(20,4,'Quito, a ',0,0,'');
$pdf->Cell(40,4,$fecha,0,1,'');



ob_end_clean(); 


$pdf->Output(); 
 

}

}


?>
