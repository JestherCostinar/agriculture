<?php include 'layouts/header.php';?>
<?php 
if(isset($_POST['btn_create_product'])) {
    $vendor_id                  = $_SESSION['vendor_id'];
    $title                      = $db->real_escape_string($_POST['title']);
    $product_categories_id      = $db->real_escape_string($_POST['product_categories_id']);
    $product_sub_categories_id  = $db->real_escape_string($_POST['product_sub_categories_id']);
    $short_description          = $db->real_escape_string($_POST['short_description']);
    $long_description           = $db->real_escape_string($_POST['long_description']);
    $is_featured                = $db->real_escape_string($_POST['is_featured']);
    $meta_description           = $db->real_escape_string($_POST['meta_description']);
    $meta_keywords              = $db->real_escape_string($_POST['meta_keywords']);
    add_products($vendor_id,$product_categories_id,$product_sub_categories_id,$title,$short_description,$long_description,$is_featured,$meta_description,$meta_keywords);
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
                            <a href="add-new-products.php" class="breadcrumb-item">Products</a>
                            <a href="" class="breadcrumb-item active" aria-current="page">Create</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
                <div class="form-group">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_default">Add New</button>
                </div>
                <!-- Basic card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                    <table class="table datatable-responsive">
                                        <thead>
                                            <tr>
                                                <th style="width:1px">#</th>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th style="width:1px">featured</th>
                                                <th style="width:1px">Variants</th>
                                                <th style="width:1px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach(get_all_products($_SESSION['vendor_id']) as $products) { ?>
                                            <?php 
                                                    $categoryQuery = get_specific_category($products['product_categories_id'])->fetch_assoc();
                                                    $subCategoryQuery = get_specific_sub_category($products['product_sub_categories_id'])->fetch_assoc();
                                                    $category = $categoryQuery['parent'];
                                                    $sub_category = $subCategoryQuery['child'];
                                                ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$products['title']?></td>
                                                <td><?=$category?></td>
                                                <td><?=$sub_category?></td>
                                                <td class="text-center"><?=$products['is_featured'] == 0 ? 'No' : 'Yes';?></td>
                                                <td class="text-center"><?=count_product_variation($products['id'])?></td>
                                                <td> <a href="view-product.php?id=<?=$products['id']?>">Edit</a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
        <div id="modal_default" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">Product Details</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Product:</label>
                            <div class="col-lg-9">
                                <input type="text" pattern="[a-zA-Z ]*" style="text-transform: capitalize;" class="form-control" name="title" required minlength="2" maxlength="20">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Category:</label>
                            <div class="col-lg-9">
                                <select name="product_categories_id" id="product_categories_id" class="form-control"
                                    required>
                                    <option value="">-- Select --</option>
                                    <?php foreach(get_all_category() as $category) { ?>
                                    <?php $checker = get_all_sub_categories($category['id'])->num_rows ?>
                                    <?php if($checker > 0) { ?>
                                    <option value="<?=$category['id']?>"><?=$category['parent']?></option>
                                    <?php } else { ?>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Sub Category:</label>
                            <div class="col-lg-9">
                                <select name="product_sub_categories_id" id="product_sub_categories_id"
                                    class="form-control" disabled required>
                                    <option value="">-- Select --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Featured Product:</label>
                            <div class="col-lg-9">
                                <select name="is_featured" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Featured Image:</label>
                            <div class="col-lg-9">
                                <input type="file" class="form-control" name="images">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Short Description:</label>
                            <div class="col-lg-9">
                                <textarea name="short_description" pattern="[a-zA-Z ]*" style="text-transform: capitalize;" class="form-control" id="" style="resize:none"
                                    cols="30" rows="5" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Long Description:</label>
                            <div class="col-lg-9">
                                <textarea name="long_description" pattern="[a-zA-Z ]*" style="text-transform: capitalize;" class="form-control" id="editor-full"
                                    style="resize:none" cols="30" rows="5" data-fouc required></textarea>
                            </div>
                        </div>

                        <h6>Search Engine Optimization</h6>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Meta Description:</label>
                            <div class="col-lg-9">
                                <textarea name="meta_description"  class="form-control" id="" style="resize:none"
                                    cols="30" rows="5" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Meta Keywords:</label>
                            <div class="col-lg-9">
                                <input type="text" name="meta_keywords" class="form-control tokenfield" data-fouc
                                    required>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" name="btn_create_product" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- /page content -->
    <?php include 'layouts/scripts.php';?>
    <script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script src="assets/js/demo_pages/datatables_responsive.js"></script>
    <!-- Theme JS files -->
    <script src="assets/js/plugins/forms/tags/tagsinput.min.js"></script>
    <script src="assets/js/plugins/forms/tags/tokenfield.min.js"></script>
    <script src="assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <script src="assets/js/plugins/ui/prism.min.js"></script>
    <script src="assets/js/demo_pages/form_tags_input.js"></script>
    <script src="assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
    <script src="assets/js/demo_pages/editor_ckeditor_default.js"></script>
    <script>
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
                        listitems += '<option value=' + value.id + '>' + value.child +
                            '</option>';
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