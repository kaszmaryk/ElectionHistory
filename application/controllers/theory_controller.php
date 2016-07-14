<?php
class theory_controller extends Controller{
    function __construct()
    {
        $this->model = new model_theory();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('theory/theorylist_view.php', 'template_view.php', $data);
    }

    function action_add() {
        if(isset($_POST['createLectionBut']) == "submit") {
            $title = $_POST['lec_title'];
            $text = $_POST['lec_text'];
            $author = $_POST['author'];


            require_once("application/included/dbconnect.php");
            $sql = "INSERT INTO theorie_list (`title`, `text`, `author`) VALUES ('$title', '$text', '$author')";
            $result = mysqli_query($conn, $sql);

            if(!$result) {
                echo "<p class='sys-message fail'>К сожалению произошла ошибка, вернитесь на страницу назад и попробуйте ещё раз</p>";

                mysqli_close($conn);
            } else {
                mysqli_close($conn);

                header('Location: /theory'); exit;
            }
        }
        $this->view->generate('theory/theory_add.php', 'template_view.php');
    }

    function action_read($id) {
        $data = $this->model->get_page($id);
        $this->view->generate('theory/theorypage_view.php', 'template_view.php', $data);
    }

    function action_edit($id) {
        $data = $this->model->get_page($id);

        if(isset($_POST['editLectionBut']) == 'submit') {
            $title = $_POST['lec_title'];
            $text = $_POST['lec_text'];

            list($param, $val) = explode("=", $id);

            include("/application/included/dbconnect.php");
            $sql = "UPDATE theorie_list SET `title`='$title', `text`='$text' WHERE `id`='$val'";
            $result = mysqli_query($conn, $sql);

            if(!$result) {
                echo "<p class='sys-message fail'>К сожалению произошла ошибка, вернитесь на страницу назад и попробуйте ещё раз</p>";

                mysqli_close($conn);
            } else {
                mysqli_close($conn);

                header('Location: /theory'); exit;
            }
        }

        $this->view->generate('theory/theory_edit.php', 'template_view.php', $data);
    }
}