<?php include 'layouts/header.php'; ?>
<?php
if (!isset($_GET['id'])) {
    header('location: products.php');
}



if (get_specific_products($_GET['id'])->num_rows > 0) {
    $product          = get_specific_products($_GET['id'])->fetch_assoc();
    $category         = get_specific_category($product['product_categories_id'])->fetch_assoc();
    $sub_category     = get_specific_sub_category($product['product_sub_categories_id'])->fetch_assoc();
    $seller           = account_details($product['accounts_id'])->fetch_assoc();
    $variations       = get_product_variations($_GET['id']);
    $single_variation = get_product_variations($_GET['id'])->fetch_array();
    $addressQuery     = get_accounts_address($product['accounts_id'])->fetch_assoc();
    if (isset($_SESSION['id'])) {
        $verified         = get_verified($_SESSION['id'], $_GET['id']);
    } else {
        $verified = 0;
    }
} else {
    header('location: products.php');
}

if (isset($_GET['is_comment']) == 'true') {
    $accounts_id = $_SESSION['id'];
    $usersQuery  = account_details($accounts_id)->fetch_assoc();
    $products_id = $_GET['id'];
    $customer    = $usersQuery['firstname'] . ' ' . $usersQuery['surname'];
    $raitings    = $_GET['star'];
    $comments    = $_GET['comments'];
    submit_reviews($accounts_id, $products_id, $customer, $raitings, $comments);
}



if (isset($_GET['add-to-cart-details']) == true) {
    add_to_cart_from_details($_GET['variation_id'], $_GET['price'], $_GET['quantity']);
}


?>

