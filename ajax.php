<?php include 'config/functions.php';?>

<?php foreach(chats($_GET['code']) as $chats) { ?>
<article class="msg-container <?=$chats['receiver_id'] == $_GET['code'] ? 'msg-remote' : 'msg-self'?>" id="msg-0">
    <div class="msg-box">
        <div class="flr">
            <div class="messages">
                <p class="msg" id="msg-0">
                    <?=$chats['message']?>
                </p>
            </div>
            <span class="timestamp"><span class="posttime"><?=date('g:i A',strtotime($chats['date']))?></span></span>
        </div>
    </div>
</article>
<?php } ?>