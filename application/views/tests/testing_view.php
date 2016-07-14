<?php include("application/included/menu.php"); ?>
<div class="block main-info">
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
            <?php

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
                foreach ($question_array as $question)
                {
                    //id^%^type^%^title^%^[[answer/:/point]/;/[answer/:/point]]
                    list($q_id, $q_type, $q_title, $answers) = explode("^%^", $question);

                    switch ($q_type)
                    {
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
                }
            }
            function get_v1($q_id, $q_type, $q_title, $answers)
            { ?>
            <fieldset id="<?php echo $q_id; ?>" class='quest-field'>
                <p class="type-of-test">Выберите правильный ответ</p>

                <p class='question-title'><h2 class="num-quest"><?php echo $q_id; ?>. <?php echo $q_title; ?></h2></p>
                <hr>
                <?php
                $answers = explode("/;/", $answers);

                if (count($answers) > 0) {
                    $nAns = 0;
                    ?>
                    <p class="question-answers">
                        <?php
                        foreach ($answers as $answer) {
                            if ($nAns == 0) {
                                $nAns += 1;
                            } else {
                                ?>
                                <?php list($answer_t, $point) = explode("/:/", $answer); ?>

                                    <label><input name="<?php echo $q_id; ?>_1" type="radio"
                                                  value="<?php echo $answer_t; ?>"> <?php echo $answer_t; ?></label></br>

                                <?php
                                $nAns+=1;
                            }
                        }
                        ?>
                    </p>
                <?php

                } else {
                    $nAns = 0;

                    if ($nAns == 0) {
                        $nAns += 1;
                    } else {
                        list($answer_t, $point) = explode("/:/", $answer); ?>

                        <label><input name="<?php echo $q_id; ?>_<?php echo $nAns; ?>" type="radio"
                                      value="<?php echo $nAns; ?>"> <?php echo $answer_t; ?></label>
                    <?php
                    }
                }
                    ?>
                    </fieldset>
                <?php
            }
            function get_v2($q_id, $q_type, $q_title, $answers)
            {
                $nAns = 0;
                if ($nAns == 0) {
                    $nAns += 1;
                }
                    ?>
                    <fieldset id="<?php echo $q_id; ?>" class='quest-field'>
                        <p class="type-of-test">Введите правильный ответ</p>

                        <p class='question-title'><h2 class="num-quest"><?php echo $q_id; ?>. <?php echo $q_title; ?></h2></p>
                        <hr>
                        <p class="question-answers">
                            <label>Введите ответ: <input name="<?php echo $q_id; ?>_<?php echo $nAns; ?>" type="text"
                                                         placeholder="Введите ответ"></label>
                        </p>
                    </fieldset>
                <?php
            }
            function get_v3($q_id, $q_type, $q_title, $answers)
            {
                $nAns = 0;
                if ($nAns == 0)
                {
                    $nAns += 1;
                }
                    ?>
                    <fieldset id="<?php echo $q_id; ?>" class='quest-field'>
                        <p class="type-of-test">Расставьте указанные значения по порядку</p>

                        <p class='question-title'><h2 class="num-quest"><?php echo $q_id; ?>. <?php echo $q_title; ?></h2></p>
                        <hr>
                        <p class="question-answers">
                            <label>Введите ответ: <input name="<?php echo $q_id; ?>_<?php echo $nAns; ?>" type="text"
                                                         placeholder="Введите ответ"></label>
                        </p>
                    </fieldset>
                <?php

            }
            ?>
            <fieldset id="set_test">
                <p>
                <button name="submit" type="submit" value="submit">Засчитать тест</button>
                </p>
            </fieldset>
        </form>
    </div>
</div>
