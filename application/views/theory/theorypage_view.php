<?php include("application/included/menu.php"); ?>
<div class="block main-info">
    <script src="../../js/checkLection.js"></script>
    <div style="display: none"><span id="message" ><?php echo $data['id']; ?></span><span id="slogin"><?php echo $user_login; ?></span></div>
    <div>
        <h1 class="directory-head"><?php echo $data['title']; ?></h1>
    </div>
    <div>
        <?php echo $data['text']; ?>
    </div>
</div>