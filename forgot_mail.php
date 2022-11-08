
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/Exception.php');
require ('PHPMailer/PHPMailer.php');
require ('PHPMailer/SMTP.php');

$mail = new PHPMailer(true);

$alert = '';


if(isset($_POST['btn_login'])) {
    $sql = "SELECT id, firstname, lastname, passwordd FROM accounts";
    global $db;
        $username = $db->real_escape_string($_POST['username']);
        $password = $db->real_escape_string($_POST['password']);


try {                         
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'phpdummy682@gmail.com';                     
    $mail->Password   = 'Dummy_php123';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                                    

    //Recipients
    $mail->setFrom('phpdummy682@gmail.com', 'I-Agri');
    $mail->addAddress('phpdummy682@gmail.com');     //Add a recipient
    $mail->addAddress($email = $db->real_escape_string($_POST['email']));               //Name is optional


    //Attachments
    $mail->addAttachment('assets/image/food_hub.png');         //Add attachments
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Register Confirmation ';
    $mail->Body    = 
    "
    <h3>Email address : $email </h3> 
    <h3>User Name : $username </h3>  
    <h3>Password : $password </h3> 
    <br>
    Note: do not share this email to other person!
    "
    ;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $alert = '<div class="alert-success">
                <span> Message send! Thank you for contacting us.</span>
            <div>';
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}