<?php
include 'database.php';

function login($username,$password,$role) {
    global $db;
    $check = $db->query("SELECT * FROM accounts WHERE username = '$username' AND status = 0"); // validate if username already exist
    if($check->num_rows > 0) {
        $row = $check->fetch_assoc();
        if(password_verify($password,$row['password'])) {
            $_SESSION['role'] = $row['role'];
            if($row['role']   == 0) {
                $_SESSION['administrator']  = 1;
                $_SESSION['admin_id']       = $row['id'];
                header('location: dashboard.php');
            } elseif($row['role']   == 2) {
                $_SESSION['vendor']         = 1;
                $_SESSION['vendor_id']      = $row['id'];
                header('location: dashboard.php');
            } else {
                $_SESSION['customer']       = 1;
                $_SESSION['id']             = $row['id'];
                header('location: my-account.php');
            }
        } else {
            if($role == 0) {
                header('location: index.php?success=false&message='.urlencode('Invalid username or password'));
            } elseif($role == 2) {
                header('location: index.php?success=false&message='.urlencode('Invalid username or password'));
            } else {
                header('location: login.php?success=false&message='.urlencode('Invalid username or password'));
            }
        }
    } else {
        if($role == 0) {
            header('location: index.php?success=false&message='.urlencode('Invalid username or password'));
        } elseif($role == 2) {
            header('location: index.php?success=false&message='.urlencode('Invalid username or password'));
        } else {
            header('location: login.php?success=false&message='.urlencode('Invalid username or password'));
        }
    }
}

function activate($reference) {
    global $db;
    $checker = $db->query("SELECT * FROM accounts WHERE is_code = $reference");
    if($checker->num_rows > 0) {
        $row = $checker->fetch_assoc();
        if($row['status'] == 0) {
            header('location: login.php?success=false&message='.urlencode('Account already activated'));
        } else {
            $rand = rand(111111,999999);
            $query = $db->query("UPDATE accounts SET status = 0, is_code = $rand WHERE is_code = $reference");
            header('location: login.php?success=true&message='.urlencode('Your account has been activated'));
        }
    } else {
        header('location: login.php?success=false&message='.urlencode('Invalid code.'));
    }
}

function forum() {
    global $db;
    return $db->query("SELECT * FROM forum GROUP BY id DESC");
}

function report($firstname,$lastname,$email,$message,$subject) {
    $to      = 'trans4mers.iagri2022@gmail.com';
    $subject = $subject. '('.$email.')';
    $mail    = mail($to,$subject,$message);
    if($mail) {
        header('location: home.php?success=true&message='.urlencode('Report has been submitted.'));
    }
}

function report_vendor($firstname,$lastname,$email,$message,$subject) {
    $to      = 'trans4mers.iagri2022@gmail.com';
    $subject = $subject. '('.$email.')';
    $mail    = mail($to,$subject,$message);
    if($mail) {
        header('location: report-a-problem.php?success=true&message='.urlencode('Report has been submitted.'));
    }
}
function create_thread($topic,$id,$name) {
    global $db;
    
    $query = $db->query("INSERT INTO forum (topic,accounts_id,name) VALUES ('$topic','$id','$name')");
    if($query) {
        header('location: forum.php?success=true&message='.urlencode('Thread has been created.'));
    }
     
}

function reply_thread($forum_id) {
    global $db;
    return $db->query("SELECT * FROM comments WHERE forum_id = $forum_id");
}

function create_reply_thread($forum_id,$id,$name,$comment) {
    global $db;
    $query = $db->query("INSERT INTO comments (forum_id,accounts_id,name,comment) VALUES ('$forum_id','$id','$name','$comment')");
    if($query) {
        header('location: forum.php?success=true&message='.urlencode('New comment has been added.'));
    }
}


function forgot_password($email) {
    global $db;
    $checker = $db->query("SELECT * FROM accounts WHERE email = '$email'");
    if($checker->num_rows > 0) {
        $row                 = $checker->fetch_assoc();
        $code                = $row['is_code'];
        $to                  = $email;
        $subject             = "Retrieve Your Account";
        $_SESSION['is_code'] = $row['is_code'];
        $link                = 'https://i-agri.tk/retrieve.php';
        $message             = "Please copy this code $code and paste it to this link $link to retrieve your account.";
        $mail                = mail($to,$subject,$message);

        header('location: login.php?success=true&message='.urlencode('Please check your registered email or spam / junk to retrieve your account'));

    } else {
        header('location: login.php?success=false&message='.urlencode('Email address is not exist.'));
    }
}

function forgot_password_vendor($email) {
    global $db;
    $checker = $db->query("SELECT * FROM accounts WHERE email = '$email'");
    if($checker->num_rows > 0) {
        $row                 = $checker->fetch_assoc();
        $code                = $row['is_code'];
        $to                  = $email;
        $subject             = "Retrieve Your Account";
        $_SESSION['is_code'] = $row['is_code'];
        $link                = 'https://i-agri.tk/retrieve.php';
        $message             = "Please copy this code $code and paste it to this link $link to retrieve your account.";
        $mail                = mail($to,$subject,$message);

        header('location: index.php?success=true&message='.urlencode('Please check your registered email or spam / junk to retrieve your account'));

    } else {
        header('location: index.php?success=false&message='.urlencode('Email address is not exist.'));
    }
}

function seller_forgot_password($email) {
    global $db;
    $checker = $db->query("SELECT * FROM accounts WHERE email = '$email'");
    if($checker->num_rows > 0) {
        $row                 = $checker->fetch_assoc();
        $code                = $row['is_code'];
        $to                  = $email;
        $subject             = "Retrieve Your Account";
        $_SESSION['is_code'] = $row['is_code'];
        $link                = 'https://i-agri.tk/retrieve.php';
        $message             = "Please copy this code $code and paste it to this link $link to retrieve your account.";
        $mail                = mail($to,$subject,$message);

        header('location: index.php?success=true&message='.urlencode('Please check your registered email or spam / junk to retrieve your account'));

    } else {
        header('location: index.php?success=false&message='.urlencode('Email address is not exist.'));
    }
}

function view_my_exchange_requesting($accounts_id) {
    global $db;
    return $db->query("SELECT * FROM exchanger WHERE owner_id = $accounts_id GROUP BY reference");
}

function view_my_exchange_approval($accounts_id) {
    global $db;
    return $db->query("SELECT * FROM exchanger WHERE approver_id != $accounts_id  AND status = 0 GROUP BY reference");
}



function view_my_exchange_approval_list($accounts_id,$reference) {
    global $db;
    return $db->query("SELECT * FROM exchanger WHERE approver_id = $accounts_id AND reference = '$reference' AND status = 0");
}

function reject_exchange($approver,$reference) {
    global $db;
    
    $query = $db->query("SELECT * FROM exchanger WHERE  reference = '$reference'");
    if($query->num_rows > 0) {
        $query = $db->query("UPDATE exchanger SET status = 2 WHERE reference = '$reference'");
        if($query) {
            header('location: exchange-approval.php?success=true&message='.urlencode('Exchange has been rejected.'));
        }
    } else {
        header('location: exchange-approval.php?success=false&message='.urlencode('No record found.'));
    }
}

