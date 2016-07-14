<?php include("application/included/menu.php"); ?>
<div class="block main-info">
    <form id="createLection" name="createTest" action="" method="post" accept-charset="utf8_general_ci">
        <label><span class="theory-edit-input-s">Название лекции</span><br>
            <input  name="lec_title" type="text" value="<?php echo $data['title'];?>"><br></label>
        <label><span class="theory-edit-input-s">Текст лекции</span><br>
            <textarea  style="text-align: left !important;" name="lec_text" type="text"><?php echo $data['text'];?></textarea><br></label>
        <input  name="author" type="hidden" value="<?php echo $_SESSION['user']; ?>">
        <button id="editLectionBut" name="editLectionBut" class="button-n" value="submit">Изменить</button>
    </form>
</div>