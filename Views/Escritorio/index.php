<?php
include_once "Views/Templates/header.php";
include_once "Models/SociosModel.php";
include_once "Models/vehiculosModel.php";
  $ts = new SociosModel();
  $totalsocios = $ts->totalSocios();
  $tv = new vehiculosModel();
  $totalvehi = $tv->totalVehiculos();
?>
   <div class="container">
    <div class="row">
        <!--primer columna de card-->
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card text-primary mb-4">
            <div class="card-body">
                <i class="fas fa-user fa-2x"></i> Socios
                <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary">
                    <i class="fas fa-user"></i>
                    <?php echo $totalsocios ?>
                    <span class="visually-hidden"></span>
                </span>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-primary">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Socios">Ver detalle</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <!--segunda columna de card-->
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card text-success mb-4">
            <div class="card-body">
                <i class="fas fa-users fa-2x"></i> Clientes
                <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-success">
                    <i class="fas fa-users"></i>
                    <?php  ?>
                    <span class="visually-hidden"></span>
                </span>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-success">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Clientes">Ver detalle</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <!--tercera columna-->
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card text-danger mb-4">
            <div class="card-body">
                <i class="fas fa-taxi fa-2x"></i> Vehiculos
                <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">
                    <i class="fab fa-product-hunt"></i>
                    <?php echo $totalvehi ?>
                    <span class="visually-hidden"></span>
                </span>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-danger">
                <a class="small text-white stretched-link" href="<?php  ?>Vehiculos">Ver detalle</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <!--cuarta columna-->
    <div class="col-xl-3 col-md-3 col-sm-6">
        <div class="card text-warning mb-4">
            <div class="card-body"><i class="fas fa-tags fa-2x"></i> Tipos
                <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-warning">
                    <i class="fas fa-tag"></i>
                    <?php  ?>
                    <span class="visually-hidden"></span>
                </span>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-warning">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Tipos">Ver detalle</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    </div>
    <!--carrusel-->
    <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
    <div class="carousel-inner mt-5">
        <div class="carousel-item active">
            <img src="<?php echo base_url; ?>Assets/img/1.jpg" class="d-block w-100 h-350" alt="..." style="height: 350px;">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url; ?>Assets/img/2.png" class="d-block w-100 " alt="..." style="height: 350px;">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url; ?>Assets/img/3.png" class="d-block w-100 " alt="..." style="height: 350px;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
   </div>
<?php
 include_once "Views/Templates/footer.php";
?>