<?php
class tests_controller extends Controller{
    function __construct()
    {
        $this->model = new model_tests();
        $this->view = new View();
    }
    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('tests/testlist_view.php', 'template_view.php', $data);
    }

    function action_add()
    {
        $this->view = new View();
        $this->view->generate('tests/testadd_view.php', 'template_view.php');
    }

    function action_edit($id)
    {
        $this->view = new View();
        $data = $this->model->get_test($id);
        list($param, $id) = explode("=", $id);

        if(isset($_POST['add_test_but']) == "submit")
        {
            //строение строки с данными о вопросе: id^%^type^%^title^%^[[answer/:/point]/;/[answer/:/point]]!%
            $test_name = $_POST['test_title'];
            $max_points = $_POST['max_points'];
            $str_quest = '';
            $id_quest = 1;
            $q_type = "q_" . $id_quest . "_type";
            $title = "title_" . $id_quest . "_text";

            while (isset($_POST[$q_type]))
            {

                switch($_POST[$q_type])
                {
                    case "v1";
                    case "v2":
                        $q_type = $_POST[$q_type];
                        $title = $_POST[$title];
                        $q_str = $id_quest . "^%^" . $q_type . "^%^" . $title;
                        $answers = '';
                        $na = 1;
                        $q_ans = "answer_" . $id_quest . "_text_" . $na;
                        $q_points = "answer_" . $id_quest . "_points_" . $na;
                        while(isset($_POST[$q_ans]))
                        {
                            $q_ans = $_POST[$q_ans];
                            $q_points = $_POST[$q_points];
                            $answers = $answers . "/;/" . $q_ans . "/:/" . $q_points;
                            $na = $na+1;
                            $q_ans = "answer_" . $id_quest . "_text_" . $na;
                            $q_points = "answer_" . $id_quest . "_points_" . $na;
                        }
                        $q_str = $q_str . "^%^" . $answers;

                        if($str_quest == '')
                        {
                            $str_quest = $q_str;
                        }
                        else
                        {
                            $str_quest = $str_quest . "!%" . $q_str;
                        }
                        break;
                    case "v3":
                        $q_type = $_POST[$q_type];
                        $title = $_POST[$title];
                        $q_str = $id_quest . "^%^" . $q_type . "^%^" . $title;
                        $answers = '';
                        $q_ans = "c_answer_" . $id_quest . "_text";
                        $q_points = "answer_" . $id_quest . "_points";
                        $q_ans = $_POST[$q_ans];
                        $q_points = $_POST[$q_points];
                        $answers = $answers . "/;/" . $q_ans . "/:/" . $q_points;

                        $q_str = $q_str . "^%^" . $answers;

                        if($str_quest == '')
                        {
                            $str_quest = $q_str;
                        }
                        else
                        {
                            $str_quest = $str_quest . "!%" . $q_str;
                        }


                        break;
                    default:
                        echo "Type mistake";
                }

                $id_quest += 1;
                $q_type = "q_" . $id_quest . "_type";
                $title = "title_" . $id_quest . "_text";
            }

            include("application/included/dbconnect.php");
            $sql = "UPDATE test_list SET `test_name`='$test_name', `max_points`='$max_points', `questions`='$str_quest' WHERE `id`='$id'";
            $result = mysqli_query($conn, $sql);

            if(!$result)
            {
                echo "<p class='sys-message fail'>К сожалению произошла ошибка, вернитесь на страницу назад и попробуйте ещё раз</p>";
            }
            else
            {
                mysqli_close($conn);

                header("Location: /tests");
            }

        }
        $this->view->generate('tests/testred_view.php', 'template_view.php', $data);
    }

    function action_testing($id) {
        $this->view = new View();
        $data = $this->model->get_test($id);

        if(isset($_POST['submit']) == 'submit')
        {
            $test_id = $data['id'];
            $test_questions = $data['questions'];
            $max_points = $data['max_points'];
            $user_result = 0;

            if(strpos($test_questions, "!%"))
            {
                $question_array = explode("!%", $test_questions);
            }
            else
            {
                $question_array = $test_questions;
            }
            if(is_array($question_array))
            {
                foreach ($question_array as $question)
                {
                    list($q_id, $q_type, $q_title, $answers) = explode("^%^", $question);

                    $answers = explode("/;/", $answers);

                    if (count($answers) > 0)
                    {
                        $nAns = 0;

                        foreach ($answers as $answer)
                        {
                            if ($nAns == 0)
                            {
                                $nAns += 1;
                            }
                            else
                            {
                                if($q_type == 'v1' || $q_type == 'v2'){
                                    $name = $q_id . "_1";
                                }
                                else
                                {
                                    $name = $q_id . "_" . $nAns;
                                }
                                if(isset($_POST[$name]))
                                {
                                    $user_answer = $_POST[$name];
                                    list($answer_t, $point) = explode("/:/", $answer);
                                    if ($user_answer == $answer_t)
                                    {
                                        $user_result += intval($point);
                                    }
                                    $nAns += 1;
                                }
                            }
                        }
                    }
                }
            }

            $user_mark = round(($user_result * 10/ $max_points));

            $str = $test_id . ":" . $user_mark . ";";
            $login = $_SESSION['user'];
            include("application/included/dbconnect.php");

            $sql = "SELECT * FROM users WHERE `login`='$login'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            $t_results = $row['test_results'];
            $new_results = '';
            if(!$t_results || $t_results == '')
            {
                $t_results = $str;
            }
            else
            {
                //проверяю, есть ли этот тест
                $k = 0;
                $res_array = explode(";", $t_results);
                $n_str = '';
                $pos = 1;
                $list = count($res_array);
                foreach($res_array as $res)
                {
                    $k_str = '';
                    if($pos == $list)
                    {

                    }
                    elseif(strpos($res, ":"))
                    {
                        list($tid, $tmark) = explode(":", $res);
                        if($test_id == $tid)
                        {
                            $k+=1;
                            $tmark = $user_mark;

                        }
                        $k_str = $tid . ":" . $tmark .";";
                    }
                    $n_str = $n_str . $k_str;
                    $pos+=1;
                }
                if($k < 1)
                {
                    $t_results = $t_results . $str;
                } else {
                    $t_results = $n_str;
                }
            }

            $sql = "UPDATE users SET `test_results`='$t_results' WHERE `login`='$login'";
            $result = mysqli_query($conn, $sql);

            if(!$result)
            {
                echo "<p class='sys-message fail'>К сожалению произошла ошибка, вернитесь на страницу назад и попробуйте ещё раз</p>";

                mysqli_close($conn);
            }
            else
            {
                mysqli_close($conn);

                header("Location: /tests");
            }

        }

        list($param, $id) = explode("=", $id);

        $this->view->generate('tests/testing_view.php', 'template_view.php', $data);
    }
}