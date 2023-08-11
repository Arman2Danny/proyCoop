
 <!DOCTYPE html>
 <html lang="en">
     <head>
         <meta charset="utf-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge" />
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
         <meta name="description" content="" />
         <meta name="author" content="" />
         <title>Recuperar Contraseña</title>
         <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
         <link href="<?php echo base_url; ?>Assets/css/login.css" rel="stylesheet" />
         <script src="<?php echo base_url; ?>Assets/js/all.js"></script>

         <body class="bg-light"> 
         <?php 
           if(isset($_GET['email'])){
            $email = $_GET['email'];
           }
            ?>
        <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center min-vh-100">
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="mb-4 text-center">
                                <h5>Restablecer su Contraseña</h5>
                                <p class="mb-2">Ingrese los datos de la Nueva contraseña</p>
         </div>
        <form action="">

        <div class="form-floating mb-3">
                                                <input class="form-control" id="email" type="email" name="email" value="<?php echo $email; ?> " />
                                                <label for="inputEmail"><i class="fa-solid fa-envelope"></i> Verificar Email</label>
                                            </div>

        <div class="form-floating mb-3">
         <input class="form-control" id="password" type="password" placeholder="Password" name="password"/>
        <label for="inputPassword"><i class="fas fa-key"></i> Contraseña</label>
        </div>

     

             <div class="form-floating mb-3">
                                                <input class="form-control" id="conpassword" type="password" placeholder="Confirmar Password" name="conpassword"/>
                                                <label for="inputPassword"><i class="fa-solid fa-lock"></i> Verificar Contraseña</label>
                                            </div>

                                            <div class="d-grid mb-3">
                                            <button type="submit" class = "btn btn-primary" onclick="recuperarcontra(event);"><i class="fa fa-sign-in" ></i> Acceder

                                            </button>

                                            </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>


        </div>
         
         
         
         
         <script src="<?php echo base_url; ?>Assets/js/jquery-3.5.1.min.js" ></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script>
             const base_url= "<?php echo base_url; ?>";

        </script>
          <script src="<?php echo base_url; ?>Assets/js/recuperarcontra.js"></script>
          <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
        
          <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    </body>
</html>