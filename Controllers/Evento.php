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
  require('Libraries/TCPDF/tcpdf.php');
  // create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

}


}
?>