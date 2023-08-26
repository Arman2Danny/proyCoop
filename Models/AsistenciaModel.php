<?php
 class AsistenciaModel extends Query{
    private  $id_nombre;
    private $id;
    private $fecha;
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
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarAsistencia($idnombre, $apellido, $estado,$fecha ,  $multa,$evento){
       
        $this->idnombre = $idnombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->multa = $multa;
        $this->evento = $evento;
       
        //$this->idsocio = $idsocio;
       
        $verificar =  "SELECT * FROM asistenciasocio WHERE idasistencia= '$this->idnombre' AND fecha_asist = '$this->fecha' ";
        $existe = $this->select($verificar);
        if(empty($existe)){
          $sql ="INSERT INTO asistenciasocio(idasistencia, apellidosocio, estado, fecha_asist,monto_multa, id_evento) VALUES(?,?,?,?,?,?)";
          $datos = array($this->idnombre, $this->apellido, $this->estado,$this->fecha,$this->multa,$this->evento);
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


      public function modificarAsistencia($idnombre, $apellido , $estado,  $fecha ,  $multa, $evento, $id){
        $this->idnombre = $idnombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->multa = $multa;
        $this->evento = $evento;
        $this->id = $id;
       
       
          $sql ="UPDATE asistenciasocio SET idasistencia = ?, apellidosocio = ?, estado = ?, fecha_asist= ?, monto_multa= ?, id_evento = ? WHERE idasistencia = ? ";
          $datos = array($this->idnombre, $this->apellido, $this->estado, $this->fecha, $this->multa, $this->evento, $this->idnombre);
          $data=$this->save($sql, $datos);
          if($data == 1){
            $res= "modificado";
          }else{
            $res= "error";
          }
          return $res;
      
      }

      public function AsistenciaEditar($id, $fecha){
        $this->id = $id;
        $this->fecha = $fecha;
        
        $sql = "SELECT * FROM asistenciasocio WHERE idasistencia = '$this->id' AND fecha_asist = '$this->fecha' ";
        $data = $this->select($sql);
        return $data;
      
       }
 }
?>