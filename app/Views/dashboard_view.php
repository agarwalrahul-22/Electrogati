<?php
$page_session = \CodeIgniter\Config\Services::session();
?>
<?= $this->extend("base"); ?>
<?= $this->section("content"); ?>

<!------ Include the above in your HEAD tag ---------->
<section id="dash">
    <div class="container">
        <div class="emp-profile ">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="<?= base_url() ?>/public/assets/img/pp.png" alt="" />
                    </div>
                    <div class="profile-work mt-1">
                        <i class="fa-solid fa-envelope" style="color:#f82249;"></i><a href="" class="ml-2"
                            style="color:white;">
                            <?= $userdata->email ?></a><br />
                        <i class="fa-solid fa-square-phone" style="color:#f82249;"></i><a href="" class="ml-2"
                            style="color:white;">
                            <?= $userdata->mobile ?></a><br />
                    </div>
                </div>
                <div class="col-md-8">
                    <button type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"
                        onclick="window.location.href='<?= base_url(); ?>/Profile'"> Edit
                        Profile</button>
                    <div class="profile-head">
                        <h5 style="font-family: 'Poppins', sans-serif;">
                            <?= $userdata->username ?>
                        </h5>
                        <h6 style="font-family: 'Poppins', sans-serif;">
                            <?= $userdata->email ?>
                        </h6>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="rent-tab" data-toggle="tab" href="#rent" role="tab"
                                    aria-controls="profile" aria-selected="false">Rent</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sale-tab" data-toggle="tab" href="#sale" role="tab"
                                    aria-controls="profile" aria-selected="false">Sale</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $userdata->username ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $userdata->username ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $userdata->permanent_add ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                            <div class="row">
                                <?php if($rentdata) : ?>
                                <?php foreach ($rentdata as $r):?>
                                <div class="card col-2" style="width: 15rem; margin:2px 2px;">
                                    <img class="card-img-top" style="border:2px solid grey; height:125px;"
                                        src="<?= base_url() ?>/public/uploads/<?= $r['image1'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $r['brand'] ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><?= $r['brand'] ?></li>
                                        <li class="list-group-item"><?= $r['variant'] ?></li>
                                        <li class="list-group-item"><?= $r['model'] ?></li>
                                    </ul>
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                            <div class="row">
                                <?php if($saledata) : ?>
                                <?php foreach ($saledata as $s):?>
                                <div class="card col-2" style="width: 15rem; margin:2px 2px;">
                                    <img class="card-img-top" style="border:2px solid grey; height:125px;"
                                        src="<?= base_url() ?>/public/uploads/<?= $s['image1'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $s['brand'] ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><?= $s['brand'] ?></li>
                                        <li class="list-group-item"><?= $s['variant'] ?></li>
                                        <li class="list-group-item"><?= $s['model'] ?></li>
                                    </ul>
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?= $this->endSection(); ?>