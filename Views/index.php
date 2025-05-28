<?php include_once 'Views/template/header-principal.php'; ?>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/images/ani.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-center">
                                <h1> BIENVENIDO A <a rel="sponsored" class="text-success fs-1" href="https://www.matamoros.tecnm.mx/" target="_blank">NOVA SHOP!!</a>
                                    Descubre miles de productos al mejor precio. Compra y vende de forma segura desde la comodidad de tu hogar.</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/images/hotsale.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left text-center">
                                <h3 class="h1">¡Hot Sale en Nova Shop!</h3>
                                <h1 class="h2">En esta temporada de Hot Sale, en Nova Shop te traemos descuentos espectaculares que no podrás dejar pasar.
                                    Encuentra tus productos favoritos con precios rebajados, promociones especiales y ofertas limitadas solo por unos días.</h1>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/images/sarten2.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left text-center">
                                <h1 class="h1">Encuentra lo que necesitas en electrónica, hogar, tecnología, mascotas, accesorios y mucho más.
                                    Fácil, rápido y confiable. ¡Empieza a explorar ahora!</h1>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">CATEGORIAS</h1>
                <p>
                    Encuentra lo que necesitas de forma rápida y sencilla. 
                    Tenemos una amplia variedad de productos organizados por categoría para facilitar tu búsqueda.
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data['categorias'] as $categoria){ ?>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-3 categoria-container">
                <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria ['id']; ?>"><img src="<?php echo $categoria['imagen'];?>" class="categoria-circle"></a>
                <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categoria']; ?></h5>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- End Categories -->


    <!-- Start Featured Product -->
    <section class="bg-light featured-section">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Producto Destacado</h1>
                    <p>
                        Descubre nuestro producto más popular del momento. 
                        Seleccionado por su excelente calidad, diseño y preferencia entre nuestros clientes.
                    </p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['nuevosProductos'] as $producto) {?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>">
                            <img src="<?php echo $producto['imagen']; ?>" class="card-img-top featured-img"  alt="<?php echo $producto['nombre']; ?>">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$<?php echo MONEDA . ' ' . $producto['precio']; ?></li>
                            </ul>
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="h2 text-decoration-none text-dark"><?php echo $producto['nombre']; ?></a>
                            <p class="card-text">
                            <?php echo $producto['descripcion']; ?> 
                            </p>
                            <!-- <p class="text-muted">Reviews (24)</p>-->
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->
<?php include_once 'Views/template/footer-principal.php'; ?>

    
</body>

</html>