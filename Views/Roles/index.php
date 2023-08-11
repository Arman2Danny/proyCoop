<?php require_once "Views/Templates/header.php"?>


<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Roles</h2></li>
</ol>


<button class="btn btn-info mb-3" type="button" onclick="frmRoles();"><i class="fa fa-plus" aria-hidden="true"> Agregar</i></button>
<!-- mostrar todos los datos de la tabla Vehiculos -->
<table class="table table-light table-hover" style="width: 100%" id="tblRoles" >
    <thead>
        <tr>
            <th class="text-warning">Id_Permiso</th>
            <th class="text-warning">Tipo_Socio</th>  
            <th> </th>


        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!--inicio de formulario Permisos-->
<div id="nuevo_roles" class="modal fade mt-5" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Permiso</h5>
                <button type="button" class="btn-close bg-danger " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form method="POST"  id="frmRoles">
                <input type="hidden" name="tipopermiso" id="tipopermiso" >
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <label for="tiposocio">Tipo_Socio</label>
                    <input id="tiposocio" class="form-control border border-info" type="text" name="tiposocio">
                </div>

                
              
          
               <button class="btn btn-info mt-4" type="button" onclick="registrarRoles(event);" id="btnAccion"><i class="fa fa-registered" aria-hidden="true"></i>egistrar</button>
               <button class="btn btn-danger mt-4" type="button" data-bs-dismiss="modal">Cancelar</button>

            
             
               </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "Views/Templates/footer.php"?>