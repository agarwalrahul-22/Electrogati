<?= $this->extend("base");?>
<?= $this->section("content");?>

<section id="home">
    <div class="home-container xyzdf" data-aos="zoom-in" data-aos-delay="100">
        <h1 style="font-family: 'Poppins', sans-serif" class="mb-4">Welcome to<br><span>Electrogati</span></h1>
        <img src="<?= base_url() ?>/public/assets/img/1.png" width="300" class="imglogo .d-block .d-block-md">
    </div>
</section>

<!-- search-car based on brand and variant section -->

<div class="container search mb-5">
    <div class="row align-items-center justify-items-center">
        <div class="offset-1 col-10 offset-md-4 col-md-4 w3-white p-3">
            <h2 class="mb-4" style="text-align:center; font-weight:800">FIND YOUR RIGHT CAR</h2>

            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item x" role="presentation">
                    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#login" role="tab"
                        aria-controls="pills-login" aria-selected="true">Buy Car</a>
                </li>
                <li class="nav-item x" role=" presentation">
                    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#register" role="tab"
                        aria-controls="pills-register" aria-selected="false">Rent Car</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="tab-login">
                    <form action="<?= base_url('show-data')?>" method="post">
                        <div class="form-outline">
                            <select class="form-control" id="brand_id" name="brand">
                                <option value="">Select Brand</option>
                                <?php foreach($userdata as $d){?>
                                <option value="<?php echo $d;?>"><?php echo $d;?></option>"
                                <?php }?>
                            </select>
                        </div>

                        <div class="form-outline mt-2">
                            <select class="form-control" id="var_id" name="variant">
                                <option value="">Select Variant</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block mb-4 mt-2"
                            style="background-color:#f82249; color:white;">Search</button>

                    </form>
                </div>
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="tab-register">
                    <form action="<?= base_url('show-rentData')?>" method="post">
                        <div class="form-outline">
                            <select class="form-control" id="rentbrand_id" name="brand">
                                <option value="">Select Brand</option>
                                <?php foreach($userdata as $d){?>
                                <option value="<?php echo $d;?>"><?php echo $d;?></option>"
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-outline mt-2">
                            <select class="form-control" id="rentvar_id" name="variant">
                                <option value="">Select Variant</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block mb-4 mt-2"
                            style="background-color:#f82249; color:white;">Search</button>
                    </form>
                </div>
            </div>
            <!-- Pills content -->
        </div>
    </div>
</div>
<!-- // search-car based on brand and variant section end -->

<!-- //Recently added Rent Section -->
<section id="rentSection">
    <div class="container">
        <h1 style="text-align:center">RECENTLY ADDED FOR RENT</h1>
        <div class="row mb-4">
            <?php
        $i=count($rent)-1;
        $count=4;
        while($count>0 && $i>=0){
            $count--;
            echo '
            <div class="col-12 col-sm-6 col-md-3">
                <section class="mx-auto my-5" style="max-width: 23rem;">

                        <a class="scrollto"
                        style="text-decoration:none; border-radius:10px;"
                        href="'. base_url('cardetails/index/rent').'/'. $rent[$i]['_id'] .'" >            <div class="card bg-light ">
                        <div class="card-body" style="align-items:center;">
                            <h5 style="text-align:center" class="card-title font-weight-bold mb-2">'. $rent[$i]['brand'].'  </h5>
                            <h5 style="text-align:center" class="card-title font-weight-bold mb-2">'.$rent[$i]['model'].'  '.$rent[$i]['variant'].'</h5>
                            <p style="text-align:center" class="card-text"><i class="far fa-clock pe-2"></i>'. $rent[$i]['created_at'].'</p>
                        </div>
                        <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                        <img  style="width:100%; height:200px; object-fit: cover;"  class="img-fluid" src= "'. base_url('public/uploads').'/'. $rent[$i]['image1'] .'" alt="Card image cap" /></a>
                    </div>
                </section>
            </div>';
            $i--;
        }
        ?>
        </div>
    </div>
    </div>

</section>
<!-- //Recently added Rent Section end -->

<!-- //Recently added Sale Section -->
<section id="saleSection" style="background: #101522" class="mb-5 p-4">
    <div class="container mt-4">
        <h1 style="text-align:center; color:#f82249">RECENTLY ADDED FOR SALE</h1>
        <div class="row">

            <?php
        $i=count($sale)-1;
        $count=4;

        while($count>0 && $i>=0){

            $count--;
            $str="https://localhost/mobility/public/uploads/" . $sale[$i]['image1'] ;
            echo '
            <div class="col-12 col-sm-6 col-md-3">
                    <a class="scrollto"
                    style="text-decoration:none; border-radius:10px;"
                    href="'. base_url('cardetails/index/sales').'/'. $sale[$i]['_id'] .'" >
                    <section class="mx-auto my-5" style="max-width: 23rem;">
                    <div class="card bg-light">
                    <div class="card-body" style="align-items:center;">
                        <h5 style="text-align:center" class="card-title font-weight-bold mb-2">'. $sale[$i]['brand'].'  </h5>
                        <h5 style="text-align:center" class="card-title font-weight-bold mb-2">'.$sale[$i]['model'].'  '.$sale[$i]['variant'].'</h5>
                        <p style="text-align:center" class="card-text"><i class="far fa-clock pe-2"></i>'. $sale[$i]['created_at'].'</p>
                    </div>
                    <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                    <img  style="width:100%; height:200px; object-fit: cover;" class="img-fluid" src= "'. base_url('public/uploads').'/'. $sale[$i]['image1'] .'" alt="Card image cap" />
                    </a>
                    </div>
                </section>
            </div>';
            $i--;
        }
        ?>
        </div>
    </div>
    </div>
</section>
<!-- //Recently added Sale Section end -->

<!-- // Available Brands Section -->
<section class="mb-5">
    <form action="<?= base_url('show-brand')?>" method="post">
        <div class="container" data-aos="fade-up">
            <h1 style="text-align:center">Available Brands</h1>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="suzuki">

                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/wp7482201.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title  ">Suzuki</h5>
                            </div>
                        </div>

                    </button>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="mahindra">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">

                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/Mahindra.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title ">Mahindra</h5>

                            </div>

                        </div>
                    </button>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="tata">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/tata2.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title ">Tata</h5>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="hyundai">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/hyundai3.jpeg" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class=" card-title ">Hyundai</h5>

                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="kia">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/kia.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title  ">Kia</h5>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="mercedes">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/mercedes.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title  ">Mercedes</h5>
                            </div>
                        </div>
                    </button>
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="honda">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/honda.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title  ">Honda</h5>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="audi">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/audi.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title ">Audi</h5>

                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="toyota">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/toyota.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title ">Toyota</h5>

                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="ford">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/ford.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title ">Ford</h5>

                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="mg">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/mg.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title  ">MG</h5>
                            </div>
                        </div>
                    </button>
                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <button style="border:none; all: unset; width:100%;" type="submit" name="brand" value="ford">
                        <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                            <img height="150px" width="200px" style=" object-fit:cover;" class="card-img-top"
                                src="<?= base_url() ?>/public/assets/img/ford.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="font-family: 'Poppins', sans-serif" class="card-title  ">Ford</h5>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- // Available Brands Section end -->

<!-- // City-wise search Section -->
<section style="background:#101522" class="mb-5 p-4">
    <div class="container" data-aos="fade-up">
        <h1 style="text-align:center; color:#f82249;">GET TRUSTED USED CAR NEARBY</h1>
        <form action="<?= base_url('show-city')?>" method="post">
            <div class="row " style="justify-content:center;">
                <div class="form-outline mt-2 col-12 col-md-2">
                    <select class="form-control " id="select_id" name="select">
                        <option value="">Rent/Buy</option>
                        <option value="rent">Rent</option>
                        <option value="sale">Buy</option>
                    </select>
                </div>
                <div class="form-outline mt-2 col-12 col-md-4">
                    <select class="form-control " id="state_id" name="state">
                        <option value="">Select State</option>
                        <?php foreach($stateData as $d){?>
                        <option value="<?php echo $d;?>"><?php echo $d;?></option>"
                        <?php }?>
                    </select>
                </div>
                <div class="form-outline mt-2 col-12 col-md-4 ">
                    <select class="form-control " id="city_id" name="city">
                        <option value="">Select City</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-block mb-4 mt-2 col-4 col-md-1"
                    style="background-color:#f82249; color:white;"><i class="fa fa-search"></i>
                </button>
            </div>

        </form>

        <div class="row">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/delhi.webp" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title  ">Delhi</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/mumbai.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title ">Mumbai</p>

                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-5 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/bengaluru.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title ">Bengaluru</p>

                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-5 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/kolkata.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title ">Kolkata</p>

                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-5 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/chennai.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title  ">Chennai</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-5 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/jaipur.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title  ">Jaipur</p>
                    </div>
                </div>
            </div>


            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/hyderabad.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title  ">Hyderabad</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-2 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/nagpur2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title ">Nagpur</p>

                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-5 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/chandigarh.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title ">Chandigarh</p>

                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-5 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/ahmedabad.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title ">Ahmedabad</p>

                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 ">
                <div class="card mb-2 shadow p-3 mb-5 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/pune.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title  ">Pune</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card mb-2 shadow p-3 mb-5 bg-white rounded">
                    <img height="150px" width="200px" class="card-img-top"
                        src="<?= base_url() ?>/public/assets/img/bhopal.webp" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title  ">Bhopal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // City-wise search Section end -->

<!-- // Promises Section -->
<section class="p-4">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3 shadow p-3 mb-5 bg-white rounded">
                    <img style="width:100%; height:200px; object-fit: cover; class=" card-img-top"
                        src="<?= base_url() ?>/public/assets/img/quality.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title  ">EG Quality Promise</h5>
                        <p class="card-text">We test each car on points, check RTO, finance and service history, and
                            give 12 months warranty!</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 shadow p-3 mb-5 bg-white rounded">
                    <img style="width:100%; height:200px; object-fit: cover;class=" card-img-top"
                        src="<?= base_url() ?>/public/assets/img/financing.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title ">Fast Financing!</h5>
                        <p class="card-text">Zero down-payment,low EMIs, same-day disbursal, minimum documentation -All
                            available instantly.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 shadow p-3 mb-5 bg-white rounded" style="min-height: 378px;">
                    <img style="width:100%; height:200px; object-fit: cover; class=" card-img-top"
                        src="<?= base_url() ?>/public/assets/img/delivery2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title ">Convenience to you</h5>
                        <p class="card-text">From home-delivering your car to handeling all the paperwork.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 shadow p-3 mb-5 bg-white rounded">
                    <img style="width:100%; height:200px; object-fit: cover; class=" card-img-top"
                        src="<?= base_url() ?>/public/assets/img/return.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title  ">7-Day 100% refund</h5>
                        <p class="card-text">If you don't like your car , return it and get a complete refund. It's like
                            a 7-day test-drive! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // Promises Section end -->
</section>

<!-- //ajax script -->
<script type="text/javascript">
let variants = document.getElementById('var_id');
let models = document.getElementById('model_id');
let city = document.getElementById('city_id');
let state = document.getElementById('state_id');

const getVariant = (bname) => {
    $.ajax({
        url: 'http://localhost/mobility/index.php/Home/getVariants',
        type: "post",
        data: {
            brand: bname,
        },
        success: (received, status) => {
            let newHTML = '';
            newHTML += `<option value="">Select Variant</option>`;
            for (const key in received) {
                newHTML += `<option value="${received[key]}">${received[key]}</option>`;

            }
            variants.innerHTML = newHTML;
        }
    });
};

let brands = document.getElementById('brand_id');

brands.addEventListener('change', function() {
    //    console.log("hello world");
    getVariant(this.value);
}, false);

let rentVariants = document.getElementById('rentvar_id');
let rentModels = document.getElementById('rentmodel_id');

const getRentVariant = (bname) => {

    $.ajax({
        url: 'http://localhost/mobility/index.php/Home/getVariants',
        type: "post",
        data: {
            brand: bname,
        },
        success: (received, status) => {
            let newHTML = '';
            newHTML += `<option value="">Select Variant</option>`;
            for (const key in received) {
                newHTML += `<option value="${received[key]}">${received[key]}</option>`;

            }
            rentVariants.innerHTML = newHTML;
        }
    });
};
const getCity = (sname) => {
    $.ajax({
        url: 'http://localhost/mobility/index.php/Home/getCities',
        type: "post",
        data: {
            stateName: sname,
        },
        success: (received, status) => {
            let newHTML = '';
            console.log("hello");
            newHTML += `<option value="">Select City</option>`;
            for (const key in received) {
                console.log("hello");
                newHTML += `<option value="${received[key]}">${received[key]}</option>`;
            }
            city.innerHTML = newHTML;
        }
    });
};

state.addEventListener('change', function() {
    getCity(this.value);
}, false);

let rentBrands = document.getElementById('rentbrand_id');

rentBrands.addEventListener('change', function() {
    //    console.log("hello world");
    getRentVariant(this.value);
}, false);
</script>
<!-- ajax script end -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>

<?= $this->endSection() ?>