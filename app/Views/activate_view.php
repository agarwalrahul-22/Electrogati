<?= $this->extend("base"); ?>


<?= $this->section("content"); ?>

<section id="main">
    <section id="about">
        <div class="card">
            <table>
                <thead>
                    <td>
                        <p>Account Activation Process</p>
                    </td>
                </thead>
                <tr>
                    <td>
                        <?php if (isset($error)) : ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                        <?php endif; ?>
                        <?php if (isset($success)) : ?>
                        <div class="alert alert-secondary">
                            <?= $success ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><a
                                href="<?= base_url(); ?>/Profile">Continue to Update your
                                Profile</a></button>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
        </div>
    </section>
</section>
<?= $this->endSection(); ?>