<?php

class MultaModel extends Query{
    public function __construct(){
        parent::__construct();
    }

    public function getMultaLista($fechaInicio, $fechaFinal){
        $this->fechaInicio = $fechaInicio;
        $this->fechaFinal = $fechaFinal;
        $sql = "SELECT * from socios, evento , asistenciasocio WHERE fecha_asist >='$this->fechaInicio' || fecha_asist <= '$this->fechaFinal' AND  idsocio = idasistencia || idevento = id_evento";
        $data = $this->selectAll($sql);
        return $data;
    }
}

?>