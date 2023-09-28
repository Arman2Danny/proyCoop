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

    public function verificarPermisos($id_socio, $nombre){
        $sql = "SELECT p.idpermiso, p.permiso , d.id, d.id_socio, d.id_permiso FROM permisos p INNER JOIN detalle_permisos  d ON p.idpermiso = d.id_permiso  WHERE d.id_socio = $id_socio AND p.permiso = '$nombre'";
        $data = $this->selectAll($sql);
        return $data;
      
       }
}

?>