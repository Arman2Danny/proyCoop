<?php
  require_once 'vendor/autoload.php';
class RegistrarModel extends Query{
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $passw;
    private $cedula;
    private $email;
    private $estado;
    private $id_permiso;
    private $id;
  
  
    public function __construct(){
       parent::__construct();

    }
    
  

    public function registrarSocios($nombre,$apellido ,$direccion, $telefono, $passw , $cedula, $email,  $estado,  $id_permiso){
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
        $this->id_permiso=6;
        $verificar =  "SELECT * FROM socios WHERE nombresocio = '$this->nombre' AND correo='$this->email' ";
        $existe = $this->select($verificar);
        if(empty($existe)){
          $sql ="INSERT INTO socios(nombresocio, apellidosocio,direccion,telefono, passw, cedula,correo, estado, id_permiso) VALUES(?,?,?,?,?,?,?,?,?)";
          $datos = array($this->nombre, $this->apellido,$this->direccion, $this->telefono, $this->passw, $this->cedula, $this->email,$this->estado, $this->id_permiso);
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


      public function Restablecer_Contra($hash, $email){
        $this->hash = $hash;
        $this->email = $email;
        $verificar =  "SELECT * FROM socios WHERE  correo='$this->email' AND estado = 1";
        $existe = $this->select($verificar);
        if(!empty($existe)){
          $res = "1";
      }else{
        $res = "2";
      }
     return $res;

      }

      public function modificarRegistro($passw, $email){
        $this->passw = $passw;
        $this-> email = $email;
        $sql = "UPDATE socios SET passw = ? WHERE correo = ? ";
        $datos = array($this->passw, $this->email);
        $data = $this->save($sql, $datos);
        if($data == 1){
          $res = "modificado";
        }else{
          $res = "error";
        }
        return $res;

      }

}
  

  


    ?>