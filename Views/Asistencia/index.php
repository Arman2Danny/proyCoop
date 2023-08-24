<?php require_once "Views/Templates/header.php"?>


<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Asistencia de Socios</h2></li>
</ol>
<div>
<input type="date" name="fecha" id="fecha" form="frmAsistencia" required> 

<button class="btn btn-primary mx-2 " type="button" onclick="frmAsistencia();"><i class="fa fa-plus" aria-hidden="true"> </i> Agregar</button>
<span class="badge bg-warning mx-3" id="badge">llene el campo fecha</span>
</div>
<div class="card-footer bg-transparent mt-3 ">
  <div id="displayDataTableAsist" class="mb-5"></div>
  </div>

  <!-- formulario modal de Asistencia inicio-->

  <div id="nuevo_asistencia" class="modal fade mt-5" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog " role="document">
  <div class="modal-content">
              <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nueva Asistencia</h5>
                <button type="button" class="btn-close bg-danger " data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form method="POST"  id="frmAsistencia">
                <input type="hidden" name="codigoasistencia" id="codigoasistencia" >
                <div class="form-group">
                <i class="fas fa-users"></i>
                    <label for="nombre">Nombre Socio</label>
                    <select  id="nombre" name="nombre" class="form-select border" >
                             <option selected disabled>Seleccionar:</option>
                                 <?php foreach($data['socio'] as $row){  ?>
                                 <option value="<?php echo $row['idsocio'] ?>"><?php echo $row['nombresocio'];  ?></option>

                                 <?php } ?>
                    </select>

                </div>

                <div class="form-group">
                <i class="fa fa-id-card" aria-hidden="true"></i>
                    <label for="placa">Numero_Placa</label>
                    <input id="placa" class="form-control border border-info" type="text" name="placa">
                </div>

                <div class="form-group">
                <i class="fa fa-id-card" aria-hidden="true"></i>
                    <label for="chasis">Numero_Chasis</label>
                    <input id="chasis" class="form-control border border-info" type="text" name="chasis">
                </div>
                
                <div class="form-group">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <label for="marca">Modelo</label>
                    <input id="marca" class="form-control border border-info" type="text" name="marca">
                </div>


                <div class="form-group">  
                <i class="fa fa-calendar"></i>
                    <label for="fecha">Fecha_Fabricacion</label>
                    <input id="fecha" class="form-control border border-info" type="date" name="fecha">
                </div>

                
                
                <div class="form-group">
                <i class="fas fa-id-card"></i>
                <label for="habilitacion">Numero_Habilitacion</label>
                    <input id="habilitacion" class="form-control border border-info" type="text" name="habilitacion">
                    </div>

                    <div class="form-group">
                    <i class="fa fa-rocket" aria-hidden="true"></i>
                    <label for="idsocio">Socio</label>
                    <select id="idsocio" class="form-control border border-info" name="idsocio">
                        <option selected disabled>Seleccionar:</option>
                        <?php foreach($data['vehiculo'] as $row){  ?>
                        <option value="<?php echo $row['idsocio'] ?>"><?php echo $row['nombresocio'];  ?></option>

                     <?php } ?>   
                    </select>
                </div>    
              
              
               <button class="btn btn-info mt-4" type="button" onclick="registrarVehiculo(event);" id="btnAccion"><i class="fa fa-registered" aria-hidden="true"></i>egistrar</button>
               <button class="btn btn-danger mt-4" type="button" data-bs-dismiss="modal">Cancelar</button>

            
             
               </form>
                
              </div>  

  </div>
  </div> 
  </div> 

<?php require_once "Views/Templates/footer.php"?>