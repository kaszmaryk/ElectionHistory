$(document).ready(function() {
    $('#createTestBut').on('click', function() {
        var $testName = $("input[name = test_name]").val();
        var $numQuest = $("input[name = num_questions]").val();
        var $maxPoints = $("input[name = max_points]").val();
        var $author = $("input[name = author]").val();

        $("input[name = test_name]").val("");
        $("input[name = num_questions]").val("");
        $("input[name = max_points]").val("");
        $("input[name = author]").val("");
        $('#message').show().load('../../application/models/tests/create_test.php', {"name":$testName, "quest":$numQuest, "mpoints":$maxPoints, "author":$author});
        $('#message').fadeOut(4000);

        var $testId = $('#message>span').text();

        /*for(var i = 0; i < $numQuest; i++) {
            $('#question_lost').after("<form action='' method='post' accept-charset='utf8_general_ci'>" +
            "<label><span class='profile-edit-input-s'>Текст вопроса: </span><input  name='test_name' type='text'></label>" +
            "<label><span class='profile-edit-input-s'>Вид вопроса: </span><select name='q_type'>" +
            "<option value='ввод правильного ответа'>Ввод правильного ответа</option>" +
            "<option value='выбор правильного варианта' selected>Ввод правильного ответа</option>" +
            "<option value='последовательность'>Установление последовательности</option>" +
            "</select></label>" +
            "<fieldset>" +
            "<legend>Ответы</legend>" + setVariant() +
            "<div id='addQuestion' name='addQuestion' class='button-n'>Добавить вопрос</div>" +
            "</form>");
        }

        function setVariant() {
            switch($('select[name = "q_type"]').val()) {
                case "выбор правильного ответа":
                    var $n_ans = 1;
                    var $q_ans = "q"+$n_ans;
                    $('div[name = "addQuestion"]').before("<div id='addVariant' name='addVariant' class='button-n'>Добавить вариант</div></fieldset>" +
                    "<label><span class='profile-edit-input-s'>Правильный отве (q + номер ответа): </span><input  name='cor_ans' type='text'></label>");
                    $('div[name = "addVariant"]').before(
                        "<label><span class='profile-edit-input-s'>Вариант: " + $n_ans + "</span><input  name='ans' type='text' id='+ $q_ans +"'></label>"
                    );
                    $('div[name = "addQuestion"]').on('click', function() {
                        $n_ans++
                        $('div[name = "addVariant"]').before(
                            "<label><span class='profile-edit-input-s'>Вариант: " + $n_ans + "</span><input  name='ans' type='text' id='+ $q_ans +"'></label>"
                        );
                    });
                    break;
                case "ввод правильного ответа":
                    $('div[name = "addQuestion"]').before(
                        "<label><span class='profile-edit-input-s'>Правильный ответ: </span><input  name='cor_ans' type='text'></label></fieldset>"
                    );
                    break;
                case "последовательность":
                    var $n_ans = 1;
                    var $q_ans = "q"+$n_ans;
                    $('div[name = "addQuestion"]').before("<div id='addVariant' name='addVariant' class='button-n'>Добавить вариант</div></fieldset>" +
                    "<input  name='cor_ans' type='hidden' value='q1q2q3q4'>");
                    $('div[name = "addVariant"]').before(
                        "<label><span class='profile-edit-input-s'>Вариант: " + $n_ans + "</span><input  name='ans' type='text' id='+ $q_ans +"'></label>"
                    );
                    $('div[name = "addQuestion"]').on('click', function() {
                        $n_ans++
                        $('div[name = "addVariant"]').before(
                            "<label><span class='profile-edit-input-s'>Вариант: " + $n_ans + "</span><input  name='ans' type='text' id='+ $q_ans +"'></label>"
                        );
                    });
                    break;


            }
        }*/
    });
});
