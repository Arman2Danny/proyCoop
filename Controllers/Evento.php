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
        $data = $this->model->getEvento();
      

      for($i=0; $i<count($data) ; $i++){
           
       
            $data[$i]['acciones']='<div class="d-inline "><button class="btn btn-warning mb-1" type="button" onclick="btnEditarEvento('.$data[$i]['idevento'].');"><i class="fa fa-pencil-square" aria-hidden="true">Editar</i></button>

            <button class="btn btn-danger mb-1" type="button" onclick="btnEliminarEvento('.$data[$i]['idevento'].');"><i class="fa fa-trash" aria-hidden="true">Eliminar</i></button>
        

        <a class="btn btn-info" type="button" onclick="reporteEvento('.$data[$i]['idevento'].');"><i class="fas fa-file-pdf" aria-hidden="true">reporte</i></a>
         </div>
         
      


         
         ';

        
    
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
       

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

public function generarPdf($id){

  require('Libraries/fpdf/fpdf.php');
  date_default_timezone_set('America/Guayaquil');
$data = $this->model->reporteEvento($id);
$ordendia=$data['ordendia'];

$arr=explode("\r\n", trim($ordendia));


  $pdf = new FPDF();
  $pdf->AddPage();
  // add image
  $pdf->Image(base_url.'Assets/img/taxi.jpg', 50, 15, 20, 20, 'JPG');
  // config document

  $pdf->SetFont('Helvetica','',8);
  $pdf->Cell(210,5,'COOPERATIVA DE TRANSPORTE DE TAXIS',0,1,'C');

$pdf->SetFont('Helvetica','',8);
$pdf->Cell(211,4,'"CARDENAL DE LA TORRE"' ,0,1,'C');


$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(210, 5, 'FUNDADA EL 18 DE JULIO 1987', 0, 1, 'C');
$pdf->Cell(210,5, 'Este campo no se ve jajaj', 0, 1, 'C');
$pdf->ln(1);
$pdf->Cell(210, 5, '__________________________________________', 0, 1, 'C');
$pdf->ln(4);
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(210,5, 'CONVOCATORIA', 0,1,'C');

$pdf->Cell(180,5, $data['fecha'], 0,1,'R');
$pdf->Ln(10);
 $pdf->SetFont('Arial', '', 12);
 $pdf->SetTextColor(27, 27, 27);
 $texto = utf8_decode("Se convoca a todos los señores socios de la Cooperativa Cardenal de la Torre,
 No. " .$data['idevento']. " a la sesion de " .$data['nombre_evento'].
 "a realizarse en la sede de la Cooperativa el dia " .$data['fecha']. " a las "
 .$data['hora']. ", con el siguiente orden del dia:");
 $pdf->Multicell(180,6, $texto,0,'C');
 $pdf->Ln(5);
 for($i=0; $i<count($arr); $i++){
  $linea= $arr[$i];
  $pdf->MultiCell(180,6,$linea,0,'J');
 }
$pdf->ln(10);
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(180,5, 'ATENTAMENTE' , 0, 1, 'C');
$pdf->Ln(10);


$pdf->MultiCell(183,5,'  _______________             _____________',0,'C');
$pdf->Ln(1);
$pdf->SetFont('times', '', 11);
$pdf->Cell(185,3, 'Sr. Guillermo Cauja                     Sr. Nestor Toapanta' , 0, 2, 'C');
$pdf->Ln(30);
$pdf->SetFont('times', '', 14);
$pdf->MultiCell(183,35,$data['Descripcion'],0,'L');

// ---------------------------------------------------------

//Close and output PDF document
ob_end_clean();
  
  // output file
  $pdf->Output('', 'fpdf-complete.pdf');

}


}
?>