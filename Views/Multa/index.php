<?php require_once "Views/Templates/header.php"?>

<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Cobro Multas</h2></li>
</ol>
<div class="container">
<div class="row align-items-start">
    <div class="col">
     <input type="date" name="fech_inicio" id="fecha_inicio" class="form-control">
     <div id="emailHelp" class="form-text ">Fecha_Inicio</div>
    </div>
    <div class="col">
      Una de tres columnas
    </div>
    <div class="col">
      Una de tres columnas
    </div>
  </div>
</div>
<div class="card-footer bg-transparent mt-3 ">
  <div id="displayDataTableMulta" class="mb-5"></div>
  </div>
<?php require_once "Views/Templates/footer.php"?>