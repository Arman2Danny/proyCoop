<?php
 class AsistenciaModel extends Query{
    private  $id_nombre;
    public function __construct(){
        parent::__construct();

    }
    public function getSocio(){
        $sql="SELECT * FROM socios";
        $data= $this->selectAll($sql);
        return $data;
    }
    public function consultApellido($id_nombre){
        $this->id_nombre = $id_nombre;
        $sql=  "SELECT * FROM socios, vehiculo WHERE idsocio = '$this->id_nombre'  ";
        $data= $this->select($sql);
        return $data;

    }
    public function getEvento(){
        $sql = "SELECT * FROM evento";
        $data= $this->selectAll($sql);
        return $data;
    }

    public function getAsistenciaLista($fechaHoy){
        $this->fechaHoy = $fechaHoy;
        $sql = "SELECT * from socios, evento , asistenciasocio WHERE idsocio = idasistencia AND idevento = id_evento AND fecha_asist = '$this->fechaHoy'";
        $data = $this->select($sql);
        return $data;
    }

    public function registrarAsistencia($fecha , $idnombre, $apellido,  $estado, $multa,$evento){
        $this->fecha = $fecha;
        $this->idnombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->multa = $multa;
        $this->evento = $evento;
       
        //$this->idsocio = $idsocio;
       
        $verificar =  "SELECT * FROM asistenciasocio WHERE idasistiencia= '$this->idnombre' AND fecha_asist = '$this->fecha' ";
        $existe = $this->select($verificar);
        if(empty($existe)){
          $sql ="INSERT INTO ticket(idasistencia, apellidosocio, estado, fecha_asist,monto_multa, evento) VALUES(?,?,?,?,?,?)";
          $datos = array($this->nombre, $this->apellido, $this->estado,$this->fecha,$this->multa,$this->multa);
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