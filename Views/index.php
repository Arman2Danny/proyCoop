<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iniciar Sesion</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/login.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.js"></script>
        <style>
            .invalid{
                border-color: red;
            }
            .error{
                color:red;
            }
        </style>
    </head>
    <body class="bg-light">
       
        <div id="layoutAuthentication " class="">
            <div id="layoutAuthentication_content" class="">
                <main class=" d-flex justify-content-center align-items-center mt-5  ">
                    <div class="container mt-5  p-3 " >
                        <div class="row  justify-content-center  ">
                            <div class="col-lg-7">
                                <div class="card  border-0 rounded-lg" >
                                    <div class="card-header "><h3 class="text-center my-4" style="color: black;">Inicio de Sesion</h3></div>
                                    <div class="card-body">
                                        <form id="frmLogin" >
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" type="email" placeholder="name@example.com" name="email" />
                                                <label for="inputEmail"><i class="fa-solid fa-envelope"></i> Email </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" placeholder="Password" name="password"/>
                                                <label for="inputPassword"><i class="fas fa-key"></i> Contraseña</label>
                                            </div>
                                            <div class="alert alert-danger text-center d-none" role="alert" id="alert">
                                                
                                                </div>
                                           
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              ¿Has olvidado tu contraseña?
                                            </button>
                                             
                                                <button class="btn btn-primary" type="submit" onclick="frmLogin(event);"><i class="fa fa-sign-in" ></i> Acceder</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3 ">
                                        <div class="small"><a href="<?php echo base_url; ?>Registrar" >Necesito una cuenta? Registrarse!</a></div>
                                    </div>
                                    
                                        <!--LLAMAR MODAL OLVIDASTE CONTRASEÑA-->
                                        <div class="modal fade bg-light" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                            <div class="modal-dialog ">
                                             <div class="modal-content ">
                                             <div class="modal-header">
                                      <h5 class="modal-title  ">Recuperar Contraseña</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    
                                </div>
                      <div class="modal-body">
                      <p class="text-justify "><b>Ingrese el email registrado en el usuario para restablecer su contraseña</b></p>
                         <div class="form-group">
                            <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Escribir Email">
                         </div>
                     </div>
                            <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="restablecer();"><i class="fa-solid fa-floppy-disk"></i></button>           
                        <!--  <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-right-from-bracket"></i></button>-->
                        <div id="error"></div>
                        
                 </div>
                </div>
             </div>
            </div>

                                        <!--FIN MODAL OLVIDASTE CONTRASEÑA-->


                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        </div>
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.5.1.min.js" ></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script>
             const base_url= "<?php echo base_url; ?>";

        </script>
          <script src="<?php echo base_url; ?>Assets/js/registrarse.js"></script>
          <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
        
          <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    </body>
</html>
