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
  public function ticket(){
    $sql = "SELECT * FROM ticket";
    $data= $this->selectAll($sql);
    return $data;
  }
  public function getListarTicket(){
    $sql = "SELECT * FROM socios, ticket WHERE idsocio = idnombresocio";
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
   
    //$this->idsocio = $idsocio;
   
    $verificar =  "SELECT * FROM socios, ticket WHERE idnombresocio= '$this->nombre'  ";
    $existe = $this->select($verificar);
    if(empty($existe)){
      $sql ="INSERT INTO ticket(codigoticket, idnombresocio, apellidosocio, valor, detalle, fechaticket) VALUES(?,?,?,?,?,?)";
      $datos = array($this->ticket, $this->nombre, $this->apellido,$this->valor,$this->detalle,$this->fecha);
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

   //modificar vehiculos
 public function modificarTicket($ticket, $nombre , $apellido,  $valor ,  $detalle, $fecha,  $id){
  $this->ticket = $ticket;
  $this->nombre = $nombre;
  $this->apellido = $apellido;
  $this->valor = $valor;
  $this->detalle = $detalle;
  $this->fecha = $fecha;
  
  //$this->idsocio = $idsocio;
  $this->id = $id;
 
    $sql ="UPDATE ticket SET codigoticket = ?, idnombresocio = ?, apellidosocio = ?, valor= ?, detalle= ?, fechaticket = ? WHERE idticket = ? ";
    $datos = array($this->ticket, $this->nombre, $this->apellido, $this->valor, $this->detalle, $this->fecha,  $this->id);
    $data=$this->save($sql, $datos);
    if($data == 1){
      $res= "modificado";
    }else{
      $res= "error";
    }
    return $res;

}

    
  }
?>