function complete_exchange($approver,$reference) {
    global $db;
    $query = $db->query("SELECT * FROM exchanger WHERE  reference = '$reference'");
    foreach($query as $d) {
        if($d['approver_id'] == $approver) {
            $quantity = $d['quantity'];
            $requestor_id = $d['approver_id'];
            $product_id = $d['product_id'];
            $productQuery = $db->query("SELECT * FROM product WHERE id = $product_id");
            foreach($productQuery as $pQuery) {
                $featured_image             = $pQuery['featured_image'];
                $product_categories_id      = $pQuery['product_categories_id'];
                $product_sub_categories_id  = $pQuery['product_sub_categories_id'];
                $title                      = $pQuery['title'];
                $short_description          = $pQuery['short_description'];
                $long_description           = $pQuery['long_description'];
                $is_featured                = $pQuery['is_featured'];
                $meta_description           = $pQuery['meta_description'];
                $meta_keywords              = $pQuery['meta_keywords'];
                $db->query("INSERT INTO product (accounts_id,featured_image,product_categories_id,product_sub_categories_id,title,short_description,long_description,is_featured,meta_description,meta_keywords) VALUES ('$approver','$featured_image','$product_categories_id','$product_sub_categories_id','$title','$short_description','$long_description','$is_featured','$meta_description','$meta_keywords')");
                $last_iserted_id = $db->insert_id;
                $variant         = $d['variant'];
                $price           = $d['price'];
                $stocks          = $d['quantity'];
                $db->query("INSERT INTO product_variations (product_id,variant,price,stocks,discount,status) VALUES ($last_iserted_id,'$variant',$price,$stocks,0,0)");
            }
            $updateQuery = $db->query("UPDATE product_variations SET stocks=stocks-$quantity WHERE id=".$d['variation_id']);
        } else {
            $requestor_id = $d['approver_id'];
            $product_id = $d['product_id'];
            $productQuery = $db->query("SELECT * FROM product WHERE id = $product_id");
            foreach($productQuery as $pQuery) {
                $featured_image             = $pQuery['featured_image'];
                $product_categories_id      = $pQuery['product_categories_id'];
                $product_sub_categories_id  = $pQuery['product_sub_categories_id'];
                $title                      = $pQuery['title'];
                $short_description          = $pQuery['short_description'];
                $long_description           = $pQuery['long_description'];
                $is_featured                = $pQuery['is_featured'];
                $meta_description           = $pQuery['meta_description'];
                $meta_keywords              = $pQuery['meta_keywords'];
                $db->query("INSERT INTO product (accounts_id,featured_image,product_categories_id,product_sub_categories_id,title,short_description,long_description,is_featured,meta_description,meta_keywords) VALUES ('$requestor_id','$featured_image','$product_categories_id','$product_sub_categories_id','$title','$short_description','$long_description','$is_featured','$meta_description','$meta_keywords')");
                $last_iserted_id = $db->insert_id;
                $variant         = $d['variant'];
                $price           = $d['price'];
                $stocks          = $d['quantity'];
                $db->query("INSERT INTO product_variations (product_id,variant,price,stocks,discount,status) VALUES ($last_iserted_id,'$variant',$price,$stocks,0,0)");
            }

        }
        $db->query("UPDATE exchanger SET status = 1 WHERE reference = '$reference'");
    }
    header('location: exchange-approval.php?success=true&message='.urlencode('Exchange has been completed.'));

}

function view_my_exchange_lists_all($accounts_id,$reference) {
    global $db;
    return $db->query("SELECT * FROM exchanger WHERE owner_id = $accounts_id AND reference = '$reference'");
}

function retrieve_account($is_code,$new_password,$confirm_new_password) {
    global $db;

    $checker = $db->query("SELECT * FROM accounts WHERE is_code = '$is_code'");
    if($checker->num_rows > 0) {

        $row                 = $checker->fetch_assoc();
        $code                = $row['is_code'];

        if($_SESSION['is_code'] == $row['is_code']) {
            echo 1;

            $rand = rand(111111,999999);

            $password = password_hash($new_password,PASSWORD_DEFAULT);
            echo 1;
            $query = $db->query("UPDATE accounts SET password = '$password', is_code = $rand WHERE is_code = $is_code ");
            if($query) {
                session_destroy();
                header('location: login.php?success=true&message='.urlencode('Your account has been retrieved.'));
            } else {
                header('location: login.php?success=false&message='.urlencode('An error occured.'));
            }
        } else {
            header('location: login.php?success=false&message='.urlencode('Code is invalid.'));
        }
    } else {
        header('location: login.php?success=false&message='.urlencode('Code is invalid.'));
    }
}

function exchange_status($status,$accounts_id,$approver) {
    global $db;
    return $db->query("SELECT * FROM exchanger WHERE status = $status AND owner_id = $accounts_id AND approver_id = $approver GROUP BY reference");
}


function cancel($reference) {
    global $db;
    $checker = $db->query("SELECT * FROM transaction WHERE reference = '$reference'");
    if($checker->num_rows > 0) {
        foreach($checker as $d) {
            $quantity     = $d['quantity'];
            $variation_id = $d['variation_id'];
            $db->query("UPDATE product_variations SET stocks=stocks+$quantity WHERE id = $variation_id");
        }
        $query = $db->query("UPDATE transaction SET status = 3 WHERE reference = '$reference'");
        header('location: orders.php?reference='.$reference.'&success=true&message='.urlencode('Your transaction has been cancelled'));
    } else {
        header('location: orders.php?reference='.$reference.'&success=false&message='.urlencode('Reference not found'));
    }
}
function logout() {
    unset($_SESSION['customer'],$_SESSION['id']);
    session_destroy();
    header('location: home.php');
}



function create_vendor($surname,$firstname,$email,$contact,$username,$pwd,$role) {
    global $db;
    $check = $db->query("SELECT * FROM accounts WHERE email = '$email'"); // validate if email already exist
    if($check->num_rows > 0) {
        header('location: add-new-vendor.php?success=false&message='.urlencode('Email already exist'));
    } else {
        $month    = date('n');
        $year     = date('Y');
        $password = password_hash($pwd,PASSWORD_DEFAULT);
        $query    = $db->query("INSERT INTO accounts (surname,firstname,email,contact,username,password,role,status,month,year) VALUES ('$surname','$firstname','$email','$contact','$username','$password',$role,0,$month,$year)");
        if($role == 2) {
            if($query) {
                $id = $db->insert_id;
                $query    = $db->query("INSERT INTO store (vendor_id,images,store_name,status) VALUES ($id,null,null,0)");
                header('location: add-new-vendor.php?success=true&message='.urlencode('Your account has been created'));
            } else {
                echo $db->error;
                exit;
            }
        } else {
            header('location: add-new-vendor.php?success=true&message='.urlencode('Your account has been created'));
        }
    }
}

function update_vendor($id,$surname,$firstname,$email,$contact,$is_verified) {
    global $db;
    $query = $db->query("UPDATE accounts SET surname = '$surname', firstname = '$firstname', email = '$email', contact = '$contact', is_verified = '$is_verified' WHERE id = $id");
    if($query) {
        header('location: add-new-vendor.php?success=true&message='.urlencode('Vendor has been updated'));
    }
}

function get_vendors() {
    global $db;
    $query = $db->query("SELECT * FROM accounts WHERE role != 1");
    return $query;
}

function create_new_account($surname,$firstname,$contact,$email,$username,$pwd,$role,$valid_id,$store_name) {
    global $db;
    $check = $db->query("SELECT * FROM accounts WHERE email = '$email' "); // validate if email already exist
    if($check->num_rows > 0) {
        header('location: register.php?success=false&message='.urlencode('Email already exist'));
    } else {
        $check = $db->query("SELECT * FROM accounts WHERE username = '$username'");
        if($check->num_rows > 0) {
            header('location: register.php?success=false&message='.urlencode('Username already exists'));
        } else {
            if($role == 1) {
            $is_code  = rand(111111,999999);
            $code     = 'https://i-agri.tk/activate.php?reference='.$is_code;
            $month    = date('n');
            $year     = date('Y');
            $password = password_hash($pwd,PASSWORD_DEFAULT);
            $to       = $email;
            $subject = "Account Activation";
            $message = "Please copy this link $code and paste it to your browser to activate your account.";


            // ETO YUNG ERROR. AYUSIN NYO YUNG CONFIGURATION NETO.
            $mail = mail($to,$subject,$message);
            if($mail) {
                $query    = $db->query("INSERT INTO accounts (firstname,surname,email,contact,username,password,role,status,month,year,is_code) VALUES ('$firstname','$surname','$email','$contact','$username','$password',$role,1,$month,$year,'$is_code')");
                if($query) {
                    header('location: login.php?success=true&message='.urlencode('Your account has been created'));
                }
            } else {
                header('location: login.php?success=false&message='.urlencode("An error occured."));
            }
        } elseif($role == 2) {
            $month       = date('n');
            $year        = date('Y');
            $password    = password_hash($pwd,PASSWORD_DEFAULT);
            $is_code     = rand(111111,999999);
            $code        = 'https://i-agri.tk/activate.php?reference='.$is_code;
            $requirement = $_FILES['files']['name'];
            move_uploaded_file($_FILES['files']['tmp_name'],'assets/image/requirement/'.$_FILES['files']['name']);

            $to       = $email;
            $subject = "Account Activation";
            $message = "Please copy this link $code and paste it to your browser to activate your account.";


            $mail = mail($to,$subject,$message);
            if($mail) {
                $query    = $db->query("INSERT INTO accounts (firstname,surname,email,contact,username,password,role,status,month,year,valid_id,requirement,is_code) VALUES ('$firstname','$surname','$email','$contact','$username','$password',$role,1,$month,$year,'$valid_id','$requirement','$is_code')");
                if($query) {
                    $id = $db->insert_id;
                    $db->query("INSERT INTO store (vendor_id,store_name) VALUES ($id,'$store_name')");
                    header('location: login.php?success=true&message='.urlencode('Your account has been created'));
                } else {
                    header('location: login.php?success=false&message='.urlencode($db->error));
                }
            } else {
                header('location: login.php?success=false&message='.urlencode("An error occured."));
            }


        } else {

        }
        }
       

    }
}

