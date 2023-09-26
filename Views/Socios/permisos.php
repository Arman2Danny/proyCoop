<?php
include_once "Views/Templates/header.php";

?>
<div class="col-md-6 mx-auto">
    <div class="card">
        <div class="card-header text-center text-white bg-primary ">
               <h3>Asignar Permisos</h3> 
           
        </div>
        <div class="card-body">
            <form id="formulario">
                <div class="row">
        <?php foreach($data as $row){  ?>
            <div class="col-md-4 text-center text-capitalize p-2">
            <label for=""> <?php echo $row['permiso'];?>  </label>
        <input type="checkbox" >
        </div>
        <?php   }?>
        </div>
        <button type="button" class="btn btn-primary">Asignar Permisos</button>
        </form>
        </div>
    </div>

</div>

<?php
include_once "Views/Templates/footer.php";

?>