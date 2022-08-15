<?php
$page_session = \CodeIgniter\Config\Services::session();
$autoload['helper'] = array('form');
?>
<?= $this->extend("base"); ?>
<?= $this->section("content"); ?>

<section id="pro">
    <div class="container h-75">
        <div class="card container rounded  mt-5 mb-5">
            <?= form_open(); ?>
            <div class="row">
                <?php if (isset($validation)) : ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
                <?php endif; ?>
                <div class="input_element col-md-4 border-right profile-img ">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle mt-5" width="200px"
                            src="<?= base_url() ?>/public/assets/img/pp.png"><span class="font-weight-bold"></span><span
                            class="text-black-50"></span><span> </span>
                    </div>
                    <input name="pimage" type="file" value="upload">
                </div>
                <div class="col-md-7 p-3 py-5 mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="labels p-1">Name</label>
                            <input disabled type="text" class="form-control" placeholder="Full Name"
                                value="<?= $userdata->username ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="labels p-1">Email</label>
                            <input disabled type="text" class="form-control" value="<?= $userdata->email ?>"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels p-1">Mobile Number <i
                                    class="fa-solid fa-circle-info"></i></label><input disabled type="text"
                                class="form-control" placeholder="Mobile Number" value="<?= $userdata->mobile ?>">
                        </div>
                        <div class="col-md-12"><label class="labels p-1">Address</label><input type="text"
                                class="form-control" placeholder="Address" value="" name="address"></div>
                        <div class="col-md-12">
                            <label class="labels p-1">State</label><select class="form-select"
                                aria-label="Default select example" name="state">
                                <option selected>State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                        <div class="col-md-12"><label class="labels p-1">District</label><input type="text"
                                class="form-control" placeholder="District" value="" name="district"></div>
                        <div class="col-md-12"><label class="labels p-1">Pincode</label><input type="text"
                                class="form-control" placeholder="Pincode" value="" name="pincode"></div>
                        <div class="col-md-12"><label class="labels p-1">License Number</label><input type="text"
                                class="form-control" placeholder="License Number" value=""></div>
                        <div class="col-md-12"><label class="labels p-1">Account Type</label><select class="form-select"
                                aria-label="Default select example">
                                <option selected>Personal/Broker</option>
                                <option value="1">Personal</option>
                                <option value="2">Broker</option>
                            </select></div>
                        <div class="col-md-12"><label class="labels p-1">Broker Undertaking Document <i
                                    class="fa-solid fa-circle-info"></i></label>
                            <div class="input_element">

                                <div class="mb-3">
                                    <input name="image" class="form-control" type="file" id="formFileMultiple" multiple>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 text-center"><label class="labels p-1">Agree T&C <input
                                    class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></label>
                        </div>
                    </div>
                    <div class="mt-3 text-center "><button class="btn btn-primary profile-button btn-lg btn-block"
                            type="submit" name="upload" value="upload">Upload</button></div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    </div>
    </div>
</section>
<?= $this->endSection(); ?>