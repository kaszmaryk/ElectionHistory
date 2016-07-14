<?php include("application/included/menu.php"); ?>
<div class="block main-info">
    <script src="../../js/redTest.js"></script>
    <?php
        //Variables
        $t_id = $data['id'];
        $t_name = $data['test_name'];
        $t_max_points = $data['max_points'];
        $t_quest = $data['questions'];


    ?>
    <div>
        <h1 class="directory-head">Тест: <?php echo $t_name; ?></h1>
    </div>
    <div>
        <form name="test" action="" method="post" accept-charset="utf8_general_ci">
            <p>
                Если текст вопроса содержит комментарии, то они должны быть заключены в тег <span><</span>p class='question-title'<span>></span><<span>p></span>
            </p>
            <input name="test_id" type="hidden" value="<?php echo $t_id; ?>">
            <p>Название теста: <input name="test_title" type="text" placeholder="Введите название теста" value="<?php echo $t_name; ?>" style="width: 70%;"></p>
            <p>Максимальное число баллов за тест: <input name="max_points" type="number" placeholder="Введите число" value="<?php echo $t_max_points; ?>"></p>
            <?php
            if($t_quest == null)
            { ?>
                <fieldset id="add_q_field" name="add_q_field">
                <p>Укажите тип вопроса и создайте его</p>
                <select name='q_type'>
                    <option disabled>Выберите тип вопроса</option>
                    <option value='v1'>Выбор правильного ответа</option>
                    <option value='v2'>Ввод правильного ответа</option>
                    <option value='v3'>Установление последовательности</option>
                </select>
                <button name="add_quest_but" type="button">Добавить вопрос</button>
                </fieldset>
                <button name="add_test_but" type="submit" value="submit">Обновить тест</button>
            <?php
                }
                else
                {
                    if(strpos($t_quest, "!%"))
                    {
                        $question_array = explode("!%", $t_quest);
                    }
                    else
                    {
                        $question_array = $t_quest;
                    }
                    if(is_array($question_array))
                    {
                        foreach($question_array as $question)
                        {
                            //id^%^type^%^title^%^[[answer/:/point]/;/[answer/:/point]]
                            list($q_id, $q_type, $q_title, $answers) = explode("^%^", $question);

                            switch ($q_type) {
                                case "v1":
                                    get_v1($q_id, $q_type, $q_title, $answers);
                                    break;
                                case "v2":
                                    get_v2($q_id, $q_type, $q_title, $answers);
                                    break;
                                case "v3":
                                    get_v3($q_id, $q_type, $q_title, $answers);
                                    break;
                                default:
                                    echo "<p>Incorrect type!</p>";


                            }
                        } ?>

                <fieldset id="add_q_field" name="add_q_field">
                    <p>Укажите тип вопроса и создайте его</p>
                    <select name='q_type'>
                        <option disabled>Выберите тип вопроса</option>
                        <option value='v1'>Выбор правильного ответа</option>
                        <option value='v2'>Ввод правильного ответа</option>
                        <option value='v3'>Установление последовательности</option>
                        <option value='v4'>Установление соответствия</option>
                    </select>
                    <button name="add_quest_but" type="button">Добавить вопрос</button>
                </fieldset>
                <button name="add_test_but" type="submit" value="submit">Обновить тест</button>
            <?php
                }
                else
                {
                    list($q_id, $q_type, $q_title, $answers) = explode("^%^", $question_array);

                    switch($q_type) {
                        case "v1":
                            get_v1($q_id, $q_type, $q_title, $answers);
                            break;
                        case "v2":
                            get_v2($q_id, $q_type, $q_title, $answers);
                            break;
                        case "v3":
                            get_v3($q_id, $q_type, $q_title, $answers);
                            break;
                        case "v4":
                            get_v4($q_id, $q_type, $q_title, $answers);
                            break;
                        default:
                            echo "Incorrect type!";


                    }
                    ?>
                    <fieldset id="add_q_field" name="add_q_field">
                        <p>Укажите тип вопроса и создайте его</p>
                        <select name='q_type'>
                            <option disabled>Выберите тип вопроса</option>
                            <option value='v1'>Выбор правильного ответа</option>
                            <option value='v2'>Ввод правильного ответа</option>
                            <option value='v3'>Установление последовательности</option>
                            <option value='v4'>Установление соответствия</option>
                        </select>
                        <button name="add_quest_but" type="button">Добавить вопрос</button>
                    </fieldset>
                    <button name="add_test_but" type="submit" value="submit">Обновить тест</button>
                    <?php
                }



            }

            function get_v1($q_id, $q_type, $q_title, $answers) {
                ?>
                <fieldset id="<?php echo $q_id; ?>" class='quest-field'>
                    <p>Выбор правильного ответа</p>
                    <input name='q_<?php echo $q_id; ?>_type' type='hidden' value="<?php echo $q_type; ?>">
                    <label class='question-title'><?php echo $q_id; ?>. <textarea type='text' name='title_<?php echo $q_id; ?>_text' style='width: 70%; height: 70px;' placeholder='Введите вопрос...'><?php echo $q_title; ?></textarea></label></br>
                    <hr>
                    <?php
                    $answers = explode("/;/", $answers);

                    if(count($answers) > 0)
                    {
                        $nAns = 0;

                        foreach($answers as $answer) {
                            if($nAns == 0) {
                                $nAns+=1;
                            } else {
                                ?>

                                <?php list($answer_t, $point) = explode("/:/", $answer); ?>
                    <p class="<?php echo $nAns; ?>">
                    <label class='lab_ans' class='lab_ans'><?php echo $nAns; ?>. <input name='answer_<?php echo $q_id; ?>_val_<?php echo $nAns; ?>' type='hidden' value='<?php echo $nAns; ?>'>
                    <input type='text' name='answer_<?php echo $q_id; ?>_text_<?php echo $nAns; ?>' style='width: 50%;' placeholder='Введите ответ' value="<?php echo $answer_t; ?>"></label>
                    <input type='number' name='answer_<?php echo $q_id; ?>_points_<?php echo $nAns; ?>' style='width: 20%;'placeholder='Количество баллов' value="<?php echo $point; ?>">
                    <?php if($nAns > 1) { ?><button type="button" id="answer_rem_but" class="<?php echo $nAns; ?>">Удалить</button><?php } ?></p>

                    <?php
                                $nAns += 1;
                            }
                        }?>
                        <button type='button' name='add_answer_but' class='<?php echo $q_type; ?>'>Добавить вариант ответа</button>
                    <?php
                    }
                    else
                    {
                        list($answer_t, $point) = explode("/:/", $answers);?>
                    <p class="<?php echo $nAns; ?>">
                    <label class='lab_ans' class='lab_ans'>1. <input name='answer_<?php echo $q_id; ?>_val_1' type='hidden' value='1'>
                    <input type='text' name='answer_<?php echo $q_id; ?>_text_1' style='width: 50%;' placeholder='Введите ответ' value="<?php echo $answer_t; ?>"></label>
                    <input type='number' name='answer_<?php echo $q_id; ?>_points_1' style='width: 20%;'placeholder='Количество баллов' value="<?php echo $point; ?>">
                    <?php if($nAns > 1) { ?><button type="button" id="answer_rem_but" class="<?php echo $nAns; ?>">Удалить</button><?php } ?></p>
                    <button type='button' name='add_answer_but' class='<?php echo $q_type; ?>'>Добавить вариант ответа</button>
                    <?php
                    }

                    /*<label class='lab_ans'>"+ $nAns +". <input name='answer_<?php echo $q_id; ?>_val_"+ $nAns +"' type='hidden' value='"+ $nAns +"'>
                    <input type='text' name='answer_<?php echo $q_id; ?>_text_"+ $nAns +"' style='width: 50%;' placeholder='Введите ответ'></label>
                    <input type='number' name='answer_<?php echo $q_id; ?>_points_"+ $nAns +"' style='width: 20%;'placeholder='Количество баллов'></br>
                    <button type='button' name='add_answer_but' class='<?php echo $q_type; ?>'>Добавить вариант ответа</button>*/?>
                </fieldset>
            <?php
            }

            function get_v2($q_id, $q_type, $q_title, $answers)
            {
                ?>
                <fieldset id="<?php echo $q_id; ?>" class='quest-field'>
                    <p>Ввод правильного ответа</p>
                    <input name='q_<?php echo $q_id; ?>_type' type='hidden' value="<?php echo $q_type; ?>">
                    <label class='question-title'><?php echo $q_id; ?>. <textarea type='text' name='title_<?php echo $q_id; ?>_text' style='width: 70%; height: 70px;' placeholder='Введите вопрос...'><?php echo $q_title; ?></textarea></label></br>
                    <hr>
                    <?php
                    $answers = explode("/;/", $answers);

                    if (count($answers) > 0) {
                        $nAns = 0;

                        foreach ($answers as $answer) {
                            if ($nAns == 0) {
                                $nAns += 1;
                            } else {
                                list($answer_t, $point) = explode("/:/", $answer);
                                ?>
                                <p class="<?php echo $nAns; ?>">
                                    <label class='lab_ans'><?php echo $nAns; ?>. <input type='text'
                                                                                        name='answer_<?php echo $q_id; ?>_text_<?php echo $nAns; ?>'
                                                                                        style='width: 50%;'
                                                                                        placeholder='Введите ответ'
                                                                                        value="<?php echo $answer_t; ?>"></label>
                                    <input type='number' name='answer_<?php echo $q_id; ?>_points_<?php echo $nAns; ?>'
                                           style='width: 20%;' placeholder='Количество баллов'
                                           value="<?php echo $point; ?>">
                                    <?php if ($nAns > 1) { ?>
                                    <button type="button" id="answer_rem_but" class="<?php echo $nAns; ?>">
                                            Удалить</button><?php } ?></p>
                                <?php
                                $nAns += 1;
                            }
                        } ?>
                        <button type='button' name='add_answer_but' class='<?php echo $q_type; ?>'>Добавить вариант
                            ответа
                        </button>
                    <?php
                    } else {
                        ?>
                        <p class="1">
                            <label class='lab_ans'><?php echo $nAns; ?>. <input type='text'
                                                                                name='answer_<?php echo $q_id; ?>_text_<?php echo $nAns; ?>'
                                                                                style='width: 50%;'
                                                                                placeholder='Введите ответ'></label>
                            <input type='number' name='answer_<?php echo $q_id; ?>_points_<?php echo $nAns; ?>'
                                   style='width: 20%;' placeholder='Количество баллов'>
                            <?php if ($nAns > 1) { ?>
                            <button type="button" id="answer_rem_but" class="<?php echo $nAns; ?>">
                                    Удалить</button><?php } ?></[>
                    <button type='button' name='add_answer_but' class='<?php echo $q_type; ?>'>Добавить вариант ответа
                    </button>
            <?php
                }
                    ?>
                </fieldset>
            <?php
            }

            function get_v3($q_id, $q_type, $q_title, $answers)
            {
                    $nAns = 1;
                    list($answer_t, $point) = explode("/:/", $answers);
                    $answer_t = substr($answer_t, 3);
                    ?>
                <fieldset id="<?php echo $q_id; ?>" class='quest-field'>
            <p>Установить правильную последовательность</p>
            <p class='<?php echo $q_id; ?>'>
            <input name='q_<?php echo $q_id; ?>_type' type='hidden' value="<?php echo $q_type; ?>">
            <label class='question-title'><?php echo $q_id; ?>. <textarea type='text' name='title_<?php echo $q_id; ?>_text' style='width: 70%; height: 70px;' placeholder='Введите вопрос...'><?php echo $q_title; ?></textarea></label></br>
            <label class='question-title'>Правильный ответ: <input type='text' name='c_answer_<?php echo $q_id; ?>_text' style='width: 40%;' placeholder='Введите правильный ответ в формате 23451' value="<?php echo $answer_t; ?>"></label>
            <input type='number' name='answer_<?php echo $q_id; ?>_points' style='width: 20%;' placeholder='Количество баллов' value="<?php echo $point; ?>">
            </p>
            </fieldset>


            <?php
             }
            function get_v4($q_id, $q_type, $q_title, $answers)
            {
                $nAns = 1;
                list($answer_t, $point) = explode("/:/", $answers);
                $answer_t = substr($answer_t, 3);
                ?>
                <fieldset id="<?php echo $q_id; ?>" class='quest-field'>
                    <p>Установите соответствие</p>
                    <p class='<?php echo $q_id; ?>'>
                        <input name='q_<?php echo $q_id; ?>_type' type='hidden' value="<?php echo $q_type; ?>">
                        <label class='question-title'><?php echo $q_id; ?>. <textarea type='text' name='title_<?php echo $q_id; ?>_text' style='width: 70%; height: 70px;' placeholder='Введите вопрос...'><?php echo $q_title; ?></textarea></label></br>
                        <label class='question-title'>Правильный ответ: <input type='text' name='c_answer_<?php echo $q_id; ?>_text' style='width: 40%;' placeholder='Введите правильный ответ в формате 23451' value="<?php echo $answer_t; ?>"></label>
                        <input type='number' name='answer_<?php echo $q_id; ?>_points' style='width: 20%;' placeholder='Количество баллов' value="<?php echo $point; ?>">
                    </p>
                </fieldset>


            <?php
            }
            ?>

        </form>
    </div>
</div>