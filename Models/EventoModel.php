<?php
class EventoModel extends Query{
    private $nombre_evento;
    private $descripcion;
    private $fecha;
    private $orden_dia;
    private $id;
    public function __construct(){
        parent::__construct();
    }

    //listar eventos
    public function getEvento(){
        $sql= "SELECT * FROM evento ";
        $data = $this->selectAll($sql);
        return $data;
    }
    
    public function getEventos(){
        $sql="SELECT * FROM evento ";
        $data = $this->selectEvento($sql);
        return $data;
    }

  public function obtenerId(){

  }

    public function registrarEvento($evento , $descripcion, $fecha,  $hora, $ordendia){
        $this->evento = $evento;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ordendia = $ordendia;
      
      
       
        $verificar =  "SELECT * FROM evento WHERE nombre_evento = '$this->evento'  ";
        $existe = $this->select($verificar);
        if(empty($existe)){
          $sql ="INSERT INTO evento(nombre_evento, Descripcion, fecha, hora, ordendia) VALUES(?,?,?,?,?)";
          $datos = array($this->evento, $this->descripcion, $this->fecha,$this->hora,$this->ordendia);
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

      public function modificarEvento($evento , $descripcion, $fecha,  $hora, $ordendia, $id){
        $this->evento = $evento;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ordendia = $ordendia;
        $this->id = $id;
     
      
       
          $sql ="UPDATE evento SET nombre_evento = ?, Descripcion = ?, fecha =?, hora= ?, ordendia = ? WHERE idevento= ? ";
          $datos = array($this->evento, $this->descripcion, $this->fecha, $this->hora, $this->ordendia, $this->id);
          $data=$this->save($sql, $datos);
          if($data == 1){
            $res= "modificado";
          }else{
            $res= "error";
          }
          return $res;
      
      }
      
      //editar evento
public function eventoEditar($id){
    $sql = "SELECT * FROM evento WHERE idevento = $id";
    $data = $this->select($sql);
    return $data;
  
   }

    //eliminar evento
 public function eliminarEvento($id){
  $this->id = $id;
  $sql = "DELETE FROM evento WHERE idevento= ?";
  $datos = array($this->id);
  $data = $this->save($sql,$datos);
  return $data;


 }

 public function datoEvento($id){
  $this->id = $id;
  $sql = "SELECT * FROM evento WHERE idevento= ?";

   $datos = array($this->id);
  $data = $this->save($sql,$datos);
  return $data;

 }

}

?>