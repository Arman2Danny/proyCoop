<?php
require_once "Views/Templates/header.php"
?>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Listado de Asistencia de Socios</h2></li>
</ol>


<button class="btn btn-info mb-3" type="button" onclick="addAsistencia();"><i class="fas fa-save"></i> Grabar </button>

<!--inicio de formulario de asistencia-->
<form  class="border p-2 rounded-3 bg-light">
 
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
              </div>
              </div>
       </div>
</div>  
  </form>
<!--fin de formulario-->

<div id="displayDataTableAsistencia" class="mt-3 bg-light p-3 "></div> 
<?php require_once "Views/Templates/footer.php"?>