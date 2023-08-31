<?php require_once "Views/Templates/header.php"?>

<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Cobro Multas</h2></li>
</ol>
<div class="container">
<div class="row align-items-start">
    <div class="col">
     <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
     <div  class="form-text ">Fecha_Inicio</div>
    </div>
    <div class="col">
       <input type="date" name="fecha_final" id="fecha_final" class="form-control">
     <div  class="form-text ">Fecha_Final</div>
    </div>
    <div class="col">
    <button class="btn btn-warning btn-lg mx-2 " type="button" id="buscar"><i class="fa fa-search" aria-hidden="true"> </i> Buscar</button>
    </div>
  </div>
</div>
<div class="card-footer bg-transparent mt-3 ">
  <div id="displayDataTableMulta" class="mb-5"></div>
  </div>
  <button type="button" class="btn btn-dark" style= "display: none;" id="refresh" onclick ="refrescar();">Refrescar</button>

  <div id="nuevo_asistencia" class="modal fade mt-5" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog " role="document">
  <div class="modal-content">
  <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Pago Multa</h5>
                <button type="button" class="btn-close bg-danger " data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

</div>
</div>
</div>
<?php require_once "Views/Templates/footer.php"?>