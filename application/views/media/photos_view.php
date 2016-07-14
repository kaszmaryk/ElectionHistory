<?php include("application/included/menu.php"); ?>
<div class="block main-info" xmlns="http://www.w3.org/1999/html">
    <div>
        <h1 class="directory-head">Изображения</h1>
    </div>
    <?php
    if($user_rights > 0)
    {
        ?>
        <div class="send_media">
        <script src="../../js/media-photo.js"></script>
        <a class="tests-add-a">
            <div class="tests-add">
                <span>Добавить фото</span>
                <img src="../../img/system/add.png">
            </div>
        </a>
        <form class="send-photo-form" name="add_photo" enctype="multipart/form-data" action="" method="post" accept-charset="utf8_general_ci">
            <input type="hidden" name="author" value="<?php echo $user_login; ?>">
            <input class="send-p-title" type="text" name="photo_title" placeholder="Заголовок"></br>
            <input class="send-p-title" type="text" name="photo_alt" placeholder="Альтернативный текст"></br>
            <textarea class="send-p-comment" type="text" name="photo_comment" placeholder="Комментарий"></textarea></br>
            <input class="send-p-file" name="photofile" type="file"></br>
            <button class="tests-add send-p-but" type="submit" name="submit">Отправить фото</button>
        </form>
        </div>
        <?php
    }
    ?>
    <div>
        <?php
        while($row = mysqli_fetch_array($data)) {
            $id = $row['id'];
            $url = $row['url'];
            $alt = $row['alt'];
            ?>
            <img class="media-photo-in-list" src="/<?php echo $url; ?>" alt="<?php echo $alt?>" id="<?php $id; ?>">
            <?php
        }
        ?>
    </div>
</div>