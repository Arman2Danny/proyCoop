<?php
include_once "Views/Templates/header.php";
?>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Registrar Eventos</h2></li>
</ol>
<button class="btn btn-info mb-3" type="button" onclick="frmEvento();"><i class="fa fa-plus" aria-hidden="true"> Agregar</i></button>
<!-- mostrar todos los datos de la tabla eventos -->
<table class="table table-light table-hover border  border-white border-1"  style="width: 100%;" id="tablaEvento">
    <thead>
        <tr>
            <th class="text-warning">Id</th>
            <th class="text-warning">Nombre_Evento</th>
            <th class="text-warning">Descripcion</th>
            <th class="text-warning">Fecha</th>
            <th class="text-warning">Hora</th>
            <th class="text-warning">Orden_Dia</th>
            <th></th>
          
        
           
          
            
            
        </tr>
    </thead>
    <tbody>
       
    </tbody>
</table>
<div id="nuevo_evento" class="modal fade mt-5" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Evento</h5>
                <button type="button" class="btn-close bg-danger " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form method="POST"  id="frmEvento">
                <input type="hidden" name="idevento" id="idevento" >
                <div class="form-group">
                    <i class="fa fa-calendar"></i>
                    <label for="nombre_evento">Nombre_Evento</label>
                    <input id="nombre_evento" class="form-control border border-info" type="text" name="nombre_evento">
                </div>

               
                    <i class="fa fa-book"></i>
                    <label for="descripcion">Descripcion</label>
                    <div class="form-group">
                    <textarea name="descripcion" id="descripcion" cols="50" rows="10"></textarea>
                </div>

                <div class="form-group">
                
                <i class="fa fa-calendar"></i>
                    <label for="fecha">Fecha</label>
                    <input id="fecha" class="form-control border border-info" type="date" name="fecha">
                </div>

                <div class="form-group">
                <i class="fa fa-clock" aria-hidden="true"></i>
                    <label for="hora">Hora</label>
                    <input id="hora" class="form-control border border-info" type="time" name="hora">
                </div>

                
              
               
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <label for="orden">Orden_Dia</label>
                    <div class="form-group">
                   <textarea name="orden" id="orden" cols="50" rows="10"></textarea>
                </div>
               <button class="btn btn-info mt-4" type="button" onclick="registrarEvento(event);" id="btnAccion"><i class="fa fa-registguered" aria-hidden="true"></i>egistrar</button>
               <button class="btn btn-danger mt-4" type="button" data-bs-dismiss="modal">Cancelar</button>

            
             
               </form>
            </div>
        </div>
    </div>
</div>
<?php include_once "Views/Templates/footer.php";
?>