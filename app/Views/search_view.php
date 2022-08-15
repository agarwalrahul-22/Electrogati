<?= $this->extend("base"); ?>
<?= $this->section("content"); ?>


<!-- ======= Hero Section ======= -->
<section id="about">
    <br>
    <br>
    <div class="row">
        <div class="offset-lg-2 col-lg-8">
            <div class="container" data-aos="zoom-in" data-aos-delay="100" id="rentlist_container">
                <?php if (!$redata):?>
                <div class="container">
                    <h1>Sorry!! No Result was found</h1>
                </div>
                <?php endif;?>
                <?php if ($redata) : ?>
                <?php foreach ($redata as $rent) : ?>
                <div class="container">
                    <div class="card card-body">
                        <Table>
                            <tr>
                                <td rowspan="5"><img height="250px" width="250px"
                                        src="<?= base_url('public/uploads') . '/' . $rent['image1']; ?>" alt="..."
                                        class="img-thumbnail"></td>

                                <head colspan="2">
                                    <p style="font-size:16px; font-weight:900;"><?= $rent['brand']; ?> :
                                        <?= $rent['model'] ?></p>
                                </head>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Listed on: <strong> <?= $rent['created_at'] ?></strong> </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Fuel Type: <?= $rent['variant']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>Price (excl driver charges): ₹ <?=$rent['price'] ?> / day</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><a class="scrollto"
                                        style="text-decoration:none; background-color:#f82249; padding: 6px; border-radius:10px;"
                                        href="<?= base_url() . '/cardetails/index/sales/' . $rent['_id']; ?>">Details</a>
                                </td>
                            </tr>
                        </Table>
                    </div>
                </div>
                <br>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
</section><!-- End Hero Section -->

<?= $this->endSection(); ?>