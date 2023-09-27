<?php
  class SociosModel extends Query{
    private $nombre;
    private $apellido;
    private $passw;
    private $email;
    private $estado;
    private $id_permiso;
    private $id;
  
    public function __construct(){
       parent::__construct();

    }
    //consultas socios se escribe todos los metodos y funciones que se van a utlizar
    public function getSocio(string $email, string $clave){
     // $hash = hash("SHA256",$clave);
        $sql="SELECT * FROM socios WHERE correo = '$email' AND passw = '$clave' ";
        $data= $this->select($sql);
        return $data;
    }
    public function getPermiso(){
      $sql="SELECT * FROM roles ";
      $data= $this->selectAll($sql);
      return $data;
  }
    public function getSocios(){
      $sql="SELECT s.*, p.tiposocio FROM socios s INNER JOIN roles p where s.id_permiso = p.tipopermiso ";
      $data= $this->selectAll($sql);
      return $data;
  }

  public function registrarSocios(string $nombre , $apellido, $direccion, $telefono, string $passw , $cedula, string $email,  $estado, int $id_permiso){
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->direccion = $direccion;
    $this->telefono = $telefono;
    $this->passw = $passw;
    $this->cedula = $cedula;
    $this->email = $email;
    $this->estado = $estado;
    $this->id_permiso = $id_permiso;
    $this->estado = 1;
    $verificar =  "SELECT * FROM socios WHERE nombresocio = '$this->nombre' AND correo='$this->email' ";
    $existe = $this->select($verificar);
    if(empty($existe)){
      $sql ="INSERT INTO socios(nombresocio, apellidosocio,direccion, telefono, passw, cedula, correo, estado, id_permiso) VALUES(?,?,?,?,?,?,?,?,?)";
      $datos = array($this->nombre, $this->apellido,$this->direccion, $this->telefono, $this->passw,$this->cedula, $this->email,$this->estado, $this->id_permiso);
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

 //modificar socio
 public function modificarSocios(string $nombre ,$apellido, $direccion, $telefono, string $passw , $cedula, string $email, $estado, int $id_permiso , int $id){
  $this->nombre = $nombre;
  $this->apellido = $apellido;
  $this->direccion = $direccion;
  $this->telefono = $telefono;
  $this->passw = $passw;
  $this->cedula = $cedula;
  $this->email = $email;
  $this->estado = $estado;
  $this->id_permiso = $id_permiso;
  $this->id = $id;
 
    $sql ="UPDATE socios SET nombresocio = ?, apellidosocio= ?, direccion = ?, telefono = ? ,passw= ?, cedula = ?, correo= ?, estado = ?, id_permiso = ? WHERE idsocio = ? ";
    $datos = array($this->nombre, $this->apellido, $this->direccion, $this->telefono,$this->passw, $this->cedula, $this->email, $this->estado, $this->id_permiso, $this->id);
    $data=$this->save($sql, $datos);
    if($data == 1){
      $res= "modificado";
    }else{
      $res= "error";
    }
    return $res;

}


  
//editar socio
 public function socioEditar($id){
  $sql = "SELECT * FROM socios WHERE idsocio = $id";
  $data = $this->select($sql);
  return $data;

 }

 //eliminar socio
 public function eliminarSocio($id){
  $this->id = $id;
  $sql = "UPDATE socios SET estado=0 WHERE idsocio = ?";
  $datos = array($this->id);
  $data = $this->save($sql,$datos);
  return $data;


 }

 public function getPermisos(){
  $sql="SELECT * FROM permisos ";
  $data= $this->selectAll($sql);
  return $data;
}

 //total socios
 public function totalSocios(){
  $sql="SELECT * FROM socios, roles WHERE tipopermiso= id_permiso ";
  $data= $this->selectTotal($sql);
  return $data;
}

public function registrarPermisos($id_socio, $id_permiso){
  $sql = "INSERT INTO detalle_permisos (id_socio,id_permiso) values (?,?)";
  $datos = array($id_socio, $id_permiso);
  $data = $this->save($sql, $datos);
  if($data == 1){
    $resp = 'ok';
   }else{
     $resp = 'error';
   }
 
   return $resp;


}

public function eliminarPermisos($id_socio){
  $sql = "DELETE FROM detalle_permisos WHERE id_socio = ?";
  $datos = array($id_socio);
  $data = $this->save($sql, $datos);
  if($data == 1){
   $resp = "ok";
  }else{
    $resp = "error";
  }

  return $resp;

}

public function getDetallePermisos($id){
  $sql="SELECT * FROM detalle_permisos WHERE id_socio = $id";
  $data= $this->selectAll($sql);
  return $data;
}

  }

?>