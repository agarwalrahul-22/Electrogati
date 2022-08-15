<?= $this->extend("base"); ?>


<?= $this->section("content"); ?>

<section id="forgot">
    <br>
    <br>
    <br>

    <section class="container ">
        <div class="card py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">

                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

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
                    <h3>Log In</h3>

                    <?= form_open(); ?>
                    <!-- Email input -->
                    <div class="form-outline ">
                        <label class="form-label" for="form1Example13">Email address</label>
                        <input type="email" id="form1Example13" name="email" class="form-control form-control-sm"
                            value="<?= set_value('email') ?>" />

                    </div>

                    <br>

                    <!-- Submit button -->
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>




                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <?= $this->endSection() ?>