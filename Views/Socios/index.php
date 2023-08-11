<?php
include_once "Views/Templates/header.php";

?>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Socios</h2></li>
</ol>
<button class="btn btn-info mb-3" type="button" onclick="frmSocio();"><i class="fa fa-plus" aria-hidden="true"> Agregar</i></button>
<!-- mostrar todos los datos de la tabla permisos -->
<table class="table  table-hover table-light " style="width: 100%" id="tblSocios">
    <thead>
        <tr>
            <th class="text-primary">Id</th>
            <th class="text-primary">Nombre_Socios</th>
            <th class="text-primary">Apellido_Socios</th>
            <th class="text-primary">Direccion</th>
            <th class="text-primary">Telefono</th>
            <th class="text-primary">Email</th>
            <th class="text-primary">Estado</th>
            <th class="text-primary">Rol</th>
           
            <th></th>
            
            
        </tr>
    </thead>
    <tbody>
       
    </tbody>
</table>
<div id="nuevo_socio" class="modal fade mt-5" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Socio</h5>
                <button type="button" class="btn-close bg-danger " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form method="POST"  id="frmSocio">
                <input type="hidden" name="idsocio" id="idsocio" >
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <label for="nombre">Nombre_Socio</label>
                    <input id="nombre" class="form-control border border-info" type="text" name="nombre">
                </div>

                <div class="form-group">
                    <i class="fa fa-users"></i>
                    <label for="apellido">Apellido_Socio</label>
                    <input id="apellido" class="form-control border border-info" type="text" name="apellido">
                </div>
                <div class="form-group">
                
                <i class="fa fa-id-card"></i>
                    <label for="direccion">Direccion</label>
                    <input id="direccion" class="form-control border border-info" type="text" name="direccion">
                </div>
                <div class="form-group">
                
                <i class="fa fa-id-card"></i>
                    <label for="telefono">Telefono</label>
                    <input id="telefono" class="form-control border border-info" type="text" name="telefono">
                </div>

                <div class="form-group">
                
                <i class="fa fa-key"></i>
                    <label for="password">Contraseña</label>
                    <input id="password" class="form-control border border-info" type="password" name="password">
                </div>
                <div class="form-group">
                
                <i class="fa fa-id-card"></i>
                    <label for="cedula">Cedula</label>
                    <input id="cedula" class="form-control border border-info" type="text" name="cedula">
                </div>
                

                <div class="form-group">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                    <label for="email">Correo_Electronico</label>
                    <input id="email" class="form-control border border-info" type="email" name="email">
                </div>

                <div class="form-group d-none" id="oculto">
                <i class="fa fa-bullseye" aria-hidden="true"></i>
                <label for="estado">Estado</label>
                    <input id="estado" class="form-control border border-info" type="hidden" name="estado">
                    </div>
              
                <div class="form-group">
                    <i class="fa fa-rocket" aria-hidden="true"></i>
                    <label for="permiso">Roles</label>
                    <select id="permiso" class="form-control border border-info" name="permiso">
                        <?php foreach($data['roles'] as $row){  ?>
                        <option value="<?php echo $row['tipopermiso'] ?>"><?php echo $row['tiposocio'];  ?></option>

                     <?php } ?>   
                    </select>
                </div>
               <button class="btn btn-info mt-4" type="button" onclick="registrarSocio(event);" id="btnAccion"><i class="fa fa-registered" aria-hidden="true"></i>egistrar</button>
               <button class="btn btn-danger mt-4" type="button" data-bs-dismiss="modal">Cancelar</button>

            
             
               </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once "Views/Templates/footer.php";
?>