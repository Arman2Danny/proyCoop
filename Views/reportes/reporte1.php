<?php
include_once "../../Config/App/Conexion.php";
class Reporte1{
    public function __construct(){
        $this->pdo = new Conexion();
        $this->con = $this->pdo->connect();

    }
public function reporteTicket(){
   
if(isset($_GET['id'])){
    include_once "../../TCPDF/tcpdf.php";
    date_default_timezone_set('America/Guayaquil');
    $id = $_GET['id'];
   
    echo $id;
    $sql = "SELECT * FROM ticket, socios where idnombresocio='$id' AND idsocio = '$id' ";
    $resultado = $this->con->query($sql);
    while($registro = $resultado->fetch()){
        echo "ID" .$registro['idticket'];
    }
}else{
    echo "no existe variable";
}
}


}

$report = new Reporte1();
$res= $report->reporteTicket();
echo $res;
?>