function get_all_customer($from,$to) {
    global $db;
    if(empty($from) && empty($to)) {
        $query = $db->query("SELECT * FROM accounts WHERE role = 1");
    } else {
        $query = $db->query("SELECT * FROM accounts WHERE role = 1 AND created_at BETWEEN '$from' AND '$to'");
    }
    return $query;
}



function most_buying_product($from,$to) {
    global $db;
    if(empty($from) && empty($to)) {
        $query = $db->query("SELECT *, SUM(quantity) as items FROM transaction GROUP BY product ORDER BY items DESC");
    } else {
        $query = $db->query("SELECT *, SUM(quantity) as items FROM transaction WHERE created_at BETWEEN '$from' AND '$to' GROUP BY product  ORDER BY items DESC");
    }
    return $query;
}

function product_counter($product) {
    global $db;
    $query = $db->query("SELECT * FROM transaction WHERE product = '$product'");
    return $query->fetch_assoc();
}




function get_all_payments($from,$to) {
    global $db;
    if(empty($from) && empty($to)) {
        $query = $db->query("SELECT *, COUNT('method_of_payment') as items FROM transaction GROUP BY method_of_payment");
    } else {
        $query = $db->query("SELECT *, COUNT('method_of_payment') as items FROM transaction WHERE created_at BETWEEN '$from' AND '$to'  GROUP BY method_of_payment");
    }
    return $query;
}

function account_details($id) {
    global $db;
    $query = $db->query("SELECT * FROM accounts WHERE id = $id");
    return $query;
}

function store_details($id) {
    global $db;
    $query = $db->query("SELECT * FROM store WHERE vendor_id = $id");
    return $query;
}



function update_account_details($firstname,$surname,$email,$contact,$birthday = null,$gender = null) {
    global $db;
    if(isset($_FILES["images"]) && isset($_SESSION['vendor'])) {
        foreach($_FILES["images"]["tmp_name"] as $key => $value) {
            $requirement = $_FILES['images']['name'][$key];
            move_uploaded_file($_FILES['images']['tmp_name'][$key],'../assets/image/requirement/'.$requirement);
            $query = $db->query("UPDATE accounts SET firstname = '$firstname', surname = '$surname', email = '$email', contact = '$contact', requirement = '$requirement' WHERE id = ".$_SESSION['vendor_id']);
        }
        $header = 'location: profile.php?success=true&message='.urlencode('Account details has been updated');
    } else {
        if(isset($_FILES["images"])) {
            foreach($_FILES["images"]["tmp_name"] as $key => $value) {
                $profile = $_FILES['images']['name'][$key];
                move_uploaded_file($_FILES['images']['tmp_name'][$key],'assets/profile/'.$profile);
                $query = $db->query("UPDATE accounts SET profile = '$profile', firstname = '$firstname', surname = '$surname', email = '$email', contact = '$contact', birthday = '$birthday', gender = '$gender' WHERE id = ".$_SESSION['id']);
            }

        } else {
            $query = $db->query("UPDATE accounts SET firstname = '$firstname', surname = '$surname', email = '$email', contact = '$contact', birthday = '$birthday', gender = '$gender' WHERE id = ".$_SESSION['id']);
        }

        $header = 'location: my-account.php?success=true&message='.urlencode('Account details has been updated');
    }

    if($query) {
        header($header);
    }
}

function update_store($store_name,$shipping_fee) {
    global $db;
    foreach($_FILES["images"]["tmp_name"] as $key => $value) {
        $image_name = $_FILES['images']['name'][$key];
        move_uploaded_file($_FILES['images']['tmp_name'][$key],'../assets/image/vendor/'.$image_name);
        $query = $db->query("UPDATE store SET images = '$image_name', store_name = '$store_name', shipping_fee = $shipping_fee WHERE vendor_id = ".$_SESSION['vendor_id']);
    }
    header('location: profile.php?success=true&message='.urlencode('Store has been updated'));
}


function account_billing_address($id) {
    global $db;
    $query = $db->query("SELECT * FROM accounts_address WHERE category = 'Billing Address' AND accounts_id = $id");
    return $query;
}

function account_shipping_address($id) {
    global $db;
    $query = $db->query("SELECT * FROM accounts_address WHERE category = 'Shipping Address' AND accounts_id = $id");
    return $query;
}

function store_name($vendor_id) {
    global $db;
    $query = $db->query("SELECT * FROM store WHERE vendor_id = $vendor_id");
    return $query->fetch_assoc();
}

function get_all_products($vendor_id = null) {
    global $db;
    if($vendor_id == null) {
        $query = $db->query("SELECT * FROM product");
    } else {
        $query = $db->query("SELECT * FROM product WHERE accounts_id = $vendor_id");
    }
    return $query;
}

function get_all_products_by_stores($accounts_id) {
    global $db;
    $query = $db->query("SELECT * FROM product WHERE accounts_id = $accounts_id");
    return $query;
}



function get_searched_result($title,$category) {
    global $db;
    $wildcard = urldecode($title);
    if($category == 'all') {
        $query = $db->query("SELECT * FROM product WHERE title LIKE '%$wildcard%'");
    } else {
        $query = $db->query("SELECT * FROM product WHERE product_categories_id = $category AND title LIKE '%$wildcard%'");
    }
    return $query;
}

function get_accounts_address($vendor_id) {
    global $db;
    return $db->query("SELECT * FROM accounts_address WHERE accounts_id = ".$vendor_id);
}

function insert_or_update_address($id,$city,$state,$zip,$address) {
    global $db;
    $vendor_id = $_SESSION['vendor_id'];
    $check = $db->query("SELECT * FROM accounts_address WHERE accounts_id = ".$vendor_id);
    if($check->num_rows > 0) {
        $query = $db->query("UPDATE accounts_address SET country = 'PH', city = '$city', state = '$state', zip = '$zip', address = '$address', category = null WHERE accounts_id = ".$vendor_id);
        header('location: profile.php?success=true&message='.urlencode('Address has been updated'));
    } else {
        $query = $db->query("INSERT INTO accounts_address (accounts_id,country,city,state,address,zip,category) VALUES ('$vendor_id','PH','$city','$state','$address','$zip',null)");
        header('location: profile.php?success=true&message='.urlencode('Address has been updated'));
    }
}


