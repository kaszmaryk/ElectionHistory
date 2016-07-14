<?php
class Main_Controller extends Controller {

    function action_index() {
        //$this->$view->generate('main_view.php', 'us_view.php');
        $this->view = new View();

        if(isset($_POST['regSubmit']) == 'submit') {
            $LastName = $_POST['LastNameField'];
            $FisrtName = $_POST['FirstNameField'];
            $EmailField = $_POST['EmailField'];
            $LoginField = $_POST['LoginField'];
            $PasswordField = md5(md5($_POST['PasswordField']));
            require_once("application/included/dbconnect.php");
            /*Проверяем, есть ли пользователь с таким логином в базе*/
            $query="SELECT * FROM users WHERE login='$LoginField'";
            $result=mysqli_query($conn, $query);
            $num_rows = $result->num_rows;

            if ($num_rows>0) { //если пользователь существует, выводим сообщение
                echo "<p class='sys-message fail'>Пользователь с таким логином уже существует</p>";
                mysqli_close($conn);
            } else {

                /*Проверяем, есть ли пользователь с таким e-mail в базе*/
                $query = "SELECT * FROM `users` WHERE `e-mail`='$EmailField'";
                $result = mysqli_query($conn, $query);
                $num_rows = $result->num_rows;

                if ($num_rows > 0) {
                    echo "<p class='sys-message fail'>На данный e-mail уже зарегистрирован пользователь</p>";
                    mysqli_close($conn);
                } else {
                    $sql = "INSERT INTO `users` (`LastName`, `FirstName`, `e-mail`, `login`, `password`) VALUES ('$LastName', '$FisrtName', '$EmailField', '$LoginField', '$PasswordField')";

                    $rs = mysqli_query($conn, $sql);

                    if (!$rs) { //если при создании произошла ошибка выводим сообщение
                        echo "<p class='sys-message fail'>К сожалению произошла ошибка, вернитесь на страницу назад и попробуйте ещё раз</p>";

                        mysqli_close($conn);
                    } else { //если всё нормально, переходим на страницу входа
                        echo "<p class='sys-message success'>Пользователь успешно зарегистрирован, воспользуйтесь формой входа, чтобы войти</p>";
                        mysqli_close($conn);
                    }
                }
            }
        }

        if(isset($_POST['enbutton']) == 'submit') {

            $LoginField = $_POST['login'];
            $PasswordField = md5(md5($_POST['password']));
            require_once("application/included/dbconnect.php");
            $query="SELECT * FROM users WHERE (`login`='$LoginField' OR `e-mail`='$LoginField')";

            $result=mysqli_query($conn, $query);

            $num_rows = $result->num_rows;

            if ($num_rows>0) {

                $querypass = "SELECT * FROM users WHERE (`login`='$LoginField' OR `e-mail`='$LoginField') and password='$PasswordField'";

                $logproc=mysqli_query($conn, $querypass);
                $row_user = mysqli_fetch_array($logproc);
                $login = $row_user['login'];
                $id = $row_user['id'];

                $num_rows = $logproc->num_rows;

                if ($num_rows == 1) {
                    $_SESSION['user'] = $login;

                    mysqli_close($conn);

                    header('Location: /profile/view?id='. $id); exit;
                } else {
                    echo "<p class='sys-message fail'>Неправильный пароль</p>";

                    mysqli_close($conn);
                };
            } else {
                echo "<p class='sys-message fail'>Пользователя с таким логином не существует</p>";

                mysqli_close($conn);
            }
        }

        $this->view->generate('main_view.php','template_view.php');
    }
    }
//}