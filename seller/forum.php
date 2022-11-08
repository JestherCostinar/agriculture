<?php include 'layouts/header.php';?>

<?php
if(isset($_POST['btnForum'])) {
    global $db;
    $topic = $db->real_escape_string($_POST['topic']);
    $id = $db->real_escape_string($_POST['id']);
    $name = $db->real_escape_string($_POST['name']);
    create_thread($topic,$id,$name);
} else {
    $detect = false;
}

if(isset($_POST['btn_reply'])) { 
    global $db;
    $forum_id = $db->real_escape_string($_POST['forum_id']);
    $id       = $db->real_escape_string($_POST['id']);
    $name     = $db->real_escape_string($_POST['name']);
    $comment  = $db->real_escape_string($_POST['comment']);
    create_reply_thread($forum_id,$id,$name,$comment);
} else { 
}
?>
<style>

button {
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    font-size: 14px;
    padding: 4px 8px;
    color: rgba(0, 0, 0, 0.85);
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 4px;
}
button:hover,
button:focus,
button:active {
    cursor: pointer;
    background-color: #ecf0f1;
}
.comment-thread {
    max-width: 100%;
    margin: auto;
    padding: 0 30px;
    background-color: #fff;
    border: 1px solid transparent; /* Removes margin collapse */
}
.m-0 {
    margin: 0;
}
.sr-only {
    position: absolute;
    left: -10000px;
    top: auto;
    width: 1px;
    height: 1px;
    overflow: hidden;
}

/* Comment */

.comment {
    position: relative;
    margin: 20px auto;
}
.comment-heading {
    display: flex;
    align-items: center;
    height: 50px;
    font-size: 14px;
}
.comment-voting {
    width: 30px;
    height: 32px;
    margin-left:-10px;
    border: 1px solid #fff;
    border-radius: 4px;
}
.comment-voting button {
    display: block;
    width: 100%;
    height: 50%;
    padding: 0;
    border: 0;
    font-size: 10px;
}
.comment-info {
    color: rgba(0, 0, 0, 0.5);
    margin-left: 10px;
}
.comment-author {
    color: rgba(0, 0, 0, 0.85);
    font-weight: bold;
    text-decoration: none;
}
.comment-author:hover {
    text-decoration: underline;
}
.replies {
    margin-left: 20px;
}

/* Adjustments for the comment border links */

.comment-border-link {
    display: block;
    position: absolute;
    top: 50px;
    left: 0;
    width: 12px;
    height: calc(100% - 50px);
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    background-color: rgba(0, 0, 0, 0.1);
    background-clip: padding-box;
}
.comment-border-link:hover {
    background-color: rgba(0, 0, 0, 0.3);
}
.comment-body {
    padding: 0 20px;
    padding-left: 28px;
}
.replies {
    margin-left: 28px;
}

/* Adjustments for toggleable comments */

details.comment summary {
    position: relative;
    list-style: none;
    cursor: pointer;
}
details.comment summary::-webkit-details-marker {
    display: none;
}
details.comment:not([open]) .comment-heading {
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}
.comment-heading::after {
    display: inline-block;
    position: absolute;
    right: 5px;
    align-self: center;
    font-size: 12px;
    color: rgba(0, 0, 0, 0.55);
}
details.comment[open] .comment-heading::after {
    content: "Click to hide";
}
details.comment:not([open]) .comment-heading::after {
    content: "Click to show";
}

/* Adjustment for Internet Explorer */

@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
    /* Resets cursor, and removes prompt text on Internet Explorer */
    .comment-heading {
        cursor: default;
    }
    details.comment[open] .comment-heading::after,
    details.comment:not([open]) .comment-heading::after {
        content: " ";
    }
}

/* Styling the reply to comment form */