<style>
    /* for radio buttonpayment gateway  */

    .radio-toolbar input[type="radio"] {
        opacity: 0;
        position: fixed;
        width: 0;
    }

    .radio-toolbar label {
        display: inline-block;
        background-color: #fff;
        padding: 10px 20px;
        font-family: sans-serif, Arial;
        font-size: 16px;
        border: 2px solid #eee;
        border-radius: 4px;
    }

    .radio-toolbar label:hover {
        background-color: #dfd;
    }

    .radio-toolbar input[type="radio"]:focus+label {
        background-color: #000;
        border-color: #4c4;
    }

    .radio-toolbar input[type="radio"]:checked+label {
        background-color: #bfb;
        border-color: #4c4;
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>


<body>
    <div class="site-wrapper">
        <?php include 'layouts/navigation.php'; ?>
        <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $category['parent'] ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $sub_category['child'] ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $product['title'] ?></li>
                </ol>
            </div>
        </nav>
        <!-- Promotion Block 2 -->
        <main class="product-details-section">
            <div class="container">
                <div class="pm-product-details">
                    <div class="row">
                        <!-- Blog Details Image Block -->
                        <div class="col-md-6">
                            <div class="image-block left-thumbnail">

                                <div class="main-image">
                                    <!-- Zoomable IMage -->


                                    <?php if (is_null($product['featured_image']) || empty($product['featured_image'])) { ?>
                                        <img id="zoom_03" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU" data-zoom-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU" alt="" />
                                    <?php } else { ?>
                                        <img id="zoom_03" style="width:100%" src="assets/image/product/<?= $product['featured_image'] ?>" data-zoom-image="assets/image/product/<?= $product['featured_image'] ?>" alt="" />
                                    <?php } ?>


                                </div>
                                <!-- Product Gallery with Slick Slider -->
                                <div id="product-view-gallery" class="elevate-gallery">
                                    <!-- Slick Single -->
                                    <?php foreach (get_all_product_gallery($product['id']) as $gallery) { ?>
                                        <a href="#" class="gallary-item" data-image="assets/image/product/gallery/<?= $gallery['images'] ?>" data-zoom-image="assets/image/product/gallery/<?= $gallery['images'] ?>">
                                            <img src="assets/image/product/gallery/<?= $gallery['images'] ?>" alt="" />
                                        </a>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5 mt-md-0">
                            <?php if (show_product_variation_by_product_id($_GET['id'])->num_rows > 0) { ?>
                                <div class="description-block">
                                    <div class="header-block">
                                        <h3><?= $product['title'] ?></h3>
                                    </div>
                                    <!-- Rating Block -->
                                    <p class="price" id="variation_price" style="color:#000">
                                        ₱<?= number_format($single_variation[3], 2) ?></p>
                                    <!-- Blog Short Description -->
                                    <div class="product-short-para">
                                        <p style="text-align:justify">
                                            <?= $product['short_description'] ?>
                                        </p>
                                    </div>

                                    <div class="product-short-para">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="radio-toolbar">
                                                        <?php $i = 1;
                                                        foreach ($variations as $variants) { ?>
                                                            <input type="radio" <?= $i == 1 ? 'checked' : '' ?> id="variant_<?= $variants['id'] ?>" onclick="variant_change_price('<?= $variants['id'] ?>','<?= $variants['price'] ?>','<?= $variants['stocks'] ?>')" name="variants" value="<?= $variants['variant'] ?>">

                                                            <label class="text-center" for="variant_<?= $variants['id'] ?>">
                                                                <?= $variants['variant'] ?> <br><strong style="font-size:12px">STOCKS:
                                                                    <?= $variants['stocks'] ?></strong>
                                                            </label>
                                                            <?php $i++ ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-short-para">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <?php foreach ($variations as $variants) { ?>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="status">
                                        <i class="fas fa-store fa-fw"></i><?= store_name($product['accounts_id'])['store_name'] ?><br>
                                        <i class="fas fa-home fa-fw"></i><?= empty($addressQuery['city']) || is_null($addressQuery['city']) ? 'Not Available' : $addressQuery['city'] ?>

                                    </div>
                                    <!-- Amount and Add to cart -->
                                    <?php if ($variations->num_rows > 0) { ?>
                                        <form method="GET" class="add-to-cart">

                                            <div class="count-input-block " style="width:100px">
                                                <input type="hidden" id="variation_id" name="variation_id" value="<?= $single_variation[0] ?>">
                                                <input type="hidden" id="price" name="price">
                                                <input type="hidden" name="add-to-cart-details" value="true">
                                                <input type="number" name="quantity" id="quantity" class="form-control text-center" min=1 max="<?= $single_variation[4] ?>" value="1">
                                            </div>
                                            <div class="btn-block">

                                                <button type="submit" class="btn ml--10 btn-success text-white">Add to
                                                    cart</button>

                                            </div>
                                        </form>
                                    <?php } else { ?>
                                        <div class="alert mt-2 alert-info">No available variation</div>
                                    <?php } ?>


                                </div>
                            <?php } else { ?>
                                <div class="alert alert-info">Product has no variation</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <section class="review-section pt--60">
                    <h2 class="sr-only d-none">Product Review</h2>
                    <div class="container">

                        <div class="product-details-tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DESCRIPTION</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-bs-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">REVIEWS</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <article>
                                        <h2 class="d-none sr-only">tab article</h2>
                                        <p style="text-align:justify">
                                            <?= $product['long_description'] ?>
                                        </p>
                                    </article>
                                </div>

                                <div class="tab-pane fade " id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <article>
                                        <h2 class="d-none sr-only">tab article</h2>
                                        <div class="review-wrapper">
                                            <h2 class="text-uppercase title-lg mb--20">
                                                <?= get_reviews($_GET['id'])->num_rows ?> REVIEW FOR
                                                <?= $product['title'] ?></h2>
                                            <?php if (get_reviews($_GET['id'])->num_rows > 0) { ?>
                                                <?php foreach (get_reviews($_GET['id']) as $reviews) { ?>
                                                    <div class="review-comment mb--20">
                                                        <div class="text">
                                                            <div class="rating-widget mb--15">
                                                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                                    <?php if ($i <= $reviews['ratings']) { ?>
                                                                        <span class="single-rating"><i class="fas fa-star"></i></span>
                                                                    <?php } else { ?>
                                                                        <span class="single-rating"><i class="far fa-star"></i></span>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                            <h6 class="author"><?= $reviews['customer'] ?> – <span class="font-weight-400"><?= date('F j Y g:i A', strtotime($reviews['created_at'])) ?></span>
                                                            </h6>
                                                            <p><?= $reviews['comments'] ?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            <?php } else { ?>
                                                <div class="col-12 mb-0">
                                                    <div class="text-center">No reviews yet.</div>
                                                </div>
                                            <?php } ?>

                                            <?php if ($verified > 0) { ?>
                                                <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                                                <div class="rating-row">

                                                    <form method="GET" class="mt--15 site-form ">
                                                        <input type="hidden" value="true" name="is_comment">
                                                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Your Rating</label>
                                                                    <span class="rating-widget-block">
                                                                        <input type="radio" name="star" required value="5" id="star1">
                                                                        <label for="star1"></label>
                                                                        <input type="radio" name="star" required value="4" id="star2">
                                                                        <label for="star2"></label>
                                                                        <input type="radio" name="star" required value="3" id="star3">
                                                                        <label for="star3"></label>
                                                                        <input type="radio" name="star" required value="2" id="star4">
                                                                        <label for="star4"></label>
                                                                        <input type="radio" name="star" required value="1" id="star5">
                                                                        <label for="star5"></label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="message">Comment</label>
                                                                    <textarea name="comments" id="message" required cols="30" rows="10" class="form-control"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="submit-btn">
                                                                    <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php } else { ?>
                                                <?php if (!isset($_SESSION['id'])) { ?>
                                                    <div class="alert alert-info mt-4">You need to login to comment.</div>
                                                <?php } else { ?>
                                                    <div class="alert alert-info mt-4">You did not yet purchase this item.</div>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </article>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="pt--50">
                        <div class="container">

                            <div class="block-title">
                                <h2>RELATED PRODUCTS</h2>
                            </div>
                            <div class="petmark-slick-slider border normal-slider" data-slick-setting='{
                              "autoplay": true,
                              "autoplaySpeed": 3000,
                              "slidesToShow": 5,
                              "arrows": true
                          }' data-slick-responsive='[
                              {"breakpoint":991, "settings": {"slidesToShow": 3} },
                              {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                          ]'>

                                <?php foreach (get_related_products($product['id'], $product['product_categories_id']) as $related) { ?>
                                    <div class="single-slide">
                                        <div class="pm-product">
                                            <div class="image">
                                                <?php if (is_null($related['featured_image']) || empty($related['featured_image'])) { ?>
                                                    <a href="product-details.php?id=<?= $related['id'] ?>"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU" alt=""></a>

                                                <?php } else { ?>
                                                    <a href="product-details.php?id=<?= $related['id'] ?>"><img src="assets/image/product/<?= $related['featured_image'] ?>" alt=""></a>

                                                <?php } ?>


                                                <!-- <span class="onsale-badge">Sale!</span> -->
                                            </div>
                                            <div class="content">
                                                <h3 class="text-center"><?= $related['title'] ?></h3>
                                                <div class="btn-block">
                                                    <a href="product-details.php?&id=<?= $related['id'] ?>" class="btn btn-outlined btn-rounded">View Product</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </section>
                <div id="review_modal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Submit Review</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-center mt-2 mb-4">
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                </h4>
                                <div class="form-group">
                                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                                </div>
                                <div class="form-group">
                                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <!-- Slider bLock 4 -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <?php include 'layouts/scripts.php'; ?>
    <script>
        document.getElementsByTagName('meta')["keywords"].content = "<?= $product['meta_keywords'] ?>";
        document.getElementsByTagName('meta')["description"].content = "<?= $product['meta_description'] ?>";
        document.title = "<?= $product['title'] ?>";

        function variant_change_price(id, price, stocks) {
            var amount = parseFloat(price).toFixed(2);
            $('#variation_price').html('₱' + addCommas(amount));
            $('#variation_id').val(id);
            $('#price').val(price);
            $('#quantity').attr('max', stocks)
        }


        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>

</body>

</html>