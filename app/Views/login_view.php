<?= $this->extend("base"); ?>
<?= $this->section("content"); ?>

<section id="login">
    <br>
    <br>
    <div class="about-container" data-aos="zoom-in" data-aos-delay="100">
        <div class="container py-5">
            <div class="row">
                <div class="col-6 d-none d-lg-block">
                    <img src="<?= base_url() ?>/public/assets/img/login.png" width="420px">
                </div>
                <div class=" card col-11 col-sm-10 col-lg-6 col-md-6 col-xl-6">
                    <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                    <?php endif; ?>
                    <?php if (isset($error)) : ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                    <?php endif; ?>


                    <?php if (session()->getTempdata('error')) : ?>
                    <div class="alert alert-danger"><?= session()->getTempdata('error'); ?></div>
                    <?php endif; ?>
                    <h2 style="text-align:center">LOG IN</h2>

                    <?= form_open(); ?>
                    <!-- Email input -->
                    <div class="form-outline ">
                        <label class="form-label" for="form1Example13">Email address</label>
                        <input type="email" id="form1Example13" name="email" class="form-control form-control-sm"
                            value="<?= set_value('email') ?>" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline ">
                        <label class="form-label" for="form1Example23">Password</label>
                        <input type="password" id="form1Example23" name="pass" class="form-control form-control-sm"
                            value="<?= set_value('pass') ?>" />

                    </div>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3"> Remember me </label>
                        </div>
                        <a style="text-decoration: none;" href="<?= base_url() ?>/login/forgot_password">Forgot
                            password?</a>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    <?= form_close(); ?>
                    <hr class="mt-2 mb-3" />

                    <a style="text-decoration: none;" href="<?= base_url()  ?>/register"> <button
                            class="btn btn-success btn-lg btn-block">Create an account</button>
                    </a>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center h-100">


            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>