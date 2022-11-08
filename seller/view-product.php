<?php include 'layouts/header.php';?>

<?php if(get_specific_products($_GET['id'])->num_rows == 0) {
	header('location:add-new-products.php');
}
$data = get_specific_products($_GET['id'])->fetch_assoc();

if(isset($_GET['delete']) == true) {
    delete_gallery($_GET['id'],$_GET['gallery_id']);
}

if(isset($_POST['btn_add_gallery'])) {
    add_gallery($_GET['id']);
}

if(isset($_POST['btn_update_product'])) {
    $title                      = $db->real_escape_string($_POST['title']);
    $product_categories_id      = $db->real_escape_string($_POST['product_categories_id']);
    $product_sub_categories_id  = $db->real_escape_string($_POST['product_sub_categories_id']);
    $short_description          = $db->real_escape_string($_POST['short_description']);
    $long_description           = $db->real_escape_string($_POST['long_description']);
    $is_featured                = $db->real_escape_string($_POST['is_featured']);
    $meta_description           = $db->real_escape_string($_POST['meta_description']);
    $meta_keywords              = $db->real_escape_string($_POST['meta_keywords']);
    update_products($_GET['id'],$product_categories_id,$product_sub_categories_id,$title,$short_description,$long_description,$is_featured,$meta_description,$meta_keywords);
}

if(isset($_POST['btn_create_product_variation'])) {
    $product_id   = $db->real_escape_string($_POST['variant_product_id']);
    $variant_type = $db->real_escape_string($_POST['variant_type']);
    $price        = $db->real_escape_string($_POST['price']);
    $stocks       = $db->real_escape_string($_POST['stocks']);
    $discount     = $db->real_escape_string($_POST['discount']);
    $status       = $db->real_escape_string($_POST['status']);
    add_product_variation($product_id,$variant_type,$price,$stocks,$discount,$status);
}


if(isset($_POST['btn_update_product_variation'])) {
    $variant_id   = $db->real_escape_string($_POST['edit_variant_id']);
    $product_id   = $db->real_escape_string($_POST['edit_variant_product_id']);
    $variant_type = $db->real_escape_string($_POST['edit_variant_type']);
    $price        = $db->real_escape_string($_POST['edit_price']);
    $stocks       = $db->real_escape_string($_POST['edit_stocks']);
    $discount     = $db->real_escape_string($_POST['edit_discount']);
    $status       = $db->real_escape_string($_POST['edit_status']);
    update_product_variation($variant_id,$product_id,$variant_type,$price,$stocks,$discount,$status);
}

?>


