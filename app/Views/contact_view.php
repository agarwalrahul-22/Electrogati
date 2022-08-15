<?php
$page_session = \CodeIgniter\Config\Services::session();
?>
<?= $this->extend("base"); ?>
<?= $this->section("content"); ?>


<script src='https://www.google.com/recaptcha/api.js'></script>

<div id="c">
    <div class="card con container mt-5 h-75">
        <div class="container rounded  mt-5 mb-5">
            <section id="contact">
                <h1 class="section-header">Contact us</h1>
                <div class="container">

                    <script>
                    setTimeout(function() {
                        $("#hidealrt").hide();
                    }, 3000)
                    </script>
                    <div class="row">
                        <div class="offset-md-1 col-12 col-md-4 mt-4">
                            <?php if (isset($validation)) : ?>
                            <div class="alert alert-danger">
                                <?= $validation->listErrors() ?>
                            </div>
                            <?php endif; ?>


                            <?php if (session()->getTempdata('error')) : ?>
                            <div class="alert alert-danger"><?= session()->getTempdata('error'); ?></div>
                            <?php endif; ?>
                            <?php if (session()->getTempdata('success')) : ?>
                            <div class="alert alert-danger"><?= session()->getTempdata('success'); ?></div>
                            <?php endif; ?>
                            <form method="post" action="<?php echo base_url('contact/googleCaptachStore') ?>">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" placeholder="NAME" name="name"
                                            value="">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email" placeholder="EMAIL"
                                            name="email" value="">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="SUBJECT" placeholder="SUBJECT"
                                            name="subject" value="">
                                    </div>
                                </div>
                                <br>
                                <textarea class="form-control" rows="10" placeholder="MESSAGE"
                                    name="message"></textarea>
                                <br>
                                <div class="g-recaptcha align-content-lg-center"
                                    data-sitekey="6LfOM0YfAAAAAOJIYGcZfIgUpazNFxhuEFht4wtK"></div>

                                <button class="btn btn-danger send-button" id="submit" type="submit">
                                    <div class="alt-send-button">
                                        <i class="fa fa-paper-plane"></i><span class="send-text">SEND</span>
                                    </div>

                                </button>
                            </form>
                        </div>
                        <!-- Left contact page -->
                        <div class="offset-md-1 col-12 col-md-5 mt-4">
                            <ul class="contact-list">
                                <li class="list-item"><i class="fa fa-map-marker fa-2x"><span
                                            class="contact-text place"> Teacher Colony, Angur Bagicha Road Gondia,
                                            Maharashtra, 441614, India</span></i></li>

                                <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a
                                                href="tel:1-212-555-5555" title="Give me a call">
                                                +917328867833</a></span></i></li>

                                <li class="list-item"><i class="fa fa-envelope fa-2x"><span
                                            class="contact-text gmail"><a href="mailto:#" title="Send me an email">
                                                Contact@Electrogati.Com
                                                Corporateaffairs@Electrogati.Com</a></span></i></li>

                            </ul>

                            <hr>
                            <ul class="social-media-list">
                                <li><a href="#" target="_blank" class="contact-icon">
                                        <i class="fa fa-google" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#" target="_blank" class="contact-icon">
                                        <i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#" target="_blank" class="contact-icon">
                                        <i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#" target="_blank" class="contact-icon">
                                        <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                            <hr>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>