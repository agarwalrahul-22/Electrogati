<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Looking to Buy and Sell used Cars? Electrogati is the best platform to Buy or Sell car at reasonable prices to verified and Trusted users from all over India">
    <meta name="keywords" content="Buy, Sell, Cars, Electrogati">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Template Main CSS File -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>/public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/6.1.1/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <!-- Personalised CSS -->
    <?php if($page=="dashboard"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/dashboard.css'); ?>">
    <?php endif; ?>
    <?php if($page=="forgot"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/forgot.css'); ?>">
    <?php endif; ?>
    <?php if($page=="login"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/login.css'); ?>">
    <?php endif; ?>
    <?php if($page=="register"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/register.css'); ?>">
    <?php endif; ?>
    <?php if($page=="profile"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/profile.css'); ?>">
    <?php endif; ?>
    <?php if($page=="activate"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/activate.css'); ?>">
    <?php endif; ?>
    <?php if($page != "home" || $page != "dashboard"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/custom.css'); ?>">
    <?php endif; ?>
    <?php if($page == "home"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/home.css'); ?>">
    <?php endif; ?>
    <?php if($page =="contact"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/contact.css'); ?>">
    <?php endif; ?>
    <?php if($page =="cardetails"): ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/cardetails.css'); ?>">
    <?php endif; ?>
    <?php if($page =="sale1"): ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/sale.css') ?>" rel="stylesheet">
    <?php endif; ?>
    <?php if($page =="rent1"): ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/rent.css') ?>" rel="stylesheet">
    <?php endif; ?>
    <?php if($page =="sale"): ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/salelist.css') ?>" rel="stylesheet">
    <?php endif; ?>
    <?php if($page =="rent"): ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/rentlist.css') ?>" rel="stylesheet">
    <?php endif; ?>
    <!-- Title -->
    <title><?= $page_title ?></title>
</head>
<style>
button:hover {
    background-color: #f82249 !important;
}
</style>

<body>
    <header id="header" class="d-flex align-items-center ">
        <div class="container-fluid container-xxl d-flex align-items-center">
            <div id="logo" class="me-auto">
                <a href="<?= base_url() ?>" class="scrollto">
                    <span><img src="<?= base_url() ?>/public/assets/img/1.png" class="d-none d-lg-block"
                            alt="Electrogati:logo"></a>
                </span>
                <div class="w3-dropdown-hover d-lg-none d-xl-none ">
                    <button class="w3-button rounded ml-3 hov"> <i class="bi bi-list mobile-nav-toggle"></i></button>
                    <div class="w3-dropdown-content w3-bar-block w3-animate-zoom"
                        style="background-color:transparent; border:none !important; color:white;">
                        <a href="<?= base_url() ?>" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">Home</a>
                        <a href="<?= base_url() ?>/Rentlisted" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">Available For
                            Rent</a>
                        <a href="<?= base_url() ?>/Salelisted" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">Available For
                            Sale</a>
                        <a href="<?= base_url() ?>/About" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">About</a>
                        <a href="<?= base_url() ?>/Contact" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">Contact</a>
                    </div>
                </div>
            </div>
            <nav id="navbar" class="navbar order-last order-lg-0" style="font-family: 'Poppins', sans-serif; ">
                <ul class="nav" style="font-family: 'Poppins', sans-serif;">
                    <li><a class="nav-link scrollto <?php if($page=="home"){echo "active";} ?> "
                            href="<?= base_url() ?>" style="font-family: 'Poppins', sans-serif;">Home</a></li>
                    <li><a class="nav-link scrollto <?php if($page=="rent"){echo "active";} ?> "
                            href="<?= base_url() ?>/Rentlisted" style="font-family: 'Poppins', sans-serif;">Available
                            For Rent</a></li>
                    <li><a class="nav-link scrollto <?php if($page=="sale"){echo "active";} ?> "
                            href="<?= base_url() ?>/Salelisted" style="font-family: 'Poppins', sans-serif;">Available
                            For Sale</a></li>
                    <li><a class="nav-link scrollto <?php if($page=="about"){echo "active";} ?> "
                            href="<?= base_url() ?>/About" style="font-family: 'Poppins', sans-serif;">About</a></li>
                    <li><a class="nav-link scrollto <?php if($page=="contact"){echo "active";} ?> "
                            href="<?= base_url() ?>/Contact" style="font-family: 'Poppins', sans-serif;">Contact</a>
                    </li>
                </ul>

                <?php if (!session()->has("logged_user")) : ?>
                <a class="scrollto btn btn-danger ml-4 px-3" href="<?= base_url() ?>/login">Log In</a>
                <?php endif; ?>
                <?php if (session()->has("logged_user")) : ?>
                <div class="w3-dropdown-hover w3-left ">
                    <button class="w3-button w3-circle ml-3 hov" style="background-color:#f82249"><i
                            class="fa-solid fa-user"></i></button>
                    <div class="w3-dropdown-content w3-bar-block w3-animate-zoom"
                        style="background-color:transparent; border:none !important; right:0;">
                        <a href="<?= base_url(); ?>/Dashboard" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">View Profile</a>
                        <a href="<?= base_url(); ?>/Profile" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">Edit Profile</a>
                        <a href="<?= base_url(); ?>/Sale" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">Add for Sale</a>
                        <a href="<?= base_url(); ?>/Rent" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">Add for Rent</a>
                        <a href="<?= base_url(); ?>/profile/logout" class="w3-bar-item w3-button rounded"
                            style="font-family: 'Poppins', sans-serif;">Logout</a>
                    </div>
                </div>
                <?php endif; ?>
            </nav>
            <!-- navbar -->

        </div>
    </header><!-- End Header -->

    <?= $this->renderSection("content"); ?>

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 footer-info">
                        <h2 class="foot-title">ELECTROGATI</h2>
                        <p>Electrogati is a company with a difference. Following are the
                            characteristic features that make us distinct from the
                            crowded space of other commercial organizations.</p>
                    </div>


                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url() ?>">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url() ?>/About">About</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url() ?>/Rentlisted">Available for
                                    Rent</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url() ?>/Salelisted">Available for
                                    Sale</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url() ?>/Contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            Teacher Colony<br>
                            Angur Bagicha Road Gondia<br>
                            Maharashtra, 441614<br>
                            India <br>
                            <strong>Phone:</strong> +91 7328867833<br>
                            <strong>Email:</strong> Contact@Electrogati.com<br>
                        </p>

                        <div class="social-links">
                            <a href="https://twitter.com/electrogati" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="https://www.facebook.com/Electrogati/" class="facebook"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/electrogati/" class="instagram"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://t.me/electrogati" class="google-plus"><i class="bi bi-telegram"></i></a>
                            <a href="https://www.youtube.com/channel/UCvL1sqwFT6XYv5cYU18nq0g" class="youtube"><i
                                    class="bi bi-youtube"></i></a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Electrogati</strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://electogati.com/">Team Electrogati</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>/public/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script type="text/javascript" src="<?= base_url() ?>/public/assets/js/main.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e0be2392f9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>