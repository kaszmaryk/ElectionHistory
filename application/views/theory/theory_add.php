<?php include("application/included/menu.php"); ?>
<div class="block main-info">
    <form id="createLection" name="createTest" action="" method="post" accept-charset="utf8_general_ci">
        <label><span class="theory-edit-input-s">Название лекции</span><br>
        <input  name="lec_title" type="text"><br></label>
        <label><span class="theory-edit-input-s">Текст лекции</span><br>
        <textarea  style="text-align: left !important;" name="lec_text" type="text">Введите сюда код лекции</textarea><br></label>
        <input  name="author" type="hidden" value="<?php echo $_SESSION['user']; ?>">
        <button id="createLectionBut" name="createLectionBut" class="button-n" value="submit">Создать лекцию</button>
    </form>
</div>