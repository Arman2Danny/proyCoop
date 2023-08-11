<?php
 class EscritorioModel extends Query{
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
        $sql="SELECT * FROM permiso ";
        $data= $this->selectAll($sql);
        return $data;
    }

 }
?>