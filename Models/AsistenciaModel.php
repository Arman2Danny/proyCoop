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
 }
?>