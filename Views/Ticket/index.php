<?php
include_once("Views/Templates/header.php");
?>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><h2>Cobro de Tickets</h2></li>
</ol>
<button class="btn btn-info mb-3" type="button" onclick="frmTicket();"><i class="fa fa-plus" aria-hidden="true"> Agregar</i></button>
<div id="displayDataTable" class="mt-2"></div>
<!--formulario registrar Ticket-->
<div id="nuevo_ticket" class="modal fade mt-5" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nuevo Ticket</h5>
                <button type="button" class="btn-close bg-danger " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form method="POST"  id="frmTicket">
                <input type="hidden" name="idticket" id="idticket" >
                <div class="form-group">
                <i class="fa fa-book" aria-hidden="true"></i>
                    <label for="ticket">Numero_Ticket</label>
                    <input id="ticket" class="form-control border border-info" type="text" name="ticket">
                </div>

                <div class="form-group">
                <i class="fa fa-users" aria-hidden="true"></i>
                    <label for="nombre">Nombre_Socio</label>
                   <select name="nombre" id="nombre" class="form-select">
                    <option selected disabled>Seleccionar</option>
                    <?php foreach($data['ticket'] as $row){  ?>
                        <option value="<?php echo $row['idsocio'] ?>"><?php echo $row['nombresocio'];  ?></option>

                     <?php } ?> 
                   </select>
                </div>

                <div class="form-group">
                <i class="fa fa-user" aria-hidden="true"></i>
                    <label for="chasis">Apellido_Socio</label>
                    <input id="apellido" class="form-control border border-info" type="text" name="apellido">
                </div>
                
                <div class="form-group">
                <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <label for="valor">Valor</label>
                    <input id="valor" class="form-control border border-info" type="text" name="valor">
                </div>


                <div class="form-group">  
                <i class="fa fa-book"></i>
                    <label for="detalle">Detalle</label>
                    <textarea name="detalle" id="detalle" cols="30" rows="5" class="form-control border border-info"></textarea>
                </div>

                
                
                <div class="form-group">
                <i class="fas fa-calendar"></i>
                <label for="fecha">Fecha</label>
                    <input id="fecha" class="form-control border border-info" type="date" name="fecha">
                    </div>

              
              
               <button class="btn btn-info mt-4" type="button" onclick="registrarTicket(event);" id="btnAccion"><i class="fa fa-registered" aria-hidden="true"></i>egistrar</button>
               <button class="btn btn-danger mt-4" type="button" data-bs-dismiss="modal">Cancelar</button>

            
             
               </form>
            </div>
        </div>
    </div>
</div>

<!--fin formulario registro ticket-->

<?php
include_once("Views/Templates/footer.php");
?>