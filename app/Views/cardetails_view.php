<?= $this->extend("base"); ?>


<?= $this->section("content"); ?>


<section id="about">
    <br>
    <br>
    <br>
    <br>
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
        <div class="container">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table>

                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                style="border:6px solid gray;">
                                <div class="carousel-inner">
                                    <?php foreach ($images as $img) : ?>
                                    <?php if ($img) : ?>
                                    <div class="carousel-item active">
                                        <img src="<?= base_url('public/uploads') . '/' . $img ?>" height="400px"
                                            width="100%">
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>

                                </div>
                                <button class="carousel-control-prev" style="background-color:transparent; !important"
                                    type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                        </table>
                        <!-- owner details  -->
                        <br>
                        <div class="userdata">
                            <span>Owner: <?= $userdata->username ?></span>
                            <span><i class="fab fa-whatsapp"
                                    style=" background:#25D366;font-size:20px;border-radius:13px;margin:auto;color:white;"></i>
                                <a style="display: inline"
                                    href="whatsapp://send?phone=91<?= $userdata->mobile ?>&text=Hi, I liked your car at electrogati.com"
                                    title="Share on whatsapp"><?= $userdata->mobile ?></a>
                            </span>
                            <span><i class="fa fa-envelope"
                                    style=" background:red; border:1px solid red;color:white;"></i>
                                <a style="display: inline;"
                                    href="mailto:<?= $userdata->email ?>"><?= $userdata->email ?></a>
                            </span>
                        </div>


                    </div>



                    <div class="col-md-6">
                        <table>

                            <?php foreach ($details as $key => $value) : ?>

                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>

                            </tr>
                            <?php endforeach; ?>

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>





</section>
<?= $this->endSection(); ?>