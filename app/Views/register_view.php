<?php
$page_session = \CodeIgniter\Config\Services::session();

?>
<?= $this->extend("base"); ?>
<?= $this->section("content"); ?>

<section id="register">
    <br>
    <br>
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-6 d-none d-lg-block">
                    <img src="<?= base_url() ?>/public/assets/img/signup.png" width="420px">
                </div>
                <div class="justify-content-center col-11 col-sm-10 col-lg-6 col-md-6 col-xl-6">
                    <div class="card container p-4 h-auto">
                        <div class="row d-flex align-items-center justify-content-center h-100">
                            <div class="col-md-10 col-lg-10 col-xl-10">
                                <script>
                                setTimeout(function() {
                                    $("#hidealrt").hide();
                                }, 3000)
                                </script>
                                <?= form_open(); ?>
                                <h2 style="text-align:center;">SIGN UP</h2>
                                <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger">
                                    <?= $validation->listErrors() ?>
                                </div>
                                <?php endif; ?>
                                <?php if ($page_session->getTempdata('success')) : ?>
                                <div class='alert alert-success'>
                                    <?= $page_session->getTempdata('success'); ?> </div>
                                <?php endif; ?>
                                <?php if ($page_session->getTempdata('error')) : ?>
                                <div class='alert alert-danger'> <?= $page_session->getTempdata('error'); ?> </div>
                                <?php endif; ?>
                                <!-- Email input -->
                                <div class="form-outline ">
                                    <label class="form-label " for="form1Example13">Full Name</label>
                                    <input type="text" id="form1Example13" name="username"
                                        class="form-control form-control-sm" value="<?= set_value('username') ?>" />

                                </div>
                                <div class="form-outline ">
                                    <label class="form-label" for="form1Example13">Email address</label>
                                    <input type="email" id="form1Example13" name="email"
                                        class="form-control form-control-sm" value="<?= set_value('email') ?>" />

                                </div>

                                <!-- Password input -->
                                <div class="form-outline ">
                                    <label class="form-label" for="form1Example23">Password</label>
                                    <input type="password" id="form1Example23" name="pass"
                                        class="form-control form-control-sm" value="<?= set_value('pass') ?>" />

                                </div>
                                <div class="form-outline ">
                                    <label class="form-label" for="form1Example23">Confirm Password</label>
                                    <input type="password" id="form1Example23" name="cpass"
                                        class="form-control form-control-sm" value="<?= set_value('cpass') ?>" />

                                </div>
                                <div class="form-outline ">
                                    <label class="form-label" for="form1Example23">Mobile</label>
                                    <input type="mobile" id="form1Example23" name="mobile"
                                        class="form-control form-control-sm" value="<?= set_value('mobile') ?>" />

                                </div>

                                <div class="d-flex justify-content-around align-items-center mb-4">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                            checked />
                                        <label class="form-check-label" for="form1Example3"> Remember me </label>
                                    </div>
                                    <!-- <a href="#!">Forgot password?</a> -->
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                                <?= form_close(); ?>


                                <hr class="mt-2 mb-3" />
                                <a style="text-decoration: none;" href="<?= site_url('login') ?>"> <button
                                        class="btn btn-success btn-lg btn-block">Already have account</button>
                                </a>

                                <!--  <hr class="mt-2 mb-3" />
                            <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!" role="button">
                                <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                            </a>
                            <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!" role="button">
                                <i class="fab fa-twitter me-2"></i>Continue with Twitter</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>