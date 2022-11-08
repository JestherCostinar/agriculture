<?php include 'layouts/header.php'; ?>
<?php
if (isset($_POST['btnEmail'])) {
    global $db;
    $firstname = $db->real_escape_string($_POST['firstname']);
    $lastname = $db->real_escape_string($_POST['lastname']);
    $email = $db->real_escape_string($_POST['email']);
    $message = $db->real_escape_string($_POST['message']);
    $subject = $db->real_escape_string($_POST['subject']);
    report($firstname, $lastname, $email, $message, $subject);
}
?>

<body>
    <div class="site-wrapper">
        <?php include 'layouts/navigation.php'; ?>
        <section>
            <div class=" petmark-slick-slider  home-slider dot-position-1" data-slick-setting='{
        "autoplay": true,
        "autoplaySpeed": 8000,
        "slidesToShow": 1,
        "dots": true
    }'>
                <div class="single-slider home-content bg-image" data-bg="https://www.da.gov.ph/wp-content/uploads/2020/03/kenneth-scaled.jpg">
                    <span class="herobanner-progress"></span>
                </div>
                <div class="single-slider home-content bg-image" data-bg="https://eige.europa.eu/sites/default/files/styles/eige_original_optimised/public/images/agriculture.jpg?itok=YXbQPCXw">
                    <span class="herobanner-progress"></span>
                </div>
                <div class="single-slider home-content bg-image" data-bg="https://www.eea.europa.eu/themes/agriculture/image_large">
                    <span class="herobanner-progress"></span>
                </div>
                <div class="single-slider home-content bg-image" data-bg="https://images.squarespace-cdn.com/content/v1/59a706d4f5e2319b70240ef9/1598971164694-F75Y7VUAHC6TLFJXLCWF/veggies.jpg">
                    <span class="herobanner-progress"></span>
                </div>
                <div class="single-slider home-content bg-image" data-bg="https://philippinesgraphic.com.ph/wp-content/uploads/2020/08/PHOTO2_Mechanization_received_895563290892432-copy-2.jpg">
                    <span class="herobanner-progress"></span>
                </div>
            </div>
        </section>
        <div class="container pt--20 mb--20">
            <div class="policy-block border-four-column">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="policy-block-single">
                            <div class="icon">
                                <span class="ti-truck"></span>
                            </div>
                            <div class="text">
                                <h3>Delivery Starts</h3>
                                <p>₱30 up</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="policy-block-single">
                            <div class="icon">
                                <span class="ti-credit-card"></span>
                            </div>
                            <div class="text">
                                <h3>Cod</h3>
                                <p>Cash on Delivery</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="policy-block-single">
                            <div class="icon">
                                <span class="ti-gift"></span>
                            </div>
                            <div class="text">
                                <h3>Discounts</h3>
                                <p>Discounted foods</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="policy-block-single">
                            <div class="icon">
                                <span class="ti-headphone-alt"></span>
                            </div>
                            <div class="text">
                                <h3>Free Support 24/7</h3>
                                <p>Online 24hrs a Day</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider One / Normal Two Column Slider -->

        <div class="pt--50" style="background:#fff">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-title">
                            <h2>Sellers</h2>
                        </div>
                        <!-- Two row Three Column Slider -->
                        <div class="petmark-slick-slider border grid-column-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 3000,
                            "slidesToShow": 5,
                            "rows" :1,
                            "arrows": true
                        }' data-slick-responsive='[
                            {"breakpoint":991, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                        ]'>
                            <?php if (get_stores()->num_rows > 0) { ?>
                                <?php foreach (get_stores() as $stores) { ?>
                                    <div class="single-slide">
                                        <div class="pm-product">
                                            <div class="image">
                                                <a href="stores.php?store_id=<?= $stores['store_id'] ?>">
                                                    <img style="width:380px;height:270px" src="<?= $stores['images'] == null ? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU' : 'assets/image/vendor/' . $stores['images'] ?>" alt="">
                                                </a>
                                                <!-- <span class="onsale-badge">Sale!</span> -->
                                            </div>
                                            <div class="content">
                                                <div class="price">
                                                    <span></span>
                                                </div>
                                                <h3 style="text-align:center"><?= $stores['store_name'] ?></h3>
                                                <div class="btn-block">
                                                    <a href="stores.php?store_id=<?= $stores['store_id'] ?>" class="btn btn-outlined btn-rounded">Visit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="pt--50" style="background:#fff">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-title">
                            <h2>Ranking of Seller</h2>
                        </div>
                        <!-- Two row Three Column Slider -->
                        <table class="table datatable-responsive">
                            <thead>
                                <tr>
                                    <th style="width:1px">#</th>
                                    <th>Store Name</th>
                                    <th style="width:1px">Sales</th>
                                    <!-- <th style="width:100px">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach (rankOfSeller() as $sellers) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $sellers['store_name'] ?></td>
                                        <td style="text-align:center"><?= $sellers['total_sales'] ?></td>
                                        <!-- <td class="text-primary "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg></td> -->
                                    </tr>


                                    <?php $i++ ?>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="pt--50" style="background:#fff">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-title">
                            <h2>Featured Categories</h2>
                        </div>
                        <!-- Two row Three Column Slider -->
                        <div class="petmark-slick-slider border grid-column-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 3000,
                            "slidesToShow": 5,
                            "rows" :1,
                            "arrows": true
                        }' data-slick-responsive='[
                            {"breakpoint":991, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                        ]'>
                            <?php if (get_featured_categories()->num_rows > 0) { ?>
                                <?php foreach (get_featured_categories() as $fc) { ?>
                                    <div class="single-slide ">
                                        <div class="pm-product">
                                            <div class="image">

                                                <a href="category.php?id=<?= $fc['id'] ?>">
                                                    <?php if (empty($fc['images']) || $fc['images'] == null) { ?>
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU" alt="">
                                                    <?php } else { ?>
                                                        <img src="assets/image/category/<?= $fc['images'] ?>" alt="">
                                                    <?php } ?>
                                                </a>
                                                <!-- <span class="onsale-badge">Sale!</span> -->
                                            </div>
                                            <div class="content">
                                                <div class="price">
                                                    <span></span>
                                                </div>
                                                <h3 style="text-align:center"><?= $fc['parent'] ?></h3>
                                                <div class="btn-block">
                                                    <a href="category.php?id=<?= $fc['id'] ?>" class="btn btn-outlined btn-rounded">Visit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Modal -->
        <!-- Promotion Block 1 -->

        <!-- Slider Block Two -->
        <div class="pt--50" style="background:#fff">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-title">
                            <h2>Featured Product</h2>
                        </div>
                        <!-- Two row Three Column Slider -->
                        <div class="petmark-slick-slider border grid-column-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 3000,
                            "slidesToShow": 4,
                            "rows" :1,
                            "arrows": true
                        }' data-slick-responsive='[
                            {"breakpoint":991, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                        ]'>
                            <?php foreach (get_featured_product() as $featured) { ?>
                                <div class="single-slide ">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php?id=<?= $featured['id'] ?>"><img style="width:380px;height:270px" src="assets/image/product/<?= $featured['featured_image'] ?>" alt=""></a>
                                            <!-- <span class="onsale-badge">Sale!</span> -->
                                        </div>
                                        <div class="content" style="text-align:center">
                                            <h3><?= $featured['title'] ?> <br> <i class="fas fa-store fa-fw" style="color:#41924B"></i> <?= store_name($featured['accounts_id'])['store_name'] ?></h3>
                                            <div class="btn-block">
                                                <a href="product-details.php?&id=<?= $featured['id'] ?>" class="btn btn-outlined btn-rounded">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- SLider Block 3 / Tab -->
        <div class="pt--50 mb--50" style="background:#fff">
            <div class="container">

                <div class="slider-header-block tab-header d-flex">
                    <div class="block-title">
                        <h2>All Products</h2>
                    </div>

                    <ul class="pm-tab-nav nav nav-tabs" id="myTab" role="tablist">
                        <?php $i = 1; ?>
                        <?php foreach (get_all_categories() as $categories) { ?>
                            <li class="nav-item">
                                <a class="nav-link  <?= $i == 1 ? 'active' : '' ?>" data-bs-toggle="tab" href="#tab_<?= $i ?>" role="tab" aria-selected="true"><?= $categories['parent'] ?></a>
                            </li>
                            <?php $i++; ?>
                        <?php } ?>
                    </ul>
                </div>

                <div class="tab-content pm-slider-tab-content" id="myTabContent">
                    <?php $j = 1;
                    foreach (get_all_categories() as $categories) { ?>
                        <div class="tab-pane <?= $j == 1 ? 'show active' : '' ?>" id="tab_<?= $j ?>" role="tabpanel">
                            <div class="petmark-slick-slider border grid-column-slider  arrow-type-two" data-slick-setting='{
                                "autoplay": true,
                                "autoplaySpeed": 3000,
                                "slidesToShow": 4,
                                "rows" :1,
                                "arrows": true
                            }' data-slick-responsive='[
                                {"breakpoint":991, "settings": {"slidesToShow": 3} },
                                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                            ]'>
                                <?php foreach (get_all_products_by_category($categories['id']) as $product) { ?>
                                    <div class="single-slide">
                                        <div class="pm-product">
                                            <div class="image">
                                                <?php if (empty($product['featured_image']) || is_null($product['featured_image'])) { ?>
                                                    <a href="product-details.php?id=<?= $product['id'] ?>"><img style="width:380px;height:270px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU" alt=""></a>
                                                <?php } else { ?>
                                                    <a href="product-details.php?id=<?= $product['id'] ?>"><img style="width:380px;height:270px" src="assets/image/product/<?= $product['featured_image'] ?>" alt=""></a>
                                                <?php } ?>

                                                <!-- <span class="onsale-badge">Sale!</span> -->

                                            </div>
                                            <div class="content" style="text-align:center">
                                                <h3><?= $product['title'] ?> <br> <i class="fas fa-store fa-fw"></i> <?= store_name($product['accounts_id'])['store_name'] ?></h3>
                                                <div class="btn-block">
                                                    <a href="product-details.php?&id=<?= $product['id'] ?>" class="btn btn-outlined btn-rounded">View Product</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php $j++; ?>
                    <?php } ?>

                </div>


            </div>


        </div>

        <section class="contact-page-section section-padding bg-gray">

            <div class="container">
                <div class="ct-section-title-2 mb--60 text-center">
                    <h3>Report a problem</h3>
                </div>
                <form method="POST" class="site-form contact-form-2">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" required placeholder="Subject*">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" name="firstname" class="form-control" required placeholder="First Name*">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" name="lastname" class="form-control" required placeholder="Last Name*">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required placeholder="Email*">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" required placeholder="Message*"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="submit-btn">
                                <button type="submit" name="btnEmail" class="btn btn-black">Send Mail</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </section>



        <?php include 'layouts/footer.php'; ?>
    </div>
    <?php include 'layouts/scripts.php'; ?>
</body>

</html>