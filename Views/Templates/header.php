<?php

include_once "Models/menuModel.php";
include_once "Controllers/Socios.php";

$menu = new menuModel();
$mx = $menu->get_Menu();
if(isset($_SESSION['rol'])){
  switch($_SESSION['rol']){
    case 1:
        $admin = $_SESSION['nombre'];
    }
}
       

?>
<!--inicio del header-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel de Administracion</title>
        <link href="<?php echo base_url; ?>Assets/style.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/datatables.min.css" rel="stylesheet" />
        <link href="<?php echo base_url;?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url;?>Assets/css/estilo .css" rel="stylesheet" />
        <link href="<?php echo base_url;?>Assets/css/sweetalert2.min.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.js" crossorigin="anonymous"></script>
      
    </head>
    <body class="sb-nav-fixed">
        
        <nav class="sb-topnav navbar navbar-expand-lg bg-light border-3 border-bottom border-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 " href="<?php echo base_url; ?>Escritorio"><img src="<?php echo base_url ?>Assets/ico/taxi.png " >Coop. Taxis <span class="badge bg-warning text-black">Cardenal de la torre</span></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 mx-2 " data-toggle="collapse" id="sidebarToggle"  href=""><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
          
            <!-- Navbar-->
        
            <ul class="navbar-nav ms-auto  ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                 
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Perfil</a></li>
                        
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php //echo base_url;?>Socios/salir">Cerrar Session</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
       
         <!-- fin navbar -->                   

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light border-primary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu bg-primary " style="--bs-bg-opacity: .7">
                        <div class="nav mt-3  p-2">
                       <!--inicio de menu dashboard-->
                       
                                    <a class="nav-link" href="<?php echo base_url; ?>Escritorio"><i class="fa-solid fa-gauge-high mx-2"></i> <h5>Escritorio</h5> </a>
                       
                       <!--fin dashboard-->

                           
                     <a href="#" style="text-decoration: none">  
                     <i class="fa-solid fa-square-h mx-2"></i> <span class="badge bg-warning">Menu Principal</span> 
                              
                            </a>
                            <div >
                         <!--menu dinamico  inicio     -->
                        <?php  
                        for($i=0;$i<sizeof($mx);$i++){
                        ?>
                                <nav class="sb-sidenav-menu-nested hover-overlay" id="nav" style="background: orange;">
                                    <a class="nav-link bg-light border-3 mt-1 rounded-3 "  id="menumx" href="<?php echo base_url;
                                     echo $mx[$i]['mruta']; ?>"><i class="<?php echo $mx[$i]['micon']; ?>" aria-hidden="true"></i><?php echo $mx[$i]['mnombre'] ?></a>
                                   
                                </nav>
                             <?php } ?>   
                            </div>

                         <!--fin menu dinamico--> 

                            <!--segundo nav-->

                          <!--  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">  
                    <i class="fas fa-taxi mx-2"></i>Vehiculos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=""><i class="fa fa-taxi mx-2"></i>Vehiculos</a>
                                </nav>
                            </div>-->
                </nav>      
            </div>

            <!--fin segundo nav-->
            


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-3">
                     
                        
                       
                  
                



