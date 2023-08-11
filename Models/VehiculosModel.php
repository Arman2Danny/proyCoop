<?php
Class VehiculosModel extends Query{
  private $unidad;
  private $placa;
  private $chasis;
  private $marca;
  private $fecha;
  private $habilitacion;
  private $idsocio;
  private $id;
    public function __construct(){
        parent::__construct();
    }
    public function getVehiculos(){
        $sql="SELECT * FROM socios s INNER JOIN vehiculo v where s.idsocio = v.id_socio";
        $data= $this->selectAll($sql);
        return $data;
    }

    public function getVehiculo(){
      $sql="SELECT * FROM socios";
      $data= $this->selectAll($sql);
      return $data;
  }
    

    public function registrarVehiculos($unidad , $placa, $chasis,  $marca, $fecha, $habilitacion, $idsocio){
        $this->unidad = $unidad;
        $this->placa = $placa;
        $this->chasis = $chasis;
        $this->marca = $marca;
        $this->fecha = $fecha;
        $this->habilitacion = $habilitacion;
        $this->idsocio = $idsocio;
       
        $verificar =  "SELECT * FROM vehiculo WHERE num_unidad= '$this->unidad'  ";
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

      //modificar vehiculos
 public function modificarVehiculos($unidad, $placa , $chasis,  $marca ,  $fecha, $habilitacion, $idsocio, $id){
  $this->unidad = $unidad;
  $this->placa = $placa;
  $this->chasis = $chasis;
  $this->marca = $marca;
  $this->fecha = $fecha;
  $this->habilitacion = $habilitacion;
  $this->idsocio = $idsocio;
  $this->id = $id;
 
    $sql ="UPDATE vehiculo SET num_unidad = ?, placa = ?, num_chasis = ?, marca= ?, fecha_fabricacion= ?, num_habilitacion = ?, id_socio = ? WHERE idvehiculo = ? ";
    $datos = array($this->unidad, $this->placa, $this->chasis, $this->marca, $this->fecha, $this->habilitacion, $this->idsocio, $this->id);
    $data=$this->save($sql, $datos);
    if($data == 1){
      $res= "modificado";
    }else{
      $res= "error";
    }
    return $res;

}

//editar vehiculo
public function vehiculoEditar($id){
  $sql = "SELECT * FROM vehiculo WHERE idvehiculo = $id";
  $data = $this->select($sql);
  return $data;

 }

 //eliminar vehiculos
 public function eliminarVehiculo($id){
  $this->id = $id;
  $sql = "DELETE FROM vehiculo WHERE idvehiculo = ?";
  $datos = array($this->id);
  $data = $this->save($sql,$datos);
  return $data;
 }

 //total vehiculos
 public function totalVehiculos(){
  $sql="SELECT * FROM socios, vehiculo WHERE idsocio= id_socio ";
  $data= $this->selectTotal($sql);
  return $data;
}


}

?>