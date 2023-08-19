<?php
require_once "Views/Templates/header.php"
?>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Listado de Asistencia de Socios</h2></li>
</ol>




<!--inicio de formulario de asistencia-->
<div class="card border-light mb-1" style="width: 100%">
  <div class="card-header bg-transparent border-light">Datos Socio</div>
  <div class="card-body text-success">

<form  method="POST"  class="border p-2 rounded-3 bg-light" id="frmAsistencia">
 
  <div class="row mb-4">
        <div class="row">
            <div class="col-4">
                <div class="form-outline">
                    <input type="date" name="fecha" id="fecha" class="form-control border" required>
                    <label class="form-label text-black" for="fecha"><i class="fas fa-calendar-day"></i> Fecha</label>
                </div>
            </div>
      </div>   
            
     
    <div class="row">
        <div class="col-4">
            <div class="form-outline">
              <select  id="nombre" name="nombre" class="form-select border" />
              <option selected disabled>Seleccionar:</option>
              <?php foreach($data['socio'] as $row){  ?>
                        <option value="<?php echo $row['idsocio'] ?>"><?php echo $row['nombresocio'];  ?></option>

                     <?php } ?>
            </select>
             <label class="form-label text-black" for="nombre"><i class="fas fa-users"></i> Nombre_Socio</label>
             </div>
        </div>
        <div class="col-4">
            <div class="form-outline">
              <input type="text" id="apellido" name="apellido" class="form-control border" />
               <label class="form-label text-black" for="apellido"><i class="fab fa-wizards-of-the-coast"></i> Apellido_socio</label>
             </div>
        </div>
   
        
           <div class="col-4">
              <div class="form-outline mb-4">
 
                 <select id="estado" class="form-select " name="estado">
                   <option selected disabled>Seleccionar:</option>
                   <option value="Presente">Presente</option>
                   <option value="Falta">Falta</option>
                    <option value="Justificado">Justificado</option>
                  </select>
                      <label class="form-label text-black" for="estado"><i class="fas fa-tint"></i> Estado</label>
                </div>
            </div>
            </div>
                <div class="row">
            <div class="col-4">
                   <div class="form-outline mb-4">
                     <input type="text" id="multa" name="multa" class="form-control border " />
                      <label class="form-label text-dark" for="multa"><i class="fas fa-money-check-alt"></i> Multa</label>
                   </div>
                  </div>
       
                 <div class="col-4">
                      <div class="form-outline mb-4">
                          <select  id="evento"  name="evento" class="form-select" />
                          <option selected disabled>Seleccionar:</option>
                          <?php foreach($data['evento'] as $row){  ?>
                        <option value="<?php echo $row['idevento'] ?>"><?php echo $row['nombre_evento'];  ?></option>

                     <?php } ?>
                        </select>
                            <label class="form-label text-dark" for="evento"><i class="far fa-calendar-alt"></i> Evento</label>
                        </div>
                    </div>

                    <div class="col-4">
                      

                    <button class="btn btn-info form-control" type="button" onclick="registrarAsistencia(event);" id="btnAccion"><i class="fa fa-registered" aria-hidden="true"></i>egistrar</button>
                           
                    </div>
              </div>
              </div>
       </div>
</div>  
  </form>
 
<!--fin de formulario-->


 
   
  </div>
  <div class="card-footer bg-transparent ">
  <div id="displayDataTableAsist" class="mb-5"></div>
  </div>

</div>

<div class="modal fade" id="editarModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" >

<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title text-white" id="exampleModalToggleLabel2">Editar Asistencias</h5>
        <button type="button" class="btn-close bg-warning" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      </div>
      </div>  
</div>


<?php require_once "Views/Templates/footer.php"?>