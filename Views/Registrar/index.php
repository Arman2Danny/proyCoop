<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/estilos.css">
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url; ?>Assets/js/all.js"></script>
 
</head>
<body>

    <section class="d-flex justify-content-center p-2  ">
    <div class="card col-md-5 p-2 ">
        <div class="mb-2 text-center">
            <h4>Registrarse</h4>
        </div>
    <div class="mb-2">
        <form action="" id="frmRegistrar">
            <div class="mb-2">
            <label for="nombre" class="form-label "><i class="fa-solid fa-user"></i> Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe tu Nombre">
            </div>

            <div class="mb-2">
                <label for="apellido" class="form-label  "><i class="fa-solid fa-users"></i> Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Escribe tu Apellido">
            </div>

            <div class="mb-2">
                <label for="direccion" class="form-label  "><i class="fa-solid fa-location-dot"></i> Direccion:</label>
                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Escribe tu Direccion">
            </div>

            <div class="mb-2">
                <label for="telefono" class="form-label "><i class="fa fa-mobile"></i> Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Escribe tu Telefono">
            </div>

            <div class="mb-2">
                <label for="password" class="form-label "><i class="fa-solid fa-key"></i> Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Escribe tu Password">
            </div>

            <div class="mb-2">
                <label for="cedula" class="form-label "><i class="fa fa-credit-card"></i> Cedula:</label>
                <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Escribe tu numero de cedula">
            </div>

            <div class="mb-2">
                <label for="correo" class="form-label "><i class="fa-solid fa-envelope"></i> Email:</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Escribe tu Email">
            </div>

            <div class="mb-1">
            <button class="btn btn-info w-25 p-1 " type="button" onclick="registrarSocio(event);" id="btnAccion"><i class="fa fa-registered" aria-hidden="true"></i>egistrarse</button>
            </div>
        </form>
    </div>

    </div>

    </section>

    <!--
    <div class="container  mt-5  "  >
       <div class="formulario  d-flex justify-content-center  align-items-center   auth-sidebar  ">
           
         <form class="row bg-dark w-75 p-3 rounded-3" id="frmRegistrar" style="margin-top: 130px;" >
          
           <div class="justify-content-between d-flex p-2 bg-dark">
           <h3 class="text-white"> REGISTRARSE</h3>
           
            <a class="btn btn-dark " href="<?php //echo base_url;?>"><i class="fa fa-reply" aria-hidden="true"></i></a>
           </div>
            <div class="col-6">
                <label for="nombre" class="form-label text-white"><i class="fa-solid fa-user"></i> Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe tu Nombre">
            </div>

            <div class="col-6">
                <label for="apellido" class="form-label text-white"><i class="fa-solid fa-users"></i> Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Escribe tu Apellido">
            </div>
                <div class="row">
            <div class="col-6">
                <label for="password" class="form-label text-white"><i class="fa-solid fa-key"></i> Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Escribe tu Password">
            </div>
            <div class="col-6">
                <label for="correo" class="form-label text-white"><i class="fa-solid fa-envelope"></i> Email:</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Escribe tu Email">
            </div>
            </div>
                 
           <div class="d-flex mx-auto">
          
            <button class="btn btn-info w-25 p-1 text-white" type="button" onclick="registrarSocio(event);" id="btnAccion"><i class="fa fa-registered" aria-hidden="true"></i>egistrarse</button>
         
          </form>
          </div>
    </div>
    -->
<script src="<?php echo base_url; ?>Assets/js/jquery-3.6.3.min.js" ></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
    <script>
             const base_url= "<?php echo base_url; ?>";

        </script>
       
         <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
         <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="<?php echo base_url; ?>Assets/js/registrarse.js"></script>
</body>
</html>
