<!doctype html>
<?php
if(isset($_SESSION['user'])) {
    require_once 'application/included/session.php';
}
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>История парламентских выборов в Беларуси</title>
    <script src="../js/jquery-3.0.0-beta1.js"></script>
</head>
<body>
<header class="site-header">
    <script src="../../js/header.js"></script>
    <div class="euk-title">
        <span>Электронный учебный комплекс</span>
    </div>
    <div class="logo">
        <a href="../"><img src="../svg/logo.svg"></a>
    </div>
    <div class="entry-title">
        <?php
        if(isset($_SESSION['user'])) {
            ?><span id='entry-button'><?php echo $user_LastName . " " . $user_FirstName . " " . $user_FathName; ?></span>
        <?php    } else {  ?>
        <span id="entry-button">Войти</span>
        <div class="entry-form">
            <form name="entryform" id="entry-form" action="" method="post" accept-charset="utf8_general_ci">
                <input name="login" type="text" placeholder="логин">
                <input name="password" type="password" placeholder="пароль">
                <button name="enbutton" type="submit" id="enbutton" value="submit">Войти</button>
            </form>
        </div>
        <?php } ?>
    </div>
</header>
<div class="area">
    <?php include 'application/views/'.$content_view; ?>
</div>
</body>
</html>