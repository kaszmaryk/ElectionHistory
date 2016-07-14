<?php
class profile_controller extends Controller {
    function action_index() {
        require_once("application/included/dbconnect.php");
        require_once("application/included/session.php");

        header('Location: /profile/view?id='.$user_id);
    }
    /*function action_view() {
        $this->view = new View();
        $this->view->generate('profile/profile_view.php','template_view.php');
    }*/
    function action_view($id) {
        $this->view = new View();
        $this->model = new model_profile();
        $data = $this->model->get_data();

        $this->view->generate('profile/profile_view.php','template_view.php', $data);
    }
    function action_edit() {
        $this->view = new View();

        if(isset($_POST['editInfoSubmit']) == 'submit') {
            require_once("application/included/dbconnect.php");
            require_once("application/included/session.php");
            $LastName = $_POST['LastName'];
            $FirstName = $_POST['FirstName'];
            $FathName = $_POST['FathName'];
            if($user_rights == 1) {
                $kath = $_POST['kath'];
                $degree = $_POST['degree'];
            } else {
                $course = $_POST['course'];
                $ngroup = $_POST['ngroup'];
                $speciality = $_POST['speciality'];
            }
            $email = $_POST['e-mail'];
            $nlogin= $_POST['login'];
            $ouser = $_SESSION['user'];
            if($user_rights == 0) {
                $sqlstring = "UPDATE `users` SET `LastName`='$LastName', `FirstName`='$FirstName', `FathName`='$FathName', `course`='$course', `ngroup`='$ngroup', `speciality`='$speciality', `e-mail`='$email', `login`='$nlogin' WHERE `login`='$ouser'";
            } else {
                $sqlstring = "UPDATE `users` SET `LastName`='$LastName', `FirstName`='$FirstName', `FathName`='$FathName', `kath`='$kath', `degree`='$degree', `e-mail`='$email', `login`='$nlogin' WHERE `login`='$ouser'";
            }
            $result = mysqli_query($conn, $sqlstring);

            if(!$result) {
                echo "<p class='sys-message fail'>К сожалению произошла ошибка, вернитесь на страницу назад и попробуйте ещё раз</p>";

                mysqli_close($conn);
            } else {
                $_SESSION['user'] = $nlogin;
                mysqli_close($conn);

                header("Location: /profile/edit");
            }
        }

        if(isset($_POST['changePassSubmit']) == 'submit') {
            require_once("application/included/dbconnect.php");
            require_once("application/included/session.php");

            $in_password = md5(md5($_POST['old_password']));
            $n_password = md5(md5($_POST['new_password']));
            $n_password_ag = md5(md5($_POST['new_password_ag']));
            $ouser = $_SESSION['user'];

            if($in_password !== $user_password) {
                echo "<p class='sys-message fail'>Введённый вами пароль неверен, попробуйте ещё раз</p>";

                //mysqli_close($conn);
            } elseif($n_password !== $n_password_ag) {
                echo "<p class='sys-message fail'>Введённые вами пароли не совпадают, попробуйте ещё раз</p>";

                //mysqli_close($conn);
            } else {
                $sqlstring = "UPDATE `users` SET `password`='$n_password' WHERE  `login`='$ouser'";
                $result = mysqli_query($conn, $sqlstring);

                if(!$result) {
                    echo "<p class='sys-message fail'>К сожалению произошла ошибка, вернитесь на страницу назад и попробуйте ещё раз</p>";

                    //mysqli_close($conn);
                } else {
                    mysqli_close($conn);

                    header("Location: /profile/edit");
                }
            }
        }

        $this->view->generate('profile/edit_view.php','template_view.php');

    }
}