function insert_or_update_account_billing_details($id,$country,$city,$state,$zip,$address,$category) {
    global $db;
    $accounts_id = $_SESSION['id'];
    $check = $db->query("SELECT * FROM accounts_address WHERE category = 'Billing Address' AND id = ".$id);
    if($check->num_rows > 0) {
        $query = $db->query("UPDATE accounts_address SET country = '$country', city = '$city', state = '$state', zip = '$zip', address = '$address', category = '$category' WHERE id = ".$id);
        header('location: my-account.php?success=true&message='.urlencode('Billing Address has been updated'));
    } else {
        $query = $db->query("INSERT INTO accounts_address (accounts_id,country,city,state,address,zip,category) VALUES ('$accounts_id','$country','$city','$state','$address','$zip','$category')");
        header('location: my-account.php?success=true&message='.urlencode('Billing Address has been updated'));
    }
}

function insert_or_update_account_shipping_details($id,$shipping_firstname,$shipping_surname,$contact,$country,$city,$state,$zip,$address,$category) {
    global $db;
    $accounts_id = $_SESSION['id'];
    $check = $db->query("SELECT * FROM accounts_address WHERE category = 'Shipping Address' AND id = ".$id);
    if($check->num_rows > 0) {
        $query = $db->query("UPDATE accounts_address SET  shipping_firstname = '$shipping_firstname', shipping_surname = '$shipping_surname', contact = '$contact', country = '$country', city = '$city', state = '$state', zip = '$zip', address = '$address', category = '$category' WHERE id = ".$id);
        header('location: my-account.php?success=true&message='.urlencode('Shipping Address has been updated'));
    } else {
        $query = $db->query("INSERT INTO accounts_address (accounts_id,shipping_firstname,shipping_surname,contact,country,city,state,address,zip,category) VALUES ('$accounts_id','$shipping_firstname','$shipping_surname','$contact','$country','$city','$state','$address','$zip','$category')");
        header('location: my-account.php?success=true&message='.urlencode('Shipping Address has been updated'));
    }
}

function my_orders() {
    global $db;
    $query = $db->query("SELECT *, SUM(price * quantity) as total, SUM(shipping_fee/items) as sf, COUNT(reference) as total_items FROM transaction WHERE accounts_id = ".$_SESSION['id']." GROUP BY reference ORDER BY created_at DESC ");
    return $query;
}

function view_orders($vendor_id = null) {
    global $db;
    if($vendor_id == null) {
        $query = $db->query("SELECT *, SUM(price * quantity ) as total, SUM(shipping_fee/items) as sf, COUNT(reference) as total_items FROM transaction GROUP BY reference ORDER BY created_at DESC ");
    } else {
        $query = $db->query("SELECT *, SUM(price * quantity ) as total, SUM(shipping_fee/items) as sf, COUNT(reference) as total_items FROM transaction WHERE vendor_id = $vendor_id GROUP BY reference ORDER BY created_at DESC ");

    }
    return $query;
}



function get_order_details($reference,$vendor_id=null) {
    global $db;
    if($vendor_id == null) {
        $query = $db->query("SELECT * FROM transaction WHERE reference = '$reference'");
    } else {
        $query = $db->query("SELECT * FROM transaction WHERE reference = '$reference' AND vendor_id = '$vendor_id'");
    }
    return $query;
}

function get_all_order_details($from,$to,$vendor_id = null) {
    global $db;
    if($vendor_id == null) {
        if(empty($from) && empty($to)) {
            $query = $db->query("SELECT * FROM transaction WHERE status = 2 ");
        } else {
            $query = $db->query("SELECT * FROM transaction WHERE status = 2 AND created_at BETWEEN '$from' AND '$to'");
        }
    } else {
        if(empty($from) && empty($to)) {
            $query = $db->query("SELECT * FROM transaction WHERE status = 2 AND vendor_id = $vendor_id ");
        } else {
            $query = $db->query("SELECT * FROM transaction WHERE status = 2 AND vendor_id = $vendor_id AND created_at BETWEEN '$from' AND '$to'");
        }
    }

    return $query;
}

function get_genders($from,$to) {
    global $db;
    if(empty($from) && empty($to)) {
        $query = $db->query("SELECT * FROM accounts WHERE role = 1 GROUP BY gender");
    } else {
        $query = $db->query("SELECT * FROM accounts WHERE role = 1 AND created_at BETWEEN '$from' AND '$to' GROUP BY gender");
    }
    return $query;
}

function gender_counter($gender) {
    global $db;
    $query = $db->query("SELECT * FROM accounts WHERE gender = '$gender' AND role = 1");
    return $query->num_rows;
}

function age_counter($age) {
    global $db;
    $query = $db->query("SELECT * FROM accounts WHERE age = '$age' AND role = 1");
    return $query->num_rows;
}



function get_ages($from,$to) {
    global $db;
    if(empty($from) && empty($to)) {
        $query = $db->query("SELECT * FROM accounts WHERE role = 1");
    } else {
        $query = $db->query("SELECT * FROM accounts WHERE  role = 1 AND created_at BETWEEN '$from' AND '$to'");
    }
    return $query;
}


function get_all_genders() {
    global $db;
    $query = $db->query("SELECT *, MONTH(created_at) as m FROM accounts GROUP BY month ORDER BY created_at ASC LIMIT 12");
    return $query;
}

function get_all_ages() {
    global $db;
    $query = $db->query("SELECT *, COUNT(age) as count FROM accounts GROUP BY age");
    return $query;
}


function count_male($month,$year) {
    global $db;
    $query = $db->query("SELECT * FROM accounts WHERE gender = 'Male' AND month = '$month' AND year = '$year'");
    return $query->num_rows;
}

function count_female($month,$year) {
    global $db;
    $query = $db->query("SELECT * FROM accounts WHERE gender ='Female' AND month = '$month' AND year = '$year'");
    return $query->num_rows;
}

function update_transaction_status($reference,$vendor_id,$message,$status) {
    global $db;
    $query = $db->query("UPDATE transaction SET status = $status WHERE reference = '$reference' AND vendor_id = $vendor_id");
    if($query) {
        $db->query("INSERT INTO product_tracking (reference,vendor_id,status,message) VALUES ('$reference','$vendor_id','$status','$message')");
    }
    header('location: orders.php?reference='.$reference.'&success=true&message='.urlencode('Status has been updated'));
}

function get_tracking($reference) {
    global $db;
    return $db->query("SELECT * FROM product_tracking WHERE reference = '$reference'  ORDER BY created_at DESC");
}

function get_all_sales_transaction($vendor_id = null) {
    global $db;
    if($vendor_id == null) {
        $query = $db->query("SELECT *, MONTH(created_at) as m FROM transaction WHERE status = 2 GROUP BY month ORDER BY created_at ASC LIMIT 12");
    } else {
        $query = $db->query("SELECT *, MONTH(created_at) as m FROM transaction WHERE status = 2 AND vendor_id = $vendor_id GROUP BY month ORDER BY created_at ASC LIMIT 12");
    }
    return $query;
}


function get_all_payment_method_used() {
    global $db;
    $query = $db->query("SELECT *, MONTH(created_at) as m FROM transaction  GROUP BY month ORDER BY created_at ASC LIMIT 12");
    return $query;
}



function count_cod($month,$year) {
    global $db;
    $query = $db->query("SELECT * FROM transaction WHERE method_of_payment = 'Cash On Delivery' AND month = '$month' AND year = '$year' GROUP BY reference");
    return $query->num_rows;
}

function count_bank_transfer($month,$year) {
    global $db;
    $query = $db->query("SELECT * FROM transaction WHERE method_of_payment = 'Bank Transfer' AND month = '$month' AND year = '$year' GROUP BY reference");
    return $query->num_rows;
}

function count_gcash($month,$year) {
    global $db;
    $query = $db->query("SELECT * FROM transaction WHERE method_of_payment = 'GCash' AND month = '$month' AND year = '$year' GROUP BY reference");
    return $query->num_rows;
}

function get_sales($month,$year,$vendor_id) {
    global $db;
    $total = 0;
    $query = $db->query("SELECT * FROM transaction WHERE month = '$month' AND year = '$year' AND status = 2 AND vendor_id = $vendor_id");
    foreach($query as $data) {
        $total += $data['price'] * $data['quantity'];
    }
    return $total;
    
    // $query = $db->query("SELECT *, SUM(price*quantity + (shipping_fee/items)) as total FROM transaction WHERE month = '$month' AND year = '$year' AND status = 2 AND vendor_id = $vendor_id GROUP BY reference");
    // return $query->fetch_object();
}

