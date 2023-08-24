<?php require_once "Views/Templates/header.php"?>


<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Asistencia de Socios</h2></li>
</ol>
<div>
<input type="date" name="fecha" id="fecha" required> 

<button class="btn btn-primary " type="button" onclick="frmAsistencia();"><i class="fa fa-plus" aria-hidden="true"> </i> Agregar</button>
</div>
<div class="card-footer bg-transparent mt-2 ">
  <div id="displayDataTableAsist" class="mb-5"></div>
  </div>

<?php require_once "Views/Templates/footer.php"?>