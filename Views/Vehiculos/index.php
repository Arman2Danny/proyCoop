<?php require_once "Views/Templates/header.php"?>


<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Vehiculos</h2></li>
</ol>


<button class="btn btn-info mb-3" type="button" onclick="frmVehiculo();"><i class="fa fa-plus" aria-hidden="true"> Agregar</i></button>
<!-- mostrar todos los datos de la tabla Vehiculos -->
<table class="table table-light table-hover" style="width: 100%" id="tblVehiculo" >
    <thead class="thead-dark">
        <tr>
            <th class="text-primary">Id</th>
            <th class="text-primary">Num_Unidad</th>
            <th class="text-primary">Nombre_Socio</th>
            <th class="text-primary">Placa</th>
            <th class="text-primary">Modelo</th>
            <th class="text-primary">Num_habilitacion</th>
            <th> </th>


        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<!--formulario registrar vehiculo-->
<div id="nuevo_vehiculo" class="modal fade mt-5" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Vehiculo</h5>
                <button type="button" class="btn-close bg-danger " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form method="POST"  id="frmVehiculo">
                <input type="hidden" name="idvehiculo" id="idvehiculo" >
                <div class="form-group">
                <i class="fa fa-universal-access" aria-hidden="true"></i>
                    <label for="unidad">Numero_Unidad</label>
                    <input id="unidad" class="form-control border border-info" type="text" name="unidad">
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

<!--fin formulario registro vehiculo-->

<?php require_once "Views/Templates/footer.php"?>