.reply-form textarea {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 16px;
    width: 100%;
    max-width: 100%;
    margin-top: 15px;
    margin-bottom: 5px;
}
.d-none {
    display: none;
}
</style>
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
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Forum</span></h4>
                </div>
            </div>

            <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="dashboard.php" class="breadcrumb-item">Dashboard</a>
                        <a href="transaction.php" class="breadcrumb-item">Exchange</a>
                        <a href="" class="breadcrumb-item active" aria-current="page">Approvals</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">


        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">
                    <!-- Login Form s-->
                    <?php if(isset($_SESSION['vendor'])) { ?>
                    <?php $details = account_details($_SESSION['vendor_id'])->fetch_assoc(); ?>
                    <form method="POST">
       
                        <input type="hidden" value="<?=$details['id']?>" name="id">
                        <input type="hidden" value="<?=$details['firstname'].' '.$details['surname']?> - Seller" name="name">

                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb--20">
                                            <div class="form-group">
                                                <label>What's on your mind? </label>
                                                <input class="form-control" type="text" name="topic" required>
                                            </div>
                                        </div>
                                        
                                         <div class="col-md-12 col-12 mb--20">
                                            <div class="form-group">
                                                <button type="submit" name="btnForum" class="btn btn-success text-white w-100">Submit</button>
                                            </div>
                                        </div>
                             
                                    </div>
                                  
                                </div>
                            </div>

                        </form>
                    <?php if(forum()->num_rows > 0) { ?>
                    <div class="comment-thread">
                        <?php foreach(forum() as $forum) { ?>
                        
                            <!-- Comment 1 start -->
                            <details open class="comment" id="comment-1">
                                <a href="#comment-1" class="comment-border-link">
                                    <span class="sr-only">Jump to comment-1</span>
                                </a>
                                <summary>
                                    <div class="comment-heading">
                                        <div class="comment-voting">
                                            <i class="icon icon-user icon-2x" style="margin:0px 0px 0px 4px"></i>
                                        </div>
                                        <div class="comment-info">
                                            <a href="#" class="comment-author"><?=$forum['name']?></a>
                                            <p class="m-0">
                                                <?=$forum['created_at']?>
                                            </p>
                                        </div>
                                    </div>
                                </summary>
                        
                                <div class="comment-body">
                                    <p>
                                        <?=$forum['topic']?>
                                    </p>
                                  
                                    <!-- Reply form start -->
                                    <form method="POST" class="reply-form ">
                                        <textarea name="comment" placeholder="Reply to comment" rows="4" required></textarea>
                                        <input type="hidden" value="<?=$forum['id']?>" name="forum_id">
                                        <input type="hidden" value="<?=$details['id']?>" name="id">
                                        <input type="hidden" value="<?=$details['firstname'].' '.$details['surname']?> - Seller" name="name">
                                        <button type="submit" name="btn_reply">Submit</button>
                                    </form>
                                    <!-- Reply form end -->
                                </div>
                        
                                <div class="replies">
                                    <?php if(reply_thread($forum['id'])->num_rows > 0) { ?>
                                        <?php foreach(reply_thread($forum['id']) as $thread) { ?>
                                            <details open class="comment" id="comment-2">
                                            <summary>
                                                <div class="comment-heading">
                                                    <div class="comment-voting">
                                                        <i class="icon icon-user icon-2x" style="margin:0px 0px 0px 4px"></i>
                                                    </div>
                                                    <div class="comment-info">
                                                        <a href="#" class="comment-author"><?=$thread['name']?></a>
                                                        <p class="m-0">
                                                            <?=$thread['created_at']?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </summary>
                            
                                            <div class="comment-body">
                                                <p>
                                                    <?=$thread['comment']?>
                                                </p>
                                                
                                            </div>
                                        </details>
                                        <?php } ?>
                                    <?php } else { ?>
                                    <?php } ?>
                        
                                </div>
                            </details>
                            <!-- Comment 1 end -->
                     
                    <?php } ?>
                       </div>
                    <?php } else { ?>
                   
                    <?php } ?>
                    
                    
                    <?php } else { ?>
                    
                    <div class="alert alert-info">You need to log in to create a thread</div>
                    
                    
                    <?php if(forum()->num_rows > 0) { ?>
                    <div class="comment-thread">
                        <?php foreach(forum() as $forum) { ?>
                        
                            <!-- Comment 1 start -->
                            <details open class="comment" id="comment-1">
                                <a href="#comment-1" class="comment-border-link">
                                    <span class="sr-only">Jump to comment-1</span>
                                </a>
                                <summary>
                                    <div class="comment-heading">
                                        <div class="comment-voting">
                                            <i class="icon icon-user icon-2x" style="margin:0px 0px 0px 4px"></i>
                                        </div>
                                        <div class="comment-info">
                                            <a href="#" class="comment-author"><?=$forum['name']?></a>
                                            <p class="m-0">
                                                <?=$forum['created_at']?>
                                            </p>
                                        </div>
                                    </div>
                                </summary>
                        
                        
                                <div class="replies">
                                    <?php if(reply_thread($forum['id'])->num_rows > 0) { ?>
                                        <?php foreach(reply_thread($forum['id']) as $thread) { ?>
                                            <details open class="comment" id="comment-2">
                                            <summary>
                                                <div class="comment-heading">
                                                    <div class="comment-voting">
                                                        <i class="icon icon-user icon-2x" style="margin:0px 0px 0px 4px"></i>
                                                    </div>
                                                    <div class="comment-info">
                                                        <a href="#" class="comment-author"><?=$thread['name']?></a>
                                                        <p class="m-0">
                                                            <?=$thread['created_at']?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </summary>
                            
                                            <div class="comment-body">
                                                <p>
                                                    <?=$thread['comment']?>
                                                </p>
                                                
                                            </div>
                                        </details>
                                        <?php } ?>
                                    <?php } else { ?>
                                    <?php } ?>
                        
                                </div>
                            </details>
                            <!-- Comment 1 end -->
                     
                    <?php } ?>
                       </div>
                    <?php } else { ?>
                   
                    <?php } ?>
      
                    <?php } ?>
                    
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
<!-- /page content -->
<?php include 'layouts/scripts.php';?>
<!-- Theme JS files -->
<script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
<script src="assets/js/demo_pages/datatables_responsive.js"></script>
</body>


</html>