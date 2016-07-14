<?php include("application/included/menu.php"); ?>
<div class="block main-info">
    <p id='message' class='sys-message succes' style="display: none;"></p>
    <p id='message2' class='sys-message succes' style="display: none;"></p>
    <script src="../../js/createTest.js"></script>
    <form id="createTest" name="createTest" action="" method="post" accept-charset="utf8_general_ci">
        <label><span class="profile-edit-input-s">Название теста</span><input  name="test_name" type="text"></label>
        <label><span class="profile-edit-input-s">Количество вопросов</span><input  name="num_questions" type="text"></label>
        <label><span class="profile-edit-input-s">Количество баллов</span><input  name="max_points" type="text"></label>
        <input  name="author" type="hidden" value="<?php echo $_SESSION['user']; ?>">
        <div id="createTestBut" name="createTestBut">Создать тест</div>
    </form>
    <div class="createQuestions">
        <span id="question_lost"></span>
    </div>
</div>