<body>

    <!-- Main navbar -->
    <?php include 'layouts/top-navigation.php';?>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <?php include 'layouts/navigation.php';?>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content d-sm-flex">
                    <div class="page-title">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Product</span> -
                            Create</h4>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="dashboard.php" class="breadcrumb-item">Dashboard</a>
                            <a href="view-product.php" class="breadcrumb-item">Products</a>
                            <a href="" class="breadcrumb-item" aria-current="page">Create</a>
                            <a href="" class="breadcrumb-item active" aria-current="page"><?=$data['title']?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Basic card -->
                <div class="row">
                    <div class="col-12">
                                               
                        <?php if(isset($_GET['message'])) { ?>
                            <div class="alert alert-info"><?=$_GET['message']?></div>
                        <?php } ?>

                        <div>
                            <div class="card mb-0 rounded-bottom-0">
                                <div class="card-header">
                                    <h6 class="card-title">
                                        <a data-toggle="collapse" class="text-body"
                                            href="#collapsible-item-group1">Product General Information</a>
                                    </h6>
                                </div>

                                <div id="collapsible-item-group1" class="collapse">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-8 col-12">
                                                <h6>Product Details</h6>
                                                <form method="POST" enctype="multipart/form-data">


                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Product:</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" style="text-transform: capitalize;"
                                                                class="form-control" name="title"
                                                                value="<?=$data['title']?>" required minlength="4"
                                                                maxlength="20">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Category:</label>
                                                        <div class="col-lg-9">
                                                            <select name="product_categories_id"
                                                                id="product_categories_id" class="form-control"
                                                                required>
                                                                <option value="">-- Select --</option>
                                                                <?php foreach(get_all_category() as $category) { ?>
                                                                <?php $checker = get_all_sub_categories($category['id'])->num_rows ?>
                                                                <?php if($checker > 0) { ?>
                                                                <option value="<?=$category['id']?>"
                                                                    <?=$data['product_categories_id'] == $category['id'] ? 'selected' : ''?>>
                                                                    <?=$category['parent']?></option>
                                                                <?php } else { ?>
                                                                <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Sub Category:</label>
                                                        <div class="col-lg-9">
                                                            <select name="product_sub_categories_id"
                                                                id="product_sub_categories_id" class="form-control"
                                                                disabled required>
                                                                <option value="">-- Select --</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Featured Product:</label>
                                                        <div class="col-lg-9">
                                                            <select name="is_featured" class="form-control">
                                                                <option value="0"
                                                                    <?=$data['is_featured'] == 0 ? 'selected' : ''?>>No
                                                                </option>
                                                                <option value="1"
                                                                    <?=$data['is_featured'] == 1 ? 'selected' : ''?>>Yes
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Featured Image:</label>
                                                        <div class="col-lg-9">
                                                            <input type="file" class="form-control" name="images"
                                                                value="Upload">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Short
                                                            Description:</label>
                                                        <div class="col-lg-9">
                                                            <textarea name="short_description" minlength="4"
                                                                maxlength="50" style="text-transform: capitalize;"
                                                                class="form-control" id="" style="resize:none" cols="30"
                                                                rows="5"
                                                                required><?=$data['short_description']?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Long Description:</label>
                                                        <div class="col-lg-9">
                                                            <textarea name="long_description" minlength="4"
                                                                maxlength="50" style="text-transform: capitalize;"
                                                                class="form-control" id="editor-full"
                                                                style="resize:none" cols="30" rows="5" data-fouc
                                                                required><?=$data['long_description']?></textarea>
                                                        </div>
                                                    </div>

                                                    <h6>Search Engine Optimization</h6>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Meta Description:</label>
                                                        <div class="col-lg-9">
                                                            <textarea name="meta_description"
                                                                style="text-transform: capitalize;" class="form-control"
                                                                id="" style="resize:none" cols="30" rows="5"
                                                                required><?=$data['meta_description']?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Meta Keywords:</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" name="meta_keywords"
                                                                style="text-transform: capitalize;"
                                                                class="form-control tokenfield"
                                                                value="<?=$data['meta_keywords']?>" data-fouc required>
                                                        </div>
                                                    </div>


                                                    <div class="text-right">
                                                        <button type="submit" name="btn_update_product"
                                                            class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <h6>Product Gallery</h6>
                                                <div class="row">
                                                    <?php foreach(get_all_product_gallery($data['id']) as $gallery) { ?>
                                                    <div class="col-md-4 col-6">
                                                        <img src="../assets/image/product/gallery/<?=$gallery['images']?>"
                                                            class="img-responsive" style="width:100%;height:160px"
                                                            alt="">
                                                        <center><a
                                                                href="?id=<?=$data['id']?>&gallery_id=<?=$gallery['id']?>&delete=true">Delete</a>
                                                        </center>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="col-12">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-info btn-block btn-sm mb-2"
                                                            data-toggle="modal" data-target="#modal_gallery">Add
                                                            Gallery</a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>

                                                <h6>Featured Image</h6>
                                                <img src="../assets/image/product/<?=$data['featured_image']?>"
                                                    class="img-responsive" style="width:100%;height:auto" alt="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card mb-0 rounded-0 border-y-0">
                                <div class="card-header">
                                    <h6 class="card-title">
                                        <a class="collapsed text-body" data-toggle="collapse"
                                            href="#collapsible-item-group2">Product Variations</a>
                                            <a href="javascript:void(0)" title="Add Product Variation" class="float-right" data-toggle="modal" data-target="#modal_default"><i class="icon icon-plus2"></i></a>
                                    </h6>
                                </div>

                                <div id="collapsible-item-group2" class="collapse show">
                                    <div class="card-body">
                                        <table class="table datatable-responsive">
                                            <thead>
                                                <tr>
                                                    <th style="width:1px">#</th>
                                                    <th>Variation Type</th>
                                                    <th>Price</th>
                                                    <th>Stocks</th>
                                                    <th>Discount</th>
                                                    <th>Status</th>
                                                    <th style="width:1px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach(show_product_variation_by_product_id($_GET['id']) as $variation) { ?>
                                                    <tr>
                                                        <td><?=$i++?></td>
                                                        <td><?=$variation['variant']?></td>
                                                        <td>₱<?=number_format($variation['price'],2)?></td>
                                                        <td><?=$variation['stocks']?></td>
                                                        <td><?=$variation['discount']?>%</td>
                                                        <td><?=$variation['status'] == 0 ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>'?></td>
                                                        <td style="width:1px"><a onclick="edit_variation('<?=$variation['id']?>','<?=$variation['product_id']?>','<?=$variation['variant']?>','<?=$variation['price']?>','<?=$variation['stocks']?>','<?=$variation['discount']?>','<?=$variation['status']?>')" href="javascript:void(0)">Edit</a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /content area -->


            <!-- Footer -->
            <?php include 'layouts/footer.php';?>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>

    <form method="POST" enctype="multipart/form-data">
        <div id="modal_gallery" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Upload Gallery</label>
                                    <input type="file" class="form-control" multiple name="images[]"
                                        accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" name="btn_add_gallery" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" >
        <input type="hidden" name="variant_product_id" value="<?=$_GET['id']?>">
        <div id="modal_default" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">Variation Details</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Variation Type:</label>
                            <div class="col-lg-9">
                                <input type="text" style="text-transform: capitalize;" class="form-control" name="variant_type" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Price:</label>
                            <div class="col-lg-9">
                                <input type="text" style="text-transform: capitalize;" id="price" class="form-control" name="price" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Stocks:</label>
                            <div class="col-lg-9">
                                <input type="text" style="text-transform: capitalize;" id="stocks" class="form-control" name="stocks" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Discount:</label>
                            <div class="col-lg-9">
                                <select name="discount" class="form-control">
                                    <?php for($i=0;$i<=100;$i++) { ?>
                                        <option value="<?=$i?>"><?=$i?>%</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Status:</label>
                            <div class="col-lg-9">
                                <select name="status" class="form-control">
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" name="btn_create_product_variation" class="btn btn-primary">Add Variation</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <form method="POST" >
        <input type="hidden" id="variant_product_id" name="edit_variant_product_id" value="<?=$_GET['id']?>">
        <input type="hidden" id="variant_id" name="edit_variant_id" value="<?=$_GET['id']?>">
        <div id="modal_edit_default" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Variation Details</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Variation Type:</label>
                            <div class="col-lg-9">
                                <input type="text" style="text-transform: capitalize;" class="form-control" id="edit_variant_type" name="edit_variant_type" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Price:</label>
                            <div class="col-lg-9">
                                <input type="text" style="text-transform: capitalize;" class="form-control" id="edit_price" name="edit_price" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Stocks:</label>
                            <div class="col-lg-9">
                                <input type="text" style="text-transform: capitalize;" class="form-control" name="edit_stocks" id="edit_stocks" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Discount:</label>
                            <div class="col-lg-9">
                                <select name="edit_discount" id="edit_discount" class="form-control">
                                    <?php for($i=0;$i<=100;$i++) { ?>
                                        <option value="<?=$i?>"><?=$i?>%</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Status:</label>
                            <div class="col-lg-9">
                                <select name="edit_status" id="edit_status" class="form-control">
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" name="btn_update_product_variation" class="btn btn-primary">Update Variation</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- /page content -->
    <?php include 'layouts/scripts.php';?>
    <script>
        $('#stocks,#price').keypress(function(event) {
            if(event.which < 46 || event.which >= 58 || event.which == 47) {
                event.preventDefault();
            }

            if(event.which == 46 && $(this).val().indexOf('.') != -1) {
                this.value = '' ;
            }  
        });

    </script>
    <script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script src="assets/js/demo_pages/datatables_responsive.js"></script>
    <!-- Theme JS files -->
    <script src="assets/js/plugins/forms/tags/tagsinput.min.js"></script>
    <script src="assets/js/plugins/forms/tags/tokenfield.min.js"></script>
    <script src="assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <script src="assets/js/plugins/ui/prism.min.js"></script>
    <script src="assets/js/demo_pages/form_tags_input.js"></script>
    <!-- Theme JS files -->
    <script src="assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
    <script src="assets/js/demo_pages/editor_ckeditor_default.js"></script>
    <script>
        function edit_variation(id,product_id,variant,price,stocks,discount,status) {
            $('#modal_edit_default').modal();
            $('#variant_id').val(id);
            $('#edit_variant_type').val(variant);
            $('#edit_price').val(price);
            $('#edit_stocks').val(stocks);
            $('#edit_discount').val(discount);
            $('#edit_status').val(status);
        }


        var product_categories_id = $('#product_categories_id').val();
        var product_sub_categories_id = $('#product_sub_categories_id');
        product_sub_categories_id.find('option').remove();
        var sub_category = '<?=$data['product_sub_categories_id']?>';
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            dataType: 'json',
            data: {
                action: true,
                product_categories_id: product_categories_id
            },
            success: function (data) {
                var listitems = '';
                $.each(data, function (key, value) {
                    selected = sub_category == value.id ? 'selected' : '';
                    listitems += '<option value=' + value.id + ' ' + selected + '>' + value.child + '</option>';
                });
                product_sub_categories_id.append(listitems);
                $('#product_sub_categories_id').attr('disabled', false)
            },
            error: function (data) {
                $('#product_sub_categories_id').attr('disabled', true)
            }
        })


        $('#product_categories_id').change(e => {
            e.preventDefault();
            var product_categories_id = $('#product_categories_id').val();
            var product_sub_categories_id = $('#product_sub_categories_id');
            product_sub_categories_id.find('option').remove();
            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                dataType: 'json',
                data: {
                    action: true,
                    product_categories_id: product_categories_id
                },
                success: function (data) {
                    var listitems = '';
                    $.each(data, function (key, value) {
                        listitems += '<option value=' + value.id + '>' + value.child + '</option>';
                    });
                    product_sub_categories_id.append(listitems);
                    $('#product_sub_categories_id').attr('disabled', false)
                },
                error: function (data) {
                    $('#product_sub_categories_id').attr('disabled', true)
                }
            })
        })
    </script>
</body>

</html>