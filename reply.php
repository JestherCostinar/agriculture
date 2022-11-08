<?php include 'config/functions.php';?>
<?php 
    global $db;
    $reply    = $db->real_escape_string($_POST['reply']);
    $sender   = $db->real_escape_string($_POST['sender']);
    $reciever = $db->real_escape_string($_POST['reciever']);
    reply($reciever,$sender,$reply);
    echo json_encode(['success' => true,'message' => 'sent']);

?>