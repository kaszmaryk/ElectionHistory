$(document).ready(function() {
    $idQuestion = parseInt($('.quest-field').last().attr('id'));



    $('button[name = add_quest_but]').on('click', function() {
        $nAns = 1;
        if(!$idQuestion) {
            $idQuestion = 1;
        } else {
            $idQuestion+=1;
        }
        $qType = $('select[name = q_type]').val();
        switch($qType) {
            case "v1":
                get_v1();
                setNewVariant();
                break;
            case "v2":
                get_v2();
                setNewVariant();
                break;
            case "v3":
                get_v3();
                setNewVariant();
                break;
            case "v4":
                get_v4();
                setNewVariant();
                break;
            default:
                alert("Не выбран тип вопроса!");
        }
        function get_v1() {
            $('fieldset[name = add_q_field]').before("" +
            "<fieldset id="+ $idQuestion +" class='quest-field'>" +
            "<p>Выбор правильного ответа</p>" +
            "<input name='q_" + $idQuestion + "_type' type='hidden' value="+ $qType +">" +
            "<label class='question-title'>"+ $idQuestion +". <textarea type='text' name='title_"+ $idQuestion +"_text' style='width: 70%;' placeholder='Введите вопрос...'></textarea></label></br>" +
            "<hr>" +
            "<p class='"+ $nAns +"'>" +
            "<label class='lab_ans'>"+ $nAns +". <input name='answer_"+ $idQuestion +"_val_"+ $nAns +"' type='hidden' value='"+ $nAns +"'>" +
            "<input type='text' name='answer_"+ $idQuestion +"_text_"+ $nAns +"' style='width: 50%;' placeholder='Введите ответ'></label>" +
            "<input type='number' name='answer_"+ $idQuestion +"_points_"+ $nAns +"' style='width: 20%;'placeholder='Количество баллов'>" +
            "</p>" +
            "<button type='button' name='add_answer_but' class='"+ $qType +"'>Добавить вариант ответа</button>" +
            "</fieldset>");
        }
        function get_v2() {
            $('fieldset[name = add_q_field]').before("" +
            "<fieldset id="+ $idQuestion +" class='quest-field'>" +
            "<p>Ввод правильного ответа</p>" +
            "<input name='q_" + $idQuestion + "_type' type='hidden' value="+ $qType +">" +
            "<label class='question-title'>"+ $idQuestion +". <textarea type='text' name='title_"+ $idQuestion +"_text' style='width: 70%;' placeholder='Введите вопрос...'>" +
            "Введите вопрос</h2>" +
            "<p class='question-title'>Ответ ввести по образцу: <i>образец</i><p>" +
            "</textarea></label></br>" +
            "<hr>" +
            "<p class='"+ $nAns +"'>" +
            "<label>"+ $nAns +". <input type='text' name='answer_"+ $idQuestion +"_text_"+ $nAns +"' style='width: 50%;' placeholder='Введите ответ'></label>" +
            "<input type='number' name='answer_"+ $idQuestion +"_points_"+ $nAns +"' style='width: 20%;' placeholder='Количество баллов'>" +
            "</p>" +
            "<button type='button' name='add_answer_but' class='"+ $qType +"'>Добавить вариант ответа</button>" +
            "</fieldset>");
        }
        function get_v3() {
            $('fieldset[name = add_q_field]').before("" +
            "<fieldset id="+ $idQuestion +" class='quest-field'>" +
            "<p>Установить правильную последовательность</p>" +
            "<p class='"+ $nAns +"'>" +
            "<input name='q_" + $idQuestion + "_type' type='hidden' value="+ $qType +">" +
            "<label class='question-title'>"+ $idQuestion +". <textarea type='text' name='title_"+ $idQuestion +"_text' style='width: 70%;height: 70px;' placeholder='Введите вопрос...'>" +
            "Введите вопрос</h2>" +
            "<p class='question-title'>Ответ ввести по образцу: <i>образец</i><p>" +
            "</textarea></label></br>" +
            "<label class='question-title'>Правильный ответ: <input type='text' name='c_answer_"+ $idQuestion +"_text' style='width: 40%;' placeholder='Введите правильный ответ в формате 23451'></label>" +
            "<input type='number' name='answer_"+ $idQuestion +"_points' style='width: 20%;' placeholder='Количество баллов'>" +
            "</p>" +
            "</fieldset>");
        }
        function get_v4() {
            $('fieldset[name = add_q_field]').before("" +
            "<fieldset id="+ $idQuestion +" class='quest-field'>" +
            "<p>Установить соответствие</p>" +
            "<p class='"+ $nAns +"'>" +
            "<input name='q_" + $idQuestion + "_type' type='hidden' value="+ $qType +">" +
            "<label class='question-title'>"+ $idQuestion +". <textarea type='text' name='title_"+ $idQuestion +"_text' style='width: 70%; height: 70px;' placeholder='Введите вопрос...'>" +
            "Введите вопрос</h2>" +
            "<p class='question-title'>Ответ ввести по образцу: <i>образец</i><p>" +
            "</textarea></label></br>" +
            "<label class='question-title'>Правильный ответ: <input type='text' name='c_answer_"+ $idQuestion +"_text' style='width: 40%;' placeholder='Введите правильный ответ в формате 23451'></label>" +
            "<input type='number' name='answer_"+ $idQuestion +"_points' style='width: 20%;' placeholder='Количество баллов'>" +
            "</p>" +
            "</fieldset>");
        }
        function setNewVariant() {
            $('button[name = add_answer_but]').on('click', function() {
                $nAns+=1;
                switch($qType) {
                    case "v1":
                        $(this).before("" +
                        "<p class='"+ $nAns +"'>" +
                        "<label class='lab_ans'>"+ $nAns +". <input name='answer_"+ $idQuestion +"_val_"+ $nAns +"' type='hidden' value='"+ $nAns +"'>" +
                        "<input type='text' name='answer_"+ $idQuestion +"_text_1' style='width: 70%;' placeholder='Введите ответ'></label>" +
                        "<input type='number' name='answer_"+ $idQuestion +"_points_"+ $nAns +"' style='width: 20%;'placeholder='Количество баллов'>" +
                        "<button type='button' class='answer_rem_but'>Удалить</button>" +
                        "</p>");
                        break;
                    case "v2":
                        $(this).before("" +
                        "<p class='"+ $nAns +"'>" +
                        "<label class='lab_ans'>"+ $nAns +". <input type='text' name='answer_"+ $idQuestion +"_text_"+ $nAns +"' style='width: 70%; height: 70px' placeholder='Введите ответ'></label>" +
                        "<input type='number' name='answer_"+ $idQuestion +"_points_"+ $nAns +"' style='width: 20%;' placeholder='Количество баллов'>" +
                        "<button type='button' class='answer_rem_but'>Удалить</button>" +
                        "</p>");
                        break;
                    /*case "v3":
                     $(this).before("" +
                     "<label class='lab_ans'>"+ $nAns +". <input type='text' name='"+ $idQuestion +"_answer_text_"+ $nAns +"' style='width: 50%;' placeholder='Введите ответ'></label></br>");
                     break;*/
                    default:
                        alert("Не указан тип!");
                }
            });
        }
        });
    $('button[name = add_answer_but]').on('click', function() {
        $idQuestion = $(this).parent('fieldset').attr('id');
        $qType = $(this).siblings('input').val();
        $nAns = $(this).prev('p').attr('class');
        $nAns = parseInt($nAns);
        $nAns += 1;
        switch ($qType) {
            case "v1":
                $(this).before("" +
                "<p class='" + $nAns + "'>" +
                "<label class='lab_ans'>" + $nAns + ". <input name='answer_" + $idQuestion + "_val_" + $nAns + "' type='hidden' value='" + $nAns + "'>" +
                "<input type='text' name='answer_" + $idQuestion + "_text_" + $nAns + "' style='width: 50%;' placeholder='Введите ответ'></label>" +
                "<input type='number' name='answer_" + $idQuestion + "_points_" + $nAns + "' style='width: 20%;'placeholder='Количество баллов'>" +
                "<button type='button' class='answer_rem_but'>Удалить</button>" +
                "</p>");
                break;
            case "v2":
                $(this).before("" +
                "<p class='" + $nAns + "'>" +
                "<label class='lab_ans'>" + $nAns + ". <input type='text' name='answer_" + $idQuestion + "_text_" + $nAns + "' style='width: 50%;' placeholder='Введите ответ'></label>" +
                "<input type='number' name='answer_" + $idQuestion + "_points_" + $nAns + "' style='width: 20%;' placeholder='Количество баллов'>" +
                "<button type='button' class='answer_rem_but'>Удалить</button>" +
                "</p>");
                break;
            /*case "v3":
             $(this).before("" +
             "<label class='lab_ans'>"+ $nAns +". <input type='text' name='"+ $idQuestion +"_answer_text_"+ $nAns +"' style='width: 50%;' placeholder='Введите ответ'></label></br>");
             break;*/
            default:
                alert("Не указан тип!");
        }
    });
});
