<?php
include_once "Views/Templates/header.php";

?>
<div class="col-md-6 mx-auto">
    <div class="card">
        <div class="card-header text-center text-white bg-primary ">
               <h3>Asignar Permisos</h3> 
           
        </div>
        <div class="card-body">
            <form id="formulario" onsubmit="registrarPermisos(event)">
                <div class="row">
        <?php foreach($data['datos'] as $row){  ?>
            <div class="col-md-4 text-center text-capitalize p-2">
            <label for=""> <?php echo $row['permiso'];?>  </label>
        <input type="checkbox" name="permisos[]" value=" <?php  echo $row['idpermiso']?> "   <?php echo isset($data['asignados'][$row['idpermiso']]) ? 'checked': '';  ?> >
        </div>
        <?php   }?>
        <input type="hidden" name="id_socio" value="<?php  echo $data['id_socio']; ?>">
        </div>
          <div class="d-grid gap-2 mt-2 ">
        <button type="submit" class="btn btn-outline-primary">Asignar Permisos</button>
        <a href=" <?php echo base_url; ?>/Socios " class="btn btn-outline-danger">Cancelar</a>
        </form>
        </div>
    </div>

</div>

<?php
include_once "Views/Templates/footer.php";

?>