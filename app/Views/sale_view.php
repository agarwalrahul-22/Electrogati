<?= $this->extend("base"); ?>
<?= $this->section("content"); ?>

<section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <div class="card container">
            <h2 style="text-align:center; color:white;">ADD PRODUCT</h2>
            <?php if (isset($imageerror)) : ?>
            <div style="background:white;color:red;"><?= $imageerror->listErrors(); ?> </div>
            <?php endif; ?>

            <?php if (isset($updateerror)) : ?>
            <div style="background:white;color:red;"><?= $updateerror ?> </div>
            <?php endif; ?>

            <?php if (!empty($errors)) : ?>
            <?php foreach ($errors as $field => $error) : ?>
            <div style="background:white;color:red;"><?= $error ?> </div>
            <?php endforeach ?>
            <?php endif ?>
            <?= form_open_multipart(); ?>

            <div class="form_elements">



                <div class="input_element">
                    <p>Brand Name</p>
                    <select name="brand" class="form-select" aria-label="Default select example" id="brand_id">

                        <?php foreach ($brands as $key => $value) : ?>
                        <option value="<?= $value ?>" <?php if ($brand == $value) : ?><?= 'SELECTED' ?> <?php endif; ?>>
                            <?= $value ?> </option>
                        <?php endforeach; ?>

                    </select>
                </div>



                <div class="input_element">
                    <p>Model Name</p>
                    <select name="model" class="form-select" aria-label="Default select example" id="model_id">

                        <?php foreach ($models as $key => $value) : ?>
                        <option value="<?= $value ?>" <?php if ($model == $value) : ?><?= 'SELECTED' ?> <?php endif; ?>>
                            <?= $value ?> </option>
                        <?php endforeach; ?>

                    </select>
                </div>


                <div class="input_element">
                    <p>State</p>
                    <select name="state" class="form-select" aria-label="Default select example" id="state_id">

                        <?php foreach ($states as $key => $value) : ?>
                        <option value="<?= $value ?>" <?php if ($state == $value) : ?><?= 'SELECTED' ?> <?php endif; ?>>
                            <?= $value ?> </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="input_element">
                    <p>City</p>
                    <select name="city" class="form-select" aria-label="Default select example" id="city_id">

                        <?php foreach ($cities as $key => $value) : ?>
                        <option value="<?= $value ?>" <?php if ($city == $value) : ?><?= 'SELECTED' ?> <?php endif; ?>>
                            <?= $value ?> </option>
                        <?php endforeach; ?>

                    </select>
                </div>





                <div class="input_element">
                    <p>Variant
                        <span class="info">
                            <i class="icon-info-sign" style="color:white;"></i>

                            <span class="extra-info">
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                            </span>
                        </span>
                    </p>
                    <select name="variant" class="form-select" aria-label="Default select example">
                        <option value="petrol">petrol</option>
                        <option value="diesel" <?php if ($variant == "diesel") : ?><?= 'SELECTED' ?> <?php endif; ?>>
                            diesel</option>
                        <option value="cng" <?php if ($variant == "cng") : ?><?= 'SELECTED' ?> <?php endif; ?>>cng
                        </option>
                        <option value="electric" <?php if ($variant == "electric") : ?><?= 'SELECTED' ?>
                            <?php endif; ?>>
                            elctric</option>
                    </select>
                </div>
                <div class="input_element">
                    <p>Purchase Date
                        <span class="info">
                            <i class="icon-info-sign" style="color:white;"></i>
                            <span class="extra-info">
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                            </span>
                        </span>
                    </p>
                    <input type="date" name="purchase" class="wide" placeholder="type here..." value="<?= $purchase ?>">
                </div>
                <div class="input_element">
                    <p>Chesis No.
                        <span class="info">
                            <i class="icon-info-sign" style="color:white;"></i>

                            <span class="extra-info">
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                            </span>
                        </span>
                    </p>
                    <input type="text" name="chesis" class="wide" placeholder="type here..." value="<?= $chesis ?>">
                </div>
                <div class="input_element">
                    <p>RC Number
                        <span class="info">
                            <i class="icon-info-sign" style="color:white;"></i>

                            <span class="extra-info">
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                            </span>
                        </span>
                    </p>
                    <input type="text" name="rc" class="wide" placeholder="type here..." value="<?= $rc ?>">
                </div>
                <div class="input_element">
                    <p>Negotiate
                        <span class="info">
                            <i class="icon-info-sign" style="color:white;"></i>

                            <span class="extra-info">
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                            </span>
                        </span>
                    </p>
                    <select name="negotiate" class="form-select wide" aria-label="Default select example">
                        <option value="Yes/No">Yes/No</option>
                        <option value="Yes" <?php if ($negotiate == "Yes") : ?><?= 'SELECTED' ?> <?php endif; ?>>Yes
                        </option>
                        <option value="No" <?php if ($negotiate == "No") : ?><?= 'SELECTED' ?> <?php endif; ?>>No
                        </option>

                    </select>
                </div>
                <div class="input_element">
                    <p>Images (upto 3 images)
                        <span class="info">
                            <i class="icon-info-sign" style="color:white;"></i>
                            <span class="extra-info">
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                            </span>
                        </span>
                    </p>
                    <div class="mb-3">
                        <input name="images[]" class="form-control" type="file" id="formFileMultiple" multiple>
                    </div>
                </div>
                <div class="input_element">
                    <p>Vehicle Number
                        <span class="info">
                            <i class="icon-info-sign" style="color:white;"></i>

                            <span class="extra-info">
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                            </span>
                        </span>
                    </p>
                    <input type="text" name="vehicle" class="wide" placeholder="type here..." value="<?= $vehicle ?>">
                </div>
                <div class="input_element">
                    <p>Price (in Lakhs)
                        <span class="info">
                            <i class="icon-info-sign" style="color:white;"></i>

                            <span class="extra-info">
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                                this is brand name. select the brand of the car you want to put for sell. eg.
                                audi,opel,mclearn
                            </span>
                        </span>
                    </p>
                    <input type="text" name="price" class="wide" placeholder="type here..." value="<?= $price ?>">
                </div>
                <div class="input_element">
                    <input type="submit" class="update_btn" style="margin-left:0%;" value="Update">
                </div>
            </div>
            <?= form_close(); ?>


            <script type="text/javascript">
            let models = document.getElementById('model_id');

            const getModels = (bd) => {

                $.ajax({
                    url: 'http://localhost/mobility/index.php/Sale/getmodels',
                    type: "post",
                    data: {
                        brand: bd,
                    },

                    success: (received, status) => {
                        received.sort();
                        let newHTML = '';
                        for (let i = 0; i < received.length; i++) {
                            newHTML += ` <option value="${received[i]}">${received[i]}</option> `;
                        }
                        console.log(newHTML);
                        models.innerHTML = newHTML;

                    }
                });
            };


            // ..................... brand options ......................
            let brands = document.getElementById('brand_id');
            brands.addEventListener('change', function() {
                getModels(this.value);
            }, false);




            let cities = document.getElementById('city_id');
            const getCities = (st) => {

                $.ajax({
                    url: 'http://localhost/mobility/index.php/Sale/getcities',
                    type: "post",
                    data: {
                        state: st,
                    },

                    success: (received, status) => {
                        received.sort();
                        let newHTML = '';
                        for (let i = 0; i < received.length; i++) {
                            newHTML += ` <option value="${received[i]}">${received[i]}</option> `;
                        }
                        console.log(newHTML);
                        cities.innerHTML = newHTML;

                    }
                });
            };

            // ..................... state options ......................
            let states = document.getElementById('state_id');
            states.addEventListener('change', function() {
                getCities(this.value);
            }, false);
            </script>



        </div>
    </div>
</section>

<?= $this->endSection(); ?>