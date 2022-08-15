<?= $this->extend("base"); ?>


<?= $this->section("content"); ?>
<!-- ======= Hero Section ======= -->
<section id="about">
    <br>
    <br>
    <div class="row">
        <div class="col-lg-8">
            <div class="container" data-aos="zoom-in" data-aos-delay="100" id="rentlist_container">


                <?php if ($rents) : ?>
                <?php foreach ($rents as $rent) : ?>


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
            <br><br>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item ">
                        <a class="page-link" id="prev" href="#">
                            < </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" id="next" href="#"> ></a>
                    </li>
                </ul>
            </nav>
        </div>



        <div class="col-lg-3">
            <div class="card card-body">
                <p> Sort By : </p>



                <div class="btn-group">

                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                        data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="category">
                            <a class="dropdown-item" href="#">recent</a>
                            <a class="dropdown-item" href="#">price</a>

                        </div>
                </div>
                </button>

            </div>
        </div>





        <script type="text/javascript">
        let prevsort = "";
        const getPageData = (filter) => {
            let page = filter.page;
            let sortby = filter.sortby;
            prevsort = sortby;
            let URL = "http://localhost/mobility/rentlisted/getPageData";

            $.ajax({
                url: URL,
                type: "post",
                data: {
                    page: page,
                    sortby: sortby,
                },

                success: (data, status) => {
                    $("#rentlist_container").html(data.view);

                }
            });
        };




        let links = document.getElementsByClassName('page-link');
        // .............. filter   sort by ......................
        let category = document.getElementById('category').getElementsByTagName('a');
        for (let i = 0; i < category.length; i++) {

            category[i].addEventListener('click', () => {
                let filter = {
                    page: 1,
                    sortby: "",
                };
                for (let i = 1; i < 4; i++) {
                    links[i].innerText = '' + i;
                }

                filter.sortby = category[i].innerText;
                if (filter.sortby == 'recent')
                    filter.sortby = '_id';
                getPageData(filter);
            })
        }


        //  ............ pagination .....................


        for (let i = 1; i < 4; i++) {
            links[i].addEventListener('click', () => {
                let filter = {
                    page: parseInt(links[i].innerText),
                    sortby: prevsort,
                }
                getPageData(filter);
            })
        }

        document.getElementById('prev').addEventListener('click', () => {
            for (let i = 1; i < 4; i++) {
                let pg = parseInt(links[i].innerText);
                if (pg == 1) {
                    return;
                }
                links[i].innerHTML = '' + (pg - 1);
            }
            let filter = {
                page: parseInt(links[1].innerText) - 1,
                sortby: prevsort,
            }
            getPageData(filter);
        })

        document.getElementById('next').addEventListener('click', () => {
            for (let i = 1; i < 4; i++) {
                let pg = parseInt(links[i].innerText);
                links[i].innerHTML = '' + (pg + 1);
            }
            let filter = {
                page: parseInt(links[3].innerText) + 1,
                sortby: prevsort,
            }
            getPageData(filter);
        })
        </script>


    </div>
</section><!-- End Hero Section -->

<?= $this->endSection(); ?>