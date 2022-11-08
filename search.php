<?php include 'layouts/header.php';?>

<body>
    <div class="site-wrapper">
        <?php include 'layouts/navigation.php';?>
        <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </div>
        </nav>
        <!-- Promotion Block 2 -->
        <main class="section-padding shop-page-section">
            <div class="container">
                <div class="shop-toolbar mb--30">
                    <div class="row align-items-center">
                        <div class="col-5 col-md-3 col-lg-4">
                            <!-- Product View Mode -->
                            <div class="product-view-mode">
                                <a href="#" class="sortting-btn active" data-bs-target="list "><i
                                        class="fas fa-list"></i></a>
                                <a href="#" class="sortting-btn" data-bs-target="grid"><i class="fas fa-th"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-product-wrap list with-pagination row border grid-four-column  me-0 ms-0 g-0">
                    <?php foreach(get_searched_result($_GET['wildcard'],$_GET['category']) as $product){ ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="pm-product product-type-list  ">
                            <a href="product-details.php?id=<?=$product['id']?>" class="image" tabindex="0">
                            <?php if(empty($product['featured_image']) || is_null($product['featured_image'])) { ?>
                                <img style="width:270px;height:270px"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNGGjrfSqqv8UjL18xS4YypbK-q7po_8oVQ&usqp=CAU" alt="">
                            <?php } else { ?>
                                <img style="width:270px;height:270px"  src="assets/image/product/<?=$product['featured_image']?>" alt="">
                            <?php } ?>
                            </a>
                           
                            <div class="content">
                                <h3 class="font-weight-500"><a href="product-details.php"><?=$product['title']?></a></h3>
                               
                                <div class="btn-block grid-btn">
                                    <a href="product-details.php?&id=<?=$product['id']?>" class="btn btn-outlined btn-rounded">View Product</a>
                                </div>
                                <div class="card-list-content ">
                                    <article>
                                        <h3 class="d-none sr-only">Article</h3>
                                        <p style="text-align:justify" class="mr--20"><?=$product['short_description']?></p>
                                    </article>
                                    <div class="btn-block d-flex">
                                        <a href="product-details.php?&id=<?=$product['id']?>" class="btn btn-outlined btn-rounded">View Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </main>
        <!-- Slider bLock 4 -->

        <?php include 'layouts/footer.php';?>
    </div>
    <?php include 'layouts/scripts.php';?>
</body>

</html>