function get_all_users() {
    global $db;
    $query = $db->query("SELECT *, MONTH(created_at) as month FROM accounts WHERE role = 1 GROUP BY month ORDER BY created_at ASC");
    return $query;
}

function get_all_signups($month,$year) {
    global $db;
    $query = $db->query("SELECT *, count(month) as total FROM accounts WHERE month = '$month' AND year = '$year' AND role = 1");
    return $query->fetch_object();
}

function get_all_visitors() {
    global $db;
    $query = $db->query("SELECT *, MONTH(created_at) as month FROM visitors  GROUP BY month ORDER BY created_at ASC LIMIT 12");
    return $query;
}

function get_visitor_count($month,$year) {
    global $db;
    $query = $db->query("SELECT *, count(month) as total FROM visitors WHERE month = '$month' AND year = '$year'");
    return $query->fetch_object();
}


function update_receipt($reference) {
    global $db;
    $receipt = $_FILES['files']['name'];
    move_uploaded_file($_FILES['files']['tmp_name'],'assets/image/receipt/'.$_FILES['files']['name']);
    $query = $db->query("UPDATE transaction SET receipt_image = '$receipt' WHERE reference = '$reference'");
    header('location: orders.php?reference='.$reference.'&success=true&message='.urlencode('Receipt has been uploaded'));
}


function delete_receipt($reference) {
    global $db;
    $query         = $db->query("SELECT * FROM transaction WHERE reference = '$reference'");
    $row           = $query->fetch_assoc();
    $receipt_image = $row['receipt_image'];
    $Path          = 'assets/image/receipt/'.$receipt_image;
    if (unlink($Path)) {
        $db->query("UPDATE transaction SET receipt_image = NULL WHERE reference = '$reference'");
    } else {
    }
    header('location: orders.php?reference='.$reference.'&success=true&message='.urlencode('Receipt has been deleted'));
}

function received_item($reference) {
    global $db;
    $query  = $db->query("SELECT * FROM transaction WHERE reference = '$reference'");
    if($query->num_rows > 0) {
        $db->query("UPDATE transaction SET is_received = 1 WHERE reference = '$reference'");
        header('location: orders.php?reference='.$reference.'&success=true&message='.urlencode('Item has been received.'));
    } else {
        header('location: orders.php?reference='.$reference.'&success=false&message='.urlencode('Transaction not exists.'));
    }

}



function transaction($shipping_trigger,$method_of_payment,$notes) {
    global $db;
    $accounts_id    = $_SESSION['id'];
    $date           = date('Y-m-d');
    $month          = date('n',strtotime($date));
    $year           = date('Y',strtotime($date));
    $total = 0;

    if($method_of_payment == 'GCash') {
        foreach($_SESSION['cart'] as $key => $value) {
            $total     += $value['price'] * $value['quantity'];
            $title[]  = $value['title'].' '.$value['quantity'].'x';
        }
        $description = implode(",",$title);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://g.payx.ph/payment_request',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'x-public-key' => 'pk_822e8c25ed932b16db556de89e9de1ff',
                'amount' => $total,
                'description' => $description
            ),
        ));
        $decode = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($decode,true);
        $status         = 0;
        $reference      = $response['data']['code'];
    } else {
        $status         = 0;
        $reference      = reference(10);
    }

    foreach(get_cart_item_of_user() as $key => $value) {
        $variationQuery = get_specific_variations($value['variation_id'])->fetch_assoc();
        $variant        = $variationQuery['variant'];
        $vendor_id      = $value['vendor_id'];
        $product_id     = $value['product_id'];
        $variation_id   = $value['variation_id'];
        $title          = $value['title'] . ' - ' . $variant;
        $quantity       = $value['qty'];
        $price          = $value['price'];
        $shipping_fee   = ($value['shipping_fee']);
        $items          = '2';
        $total          += $value['price'] * $value['qty'] * ($value['shipping_fee']);
        $query          = $db->query("INSERT INTO transaction (accounts_id,vendor_id,products_id,variation_id,product,quantity,price,shipping_fee,items,method_of_payment,status,reference,notes,shipping_trigger,month,year) VALUES ($accounts_id,$vendor_id,$product_id,$variation_id,'$title',$quantity,'$price','$shipping_fee','$items','$method_of_payment','$status','$reference','$notes','$shipping_trigger','$month','$year')");


        if ($query) {
            $db->query("INSERT INTO product_tracking (reference,vendor_id,status,message) VALUES ('$reference',$vendor_id,'0','Transaction has been success.')");
            $db->query("UPDATE product_variations SET stocks=stocks-$quantity WHERE id =" . $variation_id);
            $db->query("DELETE FROM cart WHERE user_id = '$accounts_id' ");
        }
    }

    // foreach($_SESSION['cart'] as $key => $value) {
    //     $variationQuery = get_specific_variations($value['variation_id'])->fetch_assoc();
    //     $variant        = $variationQuery['variant'];
    //     $vendor_id      = $value['vendor_id'];
    //     $product_id     = $value['product_id'];
    //     $variation_id   = $value['variation_id'];
    //     $title          = $value['title'].' - '.$variant;
    //     $quantity       = $value['quantity'];
    //     $price          = $value['price'];
    //     $shipping_fee   = ($value['shipping_fee']);
    //     $items          = $_SESSION['counter'][$value['vendor_id']];
    //     $total          += $value['price'] * $value['quantity'] * ($value['shipping_fee']);
    //     $query          = $db->query("INSERT INTO transaction (accounts_id,vendor_id,products_id,variation_id,product,quantity,price,shipping_fee,items,method_of_payment,status,reference,notes,shipping_trigger,month,year) VALUES ($accounts_id,$vendor_id,$product_id,$variation_id,'$title',$quantity,'$price','$shipping_fee','$items','$method_of_payment','$status','$reference','$notes','$shipping_trigger','$month','$year')");

    //     if($query) {
    //         $db->query("INSERT INTO product_tracking (reference,vendor_id,status,message) VALUES ('$reference',$vendor_id,'0','Transaction has been success.')");
    //         $db->query("UPDATE product_variations SET stocks=stocks-$quantity WHERE id =".$variation_id);
    //     }
    // }



    unset($_SESSION['cart']);
    header('location: my-account.php');
}

function update_product_variation($variant_id,$product_id,$variant_type,$price,$stocks,$discount,$status) {
    global $db;
    $query = $db->query("UPDATE product_variations SET product_id = $product_id, variant = '$variant_type', price = '$price', stocks = '$stocks', discount = '$discount', status = '$status' WHERE id = $variant_id");
    header('location: view-product.php?id='.$variant_id.'&success=true&message='.urlencode('Variation has been updated.'));
}

function get_all_product_gallery($id) {
    global $db;
    $query = $db->query("SELECT * FROM product_galleries WHERE product_id = $id");
    return $query;
}

function delete_gallery($id,$gallery_id) {
    global $db;
    $query = $db->query("DELETE FROM product_galleries WHERE id = $gallery_id");
    header('location: view-product.php?id='.$id);
}

function get_specific_products($id) {
    global $db;
    $query = $db->query("SELECT * FROM product WHERE id = ".$id);
    return $query;
}

function get_product_variations($id) {
    global $db;
    $query = $db->query("SELECT * FROM product_variations WHERE product_id = ".$id." AND status = 0");
    return $query;
}

function exchange_products($accounts_id) {
    global $db;
    $query = $db->query("SELECT *,product_variations.id as variations_id FROM product INNER JOIN product_variations ON product.id = product_variations.product_id WHERE product.accounts_id = $accounts_id");
    return $query;
}

