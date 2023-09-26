<?php
    class RolesModel extends Query{
        private $tipopermiso;
        private $tiposocio;
        public function __construct(){
            parent::__construct();
        }

        public function getPermisos(){
            $sql="SELECT * FROM roles ";
            $data= $this->selectAll($sql);
            return $data;

        }

        public function registrarRoles($tiposocio){
            $this->tiposocio = $tiposocio;
           
            $verificar =  "SELECT * FROM roles WHERE tiposocio = '$this->tiposocio' ";
            $existe = $this->select($verificar);
            if(empty($existe)){
              $sql ="INSERT INTO roles(tiposocio) VALUES(?)";
              $datos = array($this->tiposocio);
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

          //modificar roles
 public function modificarRoles($tiposocio, $tipopermiso){
    $this->tiposocio = $tiposocio;
    $this->tipopermiso = $tipopermiso;
  
   
      $sql ="UPDATE roles SET tiposocio = ? WHERE tipopermiso = ? ";
      $datos = array($this->tiposocio, $this->tipopermiso);
      $data=$this->save($sql, $datos);
      if($data == 1){
        $res= "modificado";
      }else{
        $res= "error";
      }
      return $res;
  
  }
  
  
    
  //editar roles
   public function rolesEditar($id){
    $sql = "SELECT * FROM roles WHERE tipopermiso = $id";
    $data = $this->select($sql);
    return $data;
  
   }

   //eliminar roles
 public function eliminarRoles($id){
    $this->id = $id;
    $sql = "DELETE FROM roles WHERE tipopermiso = ?";
    $datos = array($this->id);
    $data = $this->save($sql,$datos);
    return $data;
  
  
   }
   //total roles
   public function totalRoles(){
    $sql="SELECT * FROM roles  ";
    $data= $this->selectTotal($sql);
    return $data;
  }
  
  

    }

?>