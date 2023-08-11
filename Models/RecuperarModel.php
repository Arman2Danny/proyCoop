<?php
  require_once 'vendor/autoload.php';
class RecuperarModel extends Query{
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

    public function modificarContra($passw, $email){
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