function exchange_products_from($from_items,$from_quantity,$farmers) {
    $items = explode('=',$from_items);
    $product_id = $items[0];
    $variant_id = $items[1];
    $price      = $items[2];
    $stocks     = $items[3];
    $title      = $items[4];
    $variant    = $items[5];
    if($from_quantity > $stocks) {
        header('location: exchange-to-farmers.php?farmers='.$farmers.'&success=false&message='.urlencode('Insufficient stocks'));
    } else {
        $_SESSION['exchange_cart_from'][$_SESSION['vendor_id']][] = [
            'product_id' => $product_id,
            'variant_id' => $variant_id,
            'quantity'   => $from_quantity,
            'price'      => $price,
            'title'      => $title,
            'variant'    => $variant,
        ];

        header('location: exchange-to-farmers.php?farmers='.$farmers.'&success=true&message='.urlencode('New item has been added to your exchange list.'));
    }

}

function exchange_products_to($from_items,$from_quantity,$farmers) {
    $items = explode('=',$from_items);
    $product_id = $items[0];
    $variant_id = $items[1];
    $price      = $items[2];
    $stocks     = $items[3];
    $title      = $items[4];
    $variant    = $items[5];
    if($from_quantity > $stocks) {
        header('location: exchange-to-farmers.php?farmers='.$farmers.'&success=false&message='.urlencode('Insufficient stocks'));
    } else {
        $_SESSION['exchange_cart_to'][$farmers][] = [
            'product_id' => $product_id,
            'variant_id' => $variant_id,
            'quantity'   => $from_quantity,
            'price'      => $price,
            'title'      => $title,
            'variant'    => $variant,
        ];

        header('location: exchange-to-farmers.php?farmers='.$farmers.'&success=true&message='.urlencode('New item has been added to your exchange list.'));
    }

}

function exchanger($e_from,$e_to) {
    global $db;
    $reference = rand(111111,999999);
    // echo '<pre>';
    // print_r($e_from);
    // echo'</pre>';
    // exit;
    foreach($e_from as $key => $value) {
        $requestor_id = $key;
    }

    foreach($e_to as $key => $value) {
        $approver_id = $key;
    }

    foreach($e_from as $key => $v) {
        foreach($v as $value) {
            $product_id   = $value['product_id'];
            $variation_id = $value['variant_id'];
            $quantity     = $value['quantity'];
            $price        = $value['price'];
            $title        = $value['title'];
            $variant      = $value['variant'];
            $db->query("INSERT INTO exchanger (owner_id,requestor_id,approver_id,title,variant,product_id,variation_id,quantity,price,reference,status) VALUES ($requestor_id,'$requestor_id','$approver_id','$title','$variant','$product_id,','$variation_id','$quantity','$price','$reference',0)");
        }

    }

    foreach($e_to as $key => $v) {
        foreach($v as $value) {
            $product_id   = $value['product_id'];
            $variation_id = $value['variant_id'];
            $quantity     = $value['quantity'];
            $price        = $value['price'];
            $title        = $value['title'];
            $variant      = $value['variant'];
            $db->query("INSERT INTO exchanger (owner_id,requestor_id,approver_id,title,variant,product_id,variation_id,quantity,price,reference,status) VALUES ($requestor_id,'$approver_id','$requestor_id','$title','$variant','$product_id,','$variation_id','$quantity','$price','$reference',0)");
        }

    }

    unset($_SESSION['exchange_cart_from'],$_SESSION['exchange_cart_to']);

    header('location: exchange-to-farmers.php?success=true&message='.urlencode('Request has been made.'));
}

function get_specific_variations($id) {
    global $db;
    $query = $db->query("SELECT * FROM product_variations INNER JOIN product ON product_variations.product_id = product.id WHERE product_variations.id = ".$id);
    return $query;
}

function get_specific_category($id) {
    global $db;
    $query = $db->query("SELECT * FROM product_categories WHERE id = $id");
    return $query;
}

function get_all_category() {
    global $db;
    $query = $db->query("SELECT * FROM product_categories");
    return $query;
}

function get_specific_sub_category($id) {
    global $db;
    $query = $db->query("SELECT * FROM product_sub_categories WHERE id = $id");
    return $query;
}

function get_related_products($id,$product_categories_id) {
    global $db;
    $query = $db->query("SELECT * FROM product WHERE product_categories_id = '$product_categories_id' 
    AND id not in(SELECT id from product WHERE id = $id)");
    return $query;
}

function get_all_categories() {
    global $db;
    $query = $db->query("SELECT * FROM product_categories  ORDER BY created_at ASC ");
    return $query;
}

function get_all_sub_categories($id) {
    global $db;
    $query = $db->query("SELECT * FROM product_sub_categories WHERE product_categories_id = $id");
    return $query;
}

function get_featured_categories() {
    global $db;
    $query = $db->query("SELECT * FROM product_categories WHERE is_featured = 1 GROUP BY parent ORDER BY created_at ASC");
    return $query;
}

function get_featured_product() {
    global $db;
    $query = $db->query("SELECT * FROM product WHERE is_featured = 1");
    return $query;
}

function add_to_cart_from_details($variation_id,$price,$quantity) {
    global $db;
    $query = get_specific_variations($variation_id)->fetch_assoc();
    $product_id = $query['product_id'];
    $queryStore = store_details($query['accounts_id'])->fetch_assoc();

    if
    ($_SESSION['id'] != 0) {

    
    if(isset($_SESSION['cart'][$variation_id]['variation_id']) == $variation_id) {
        $stocks = $_SESSION['cart'][$variation_id]['stocks'];
        $qty = $_SESSION['cart'][$variation_id]['quantity'];
        if($stocks < $qty) {

        } else {
            if($query['stocks'] < ($quantity + $qty)) {

            } else {
                $_SESSION['cart'][$variation_id]['quantity'] += $quantity;
            }
        }

    }  else {

        if($query['stocks'] < $quantity) {

        } else {
            if(isset($_SESSION['counter'][$query['accounts_id']]) == $query['accounts_id']) {

                $_SESSION['counter'][$query['accounts_id']] += 1;
            } else {

                $_SESSION['counter'][$query['accounts_id']] = 1;
            }

            $userId = $_SESSION['id'] ?? null;
            $cartPrice = $query['price'] * $quantity;
            $_SESSION['cart'][$variation_id] = [
                'product_id'    => $product_id,
                'variation_id'  => $variation_id,
                'vendor_id'     => $query['accounts_id'],
                'image'         => $query['featured_image'],
                'title'         => $query['title'],
                'price'         => $query['discount'] != 0 ? $query['price'] - ($query['price'] * ($query['discount'] / 100)) : $query['price'],
                'stocks'        => $query['stocks'],
                'store_name'    => $queryStore['store_name'],
                'shipping_fee'  => $queryStore['shipping_fee'],
                'quantity'      => $quantity
            ];

            $ship = $query['accounts_id'];
            $fee = $queryStore['shipping_fee'];
            $product_name = $query['title'];
            $db->query("INSERT INTO cart (product_id,qty,price,user_id,vendor_id,variation_id,shipping_fee,title) VALUES ('$product_id','$quantity','$cartPrice','$userId', '$ship', '$variation_id', '$fee','$product_name')");

        }
    }
    header('location: product-details.php?id='.$product_id.'&success=true&message='.urlencode('Item has been added to your cart'));
    } else {
        header('location: login.php');
    }
}



function update_cart($id,$quantity) {
    $counter = count($id);
    for($i=0;$i<$counter;$i++) {
        $_SESSION['cart'][$id[$i]]['quantity'] = $quantity[$i];
    }
    header('location: cart.php?success=true&message='.urlencode('Your cart has been updated'));
}

function remove_cart_from_links($variation_id,$accounts_id) {
    $_SESSION['counter'][$accounts_id] - 1;
    if(count($_SESSION['counter'][$accounts_id]) == 0) {
        unset($_SESSION['counter'][$accounts_id]);
    }
    unset($_SESSION['cart'][$variation_id]);
}


function get_all_products_by_category($id) {
    global $db;
    $query = $db->query("SELECT * FROM product WHERE product_categories_id = $id");
    return $query;
}

function change_password($old_password,$new_password,$confirm_password) {
    global $db;
    if($new_password == $confirm_password) {
        $check = $db->query("SELECT * FROM accounts WHERE id = ".$_SESSION['id']); // validate if username already exist
        if($check->num_rows > 0) {
            $row = $check->fetch_assoc();
            if(password_verify($old_password,$row['password'])) {
                $new = password_hash($new_password,PASSWORD_DEFAULT);
                $db->query("UPDATE accounts SET password = '$new' WHERE id = ".$_SESSION['id']);
                header('location: my-account.php?success=true&message='.urlencode('Your password has been updated'));
            } else {
                header('location: my-account.php?success=false&message='.urlencode('Old password is incorrect'));
            }
        } else {
            header('location: my-account.php?success=false&message='.urlencode('An error occured.'));
        }
    } else {
        header('location:my-account.php?success=false&message='.urlencode('Password mismatched'));
    }
}

function change_vendor_password($new_password,$confirm_password) {
    global $db;
    if($new_password == $confirm_password) {
        $check = $db->query("SELECT * FROM accounts WHERE id = ".$_SESSION['vendor_id']); // validate if username already exist
        if($check->num_rows > 0) {
            $new = password_hash($new_password,PASSWORD_DEFAULT);
            $query = $db->query("UPDATE accounts SET password = '$new' WHERE id = ".$_SESSION['vendor_id']);
            if($query) {
                header('location: profile.php?success=true&message='.urlencode('Password has been changed'));
            } else {
            }
        } else {
            header('location: profile.php?success=false&message='.urlencode('An error occured.'));
        }
    } else {
        header('location:profile.php?success=false&message='.urlencode('Password mismatched'));
    }
}

function get_all_products_by_sub_category($id) {
    global $db;
    $query = $db->query("SELECT * FROM product WHERE product_sub_categories_id = $id");
    return $query;
}

function post($data) {
    global $db;
    return $db->real_escape_string(htmlentities($_POST[$data]));
}

function get($data) {
    global $db;
    return $db->real_escape_string(htmlentities($_GET[$data]));
}

function canonical() {
    return "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}


function reference($length_of_string) {
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($str_result), 0, $length_of_string);
}

function delete_sub_categories($id) {
    global $db;
    $query = $db->query("DELETE FROM product_sub_categories WHERE id = '$id'");
    if($query) {
        header('location: add-new-sub-categories.php?success=true&message='.urlencode('Sub category has been deleted'));
    }
}


function delete_vendor($id) {
    global $db;

    $db->query("DELETE FROM accounts WHERE id = '$id'");
    $query = $db->query("DELETE FROM store WHERE vendor_id = '$id'");
    if($query) {
        $db->query("DELETE FROM product WHERE accounts_id = '$id'");
        header('location: add-new-vendor.php?success=true&message='.urlencode('Vendor has been deleted'));
    }
}


function remove_product($id) {
    global $db;
    $query = $db->query("DELETE FROM product WHERE id = $id");
    if($query) {
        $db->query("DELETE FROM product_galleries WHERE product_id = $id");
    }
    header('location: add-new-products.php?success=true&message='.urlencode("Product has been deleted"));
}


function get_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function save_visitors() {
    global $db;
    $ip_address = get_ip();
    $month = date('n');
    $year = date('Y');
    $check = $db->query("SELECT * FROM visitors WHERE ip_address = '$ip_address' AND month = '$month' AND year = '$year'");
    if($check->num_rows > 0) {

    } else {
        $db->query("INSERT INTO visitors (ip_address,month,year) VALUES ('$ip_address','$month','$year')");
    }
}

/// admin

function get_transaction_status($status,$vendor_id = null) {
    global $db;
    if($vendor_id == null) {
        $query = $db->query("SELECT * FROM transaction WHERE status = $status GROUP BY reference")->num_rows;
    } else {
        $query = $db->query("SELECT * FROM transaction WHERE status = $status AND vendor_id = $vendor_id GROUP BY reference")->num_rows;
    }
    return number_format($query);
}

function get_transaction_sales($vendor_id = null) {
    global $db;
    if($vendor_id == null) {
        $query = $db->query("SELECT * FROM transaction WHERE status = 2 GROUP BY reference");
    } else {
        $query = $db->query("SELECT * FROM transaction WHERE status = 2 AND vendor_id = $vendor_id");
    }
    $total = 0;
    foreach($query as $data) {
        $total += $data['price'] * $data['quantity'];
    }
    
    return number_format($total,2);
    
}

function get_registered_user() {
    global $db;
    $query = $db->query("SELECT * FROM accounts WHERE role = 1")->num_rows;
    return number_format($query);
}

function get_all_location() {
    global $db;
    $query = $db->query("SELECT *, COUNT(city) as total FROM accounts_address GROUP BY city");
    return $query;
}

function get_visitors() {
    global $db;
    $query = $db->query("SELECT * FROM visitors ")->num_rows;
    return number_format($query);
}


function all_sub_categories() {
    global $db;
    $query = $db->query("SELECT * FROM product_sub_categories");
    return $query;
}

function add_gallery($id) {
    global $db;
    foreach($_FILES["images"]["tmp_name"] as $key => $value) {
        $image_name = $_FILES['images']['name'][$key];
        move_uploaded_file($_FILES['images']['tmp_name'][$key],'../assets/image/product/gallery/'.$_FILES['images']['name'][$key]);
        $query = $db->query("INSERT INTO product_galleries (product_id,images) VALUES ('$id','$image_name')");
    }
    header('location: view-product.php?id='.$id.'&success=true&message='.urlencode('New image has been added'));
}

function get_stores() {
    global $db;
    $query = $db->query("SELECT *,a.id as store_id FROM accounts as a INNER JOIN store as s ON a.id = s.vendor_id WHERE role = 2");
    return $query;
}

function get_verified($account_id,$product_id) {
    global $db;
    $query = $db->query("SELECT * FROM transaction WHERE accounts_id = $account_id AND products_id = $product_id")->num_rows;
    return $query;
}

function submit_reviews($accounts_id,$products_id,$customer,$ratings,$comments) {
    global $db;
    $db->query("INSERT INTO review_table (accounts_id,products_id,customer,ratings,comments) VALUES ('$accounts_id','$products_id','$customer','$ratings','$comments')");
    header('location: product-details.php?id='.$products_id.'&success=true&message='.urlencode('Your comment has been submitted'));
}

function get_reviews($products_id) {
    global $db;
    return $db->query("SELECT * FROM review_table WHERE products_id = $products_id ORDER BY created_at DESC");
}

function add_products($vendor_id,$product_categories_id,$product_sub_categories_id,$title,$short_description,$long_description,$is_featured,$meta_description,$meta_keywords) {
    global $db;
    $check = $db->query("SELECT * FROM product WHERE title = '$title'");
    if($check->num_rows > 0) {
        header('location: add-new-products.php?success=false&message='.urlencode('Product already exist'));
    } else {
        if(empty($_FILES['images']['name'])) {
            $query = $db->query("INSERT INTO product (accounts_id,product_categories_id,product_sub_categories_id,title,short_description,long_description,is_featured,meta_description,meta_keywords) VALUES ('$vendor_id','$product_categories_id','$product_sub_categories_id','$title','$short_description','$long_description','$is_featured','$meta_description','$meta_keywords')");
        } else {
            $featured_image = $_FILES['images']['name'];
            move_uploaded_file($_FILES['images']['tmp_name'],'../assets/image/product/'.$_FILES['images']['name']);
            $query = $db->query("INSERT INTO product (accounts_id,featured_image,product_categories_id,product_sub_categories_id,title,short_description,long_description,is_featured,meta_description,meta_keywords) VALUES ('$vendor_id','$featured_image','$product_categories_id','$product_sub_categories_id','$title','$short_description','$long_description','$is_featured','$meta_description','$meta_keywords')");
        }
        if($query) {
            header('location: add-new-products.php?success=true&message='.urlencode('New product has been added'));
        }
    }
}

function update_products($id,$product_categories_id,$product_sub_categories_id,$title,$short_description,$long_description,$is_featured,$meta_description,$meta_keywords) {
    global $db;
    if(empty($_FILES['images']['name'])) {
        $query = $db->query("UPDATE product SET product_categories_id = '$product_categories_id', product_sub_categories_id = '$product_sub_categories_id', title = '$title', short_description = '$short_description', long_description = '$long_description', is_featured = '$is_featured', meta_description = '$meta_description', meta_keywords = '$meta_keywords' WHERE id = $id");
    } else {
        $featured_image = $_FILES['images']['name'];
        move_uploaded_file($_FILES['images']['tmp_name'],'../assets/image/product/'.$_FILES['images']['name']);
        $query = $db->query("UPDATE product SET featured_image = '$featured_image', product_categories_id = '$product_categories_id', product_sub_categories_id = '$product_sub_categories_id', title = '$title', short_description = '$short_description', long_description = '$long_description', is_featured = '$is_featured', meta_description = '$meta_description', meta_keywords = '$meta_keywords' WHERE id = $id");
    }
    if($query) {
        header('location: view-product.php?id='.$id.'&success=true&message='.urlencode('product has been updated'));
    }
}

function show_product_variation_by_product_id($product_id) {
    global $db;
    return $db->query("SELECT * FROM product_variations WHERE product_id = $product_id");
}

function add_product_variation($product_id,$variant_type,$price,$stocks,$discount,$status) {
    global $db;
    $checker = $db->query("SELECT * FROM product_variations WHERE variant LIKE '%$variant_type%' AND product_id = $product_id");
    if($checker->num_rows > 0) {
        header('location: view-product.php?id='.$product_id.'&success=false&message='.urlencode('Product variation already exists'));
    } else {
        $query = $db->query("INSERT INTO product_variations (product_id,variant,price,stocks,discount,status) VALUES ('$product_id','$variant_type','$price','$stocks','$discount','$status')");
        if($query) {
            header('location: view-product.php?id='.$product_id.'&success=true&message='.urlencode('product variation has been added'));
        }
    }

}

function count_product_variation($product_id) {
    global $db;
    return $db->query("SELECT * FROM product_variations WHERE product_id = $product_id")->num_rows;
}

function product_categories($parent,$is_featured) {
    global $db;
    $check = $db->query("SELECT * FROM product_categories WHERE parent = '$parent'");
    if($check->num_rows > 0) {
        header('location: add-new-categories.php?success=false&message='.urlencode('Category already exist'));
    } else {
        if(empty($_FILES['images']['name'])) {
            $images = $_FILES['images']['name'];
            $query = $db->query("INSERT INTO product_categories (images,parent,is_featured) VALUES ('$images','$parent','$is_featured')");
        } else {
            $images = $_FILES['images']['name'];
            move_uploaded_file($_FILES['images']['tmp_name'],'../assets/image/category/'.$_FILES['images']['name']);
            $query = $db->query("INSERT INTO product_categories (images,parent,is_featured) VALUES ('$images','$parent','$is_featured')");
        }
        if($query) {
            header('location: add-new-categories.php?success=true&message='.urlencode('New category has been added'));
        }
    }
}

function update_product_categories($id,$parent,$is_featured) {
    global $db;
    if(empty($_FILES['update_images']['name'])) {
        $query = $db->query("UPDATE product_categories SET parent = '$parent', is_featured = '$is_featured' WHERE id = $id");
    } else {
        $images = $_FILES['update_images']['name'];
        move_uploaded_file($_FILES['update_images']['tmp_name'],'../assets/image/category/'.$_FILES['update_images']['name']);
        $query = $db->query("UPDATE product_categories SET images = '$images', parent = '$parent', is_featured = '$is_featured' WHERE id = $id");
    }
    if($query) {
        header('location: add-new-categories.php?success=true&message='.urlencode('New category has been added'));
    }
}

function product_sub_categories($product_categories_id,$child) {
    global $db;
    $check = $db->query("SELECT * FROM product_sub_categories WHERE product_categories_id = '$product_categories_id' AND child = '$child'");
    if($check->num_rows > 0) {
        header('location: add-new-sub-categories.php?success=false&message='.urlencode('Sub category already exist'));
    } else {
        $query = $db->query("INSERT INTO product_sub_categories (product_categories_id,child) VALUES ('$product_categories_id','$child')");
        if($query) {
            header('location: add-new-sub-categories.php?success=true&message='.urlencode('New sub category has been added'));
        }
    }
}

function update_sub_categories($id,$update_product_categories_id,$update_child) {
    global $db;
    $query = $db->query("UPDATE product_sub_categories SET product_categories_id = '$update_product_categories_id', child = '$update_child' WHERE id = '$id'");
    if($query) {
        header('location: add-new-sub-categories.php?success=true&message='.urlencode('Sub category has been updated'));
    }
}

function delete_categories($id) {
    global $db;
    $db->query("DELETE FROM product_sub_categories WHERE product_categories_id = '$id'");
    $query = $db->query("DELETE FROM product_categories WHERE id = '$id'");
    if($query) {
        header('location: add-new-categories.php?success=true&message='.urlencode('Category has been deleted'));
    }
}



function count_product($id) {
    global $db;
    $query = $db->query("SELECT * FROM product WHERE product_sub_categories_id = $id");
    return $query->num_rows;
}


function view_conversations($vendor_id) {
    global $db;
    $query = $db->query("SELECT * FROM chats WHERE receiver_id = $vendor_id GROUP BY chat_group ");
    return $query;
}


function get_code($code) {
    global $db;
    $query = $db->query("SELECT * FROM chats WHERE chat_group = $code");
    return $query;
}


function close_conversation($code) {
    global $db;
    $query = $db->query("UPDATE chats SET status = 1 WHERE chat_group = '$code'");
    if($query) {
        header('location:conversations.php?success=true&message='.urlencode("Conversation # ".$code." has been closed"));
    }
}

function rankOfSeller()
{
    global $db;
    $query = $db->query("select a.vendor_id, SUM(a.price) as total_sales, s.store_name, a.accounts_id as store_id from transaction a INNER JOIN store s ON a.vendor_id = s.vendor_id GROUP BY a.vendor_id ORDER BY SUM(a.price) DESC;");
    return $query;
}

function get_total_price_in_cart()
{
    global $db;
    $user_id = $_SESSION['id'] ?? 0;
    $getCart = $db->query("SELECT SUM(price * qty) as total_price_in_cart, SUM(qty) as item_count FROM cart WHERE user_id = $user_id");
    return $getCart;
}

function get_cart_item_of_user() {
    global $db;
    $user_id = $_SESSION['id'] ?? 0;
    $getItem = $db->query("SELECT cart.*, product.title, product.featured_image FROM cart INNER JOIN product ON product.id = cart.product_id WHERE cart.user_id = $user_id");
    return $getItem;
}

function get_cart_item_of_user_with_vendor()
{
    global $db;
    $user_id = $_SESSION['id'] ?? 0;
    $getItem = $db->query("SELECT cart.*, product.title, product.featured_image, store.store_name, store.shipping_fee as ship FROM cart INNER JOIN product ON product.id = cart.product_id INNER JOIN store ON cart.vendor_id = store.vendor_id WHERE cart.user_id = $user_id");
    return $getItem;
}

function get_shipping_fee() {
    global $db;
    $user_id = $_SESSION['id'] ?? 0;
    $getItem = $db->query("SELECT SUM(DISTINCT s.shipping_fee) as total_shipping_fee FROM store as s INNER JOIN cart as c ON s.vendor_id = c.vendor_id WHERE c.user_id = $user_id");
    return $getItem;
}

function delete_item_from_cart($id) {
    global $db;
    $query = $db->query("DELETE FROM cart WHERE id = $id");
    header('location: home.php');
}

// function update_user_cart($quantity)
// {
//     $counter = count($id);
//     for ($i = 0; $i < $counter; $i++) {
//         $_SESSION['cart'][$id[$i]]['quantity'] = $quantity[$i];
//     }
//     header('location: cart.php?success=true&message=' . urlencode('Your cart has been updated'));
// }