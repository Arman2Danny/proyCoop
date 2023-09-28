<?php
class Multa extends Controller{
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
       $verificar =  $this->model->verificarPermisos($id_socio, 'multa' );
      if(!empty($verificar) || $id_socio == 1){
        $this->views->getView($this, "index");

      }else{
        header('location: '.base_url.'Errors/permisos');

      }
        
      
         

    }
    public function displayMulta(){
        if(isset($_POST['fechainicial']) && isset($_POST['fechafinal'])){
            $fecha_inicio = $_POST['fechainicial'];
            $fecha_final = $_POST['fechafinal'];
           // echo $fecha_inicio;
            //echo "<br>";
           // echo $fecha_final;
            $data = $this->model->getMultaLista($fecha_inicio, $fecha_final);
            print_r($data);
            /*
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
                             <th>Monto_Multa</th>
                             <th></th>
                             <th>Pago_Multa</th>
                             
                             <th></th>
                             <th></th>
                          
                            </tr>
                        </thead>
            ';
            $dateStr = null;
            $data = $this->model->getMultaLista($fecha_inicio, $fecha_final);
            foreach($data as $row){
                $id= $row['idasistencia'];
                $nombre = $row['nombresocio'];
                $apellido= $row['apellidosocio'];
                $estado = $row['estado'];
                $dateStr =$row['fecha_asist'] ;
                $multa = $row['monto_multa'];
                $evento = $row['id_evento'];

                if($estado == "Presente"){
                    $resp = '
                    <span id="resp" class="badge badge-info">pagado</span>
                    ';
                }else if($estado == "Falta"){
                    $resp='<span id="resp" class="badge badge-danger">pendiente</span>';
                }else{
                    $resp='<span id="resp" class="badge badge-success">sin novedad</span>';
                }
              
              
                $table.= '<tr>
                <td >'.$dateStr.'</td>
                <td>'. $nombre .'</td>
                <td>'. $apellido .'</td>
                <td>'. $estado .'</td>
                <td>'. $multa .'</td>
                <td>'. $resp .'</td>
                
                <td><button class= "btn btn-info" onclick="btnEditarAsistencia('.$id.',\''.$dateStr.'\') "  data-bs-toggle="modal" data-bs-target="#editarModal" data-bs-dismiss="modal" ><i class="fa fa-edit"></i></button> </td>
          
             ';
            }
            echo '<script type="text/JavaScript"> 
            $("#mitabla").DataTable();
            </script>';
           echo $table;*/
           

        }
    }


}

?>