<?= $this->extend("base"); ?>
<?= $this->section("content"); ?>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <h3>Reset Password</h3>
                <?php if (isset($validation)) : ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
                <?php endif; ?>


                <?php if (session()->getTempdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getTempdata('error'); ?></div>
                <?php endif; ?>


                <?php if (isset($error)) : ?>
                <div class="alert alert-danger">
                    <?= $error; ?>
                </div>
                <?php else : ?>
                <?= form_open(); ?>

                <div class="form-outline ">
                    <label class="form-label" for="form1Example13">Enter New Password</label>

                    <input type="password" id="form1Example13" name="pwd" class="form-control form-control-sm"
                        value="" />

                    <label class="form-label" for="form1Example13">Confirm New Password</label>

                    <input type="password" id="form1Example13" name="cpwd" class="form-control form-control-sm"
                        value="" />
                    <br>
                    <input type="submit" name="" value="update" class="btn btn-primary btn-lg btn-block">
                </div>
                <?= form_close(); ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>