<?php
require_once "Config/App/Conexion.php";
  class MenuModel extends Query{
  
    public function __construct(){
        parent::__construct();
 
     }
    public function get_Menu(){
     $conexion = new Conexion();
     $conn = $conexion->connect();
     $sql = "SELECT * FROM menu WHERE estado =1 ";
     $sql =$conn->prepare($sql);
     $sql->execute();
     return $resutlado = $sql->fetchAll();
      
  
      }
  }

?>