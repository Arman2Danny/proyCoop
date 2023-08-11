<?php 
  class TicketModel extends Query{
    private $ticket;
    private $nombre;
    private $apellido;
    private $valor;
    private $detalle;
    private $fecha;
   
    private $id;
    public function __construct(){
        parent::__construct();
    }
    public function getTicket(){
      $sql="SELECT * FROM socios";
      $data= $this->selectAll($sql);
      return $data;
  }

  public function registrarTicket($ticket , $nombre, $apellido,  $valor, $detalle, $fecha){
    $this->ticket = $ticket;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->valor = $valor;
    $this->detalle = $detalle;
    $this->fecha = $fecha;
    $numero_ticket = substr($ticket,3);
    //$this->idsocio = $idsocio;
   
    $verificar =  "SELECT * FROM socios, ticket WHERE idnombresocio= '$this->nombre'  ";
    $existe = $this->select($verificar);
    if(empty($existe)){
      $sql ="INSERT INTO vehiculo(num_unidad, placa, num_chasis, marca, fecha_fabricacion, num_habilitacion, id_socio) VALUES(?,?,?,?,?,?,?)";
      $datos = array($this->unidad, $this->placa, $this->chasis,$this->marca,$this->fecha,$this->habilitacion, $this->idsocio);
      $data=$this->save($sql, $datos);
      if($data == 1){
        $res= "ok";
      }else{
        $res= "error";
      }
    }else{
      $res = "existe";
    }
      return $res;
  }

    
  }
?>