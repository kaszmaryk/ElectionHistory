<?php
class media_controller extends Controller{
    function __construct()
    {
        $this->model = new model_media();
        $this->view = new View();
    }
    function action_index()
    {
        $this->view->generate('media/mediamain_view.php', 'template_view.php');
    }

    function action_photo()
    {
        $data = $this->model->get_photos();

        if(isset($_POST['submit']) == 'submit')
        {

            $name = $_FILES["photofile"]["name"];
            $tmpname = $_FILES["photofile"]["tmp_name"];
            $ferror = $_FILES["photofile"]["error"];

            $uploaddir = 'img/media_photos/';
            $uploadfile = '';
            $uploaded = false;

            if(isset($name))
            {
                if(!empty($name))
                {

                    if(strpos($name, '.jpg') || strpos($name, '.jpeg') || strpos($name, '.png')) {

                        $uploadfile = $uploaddir . $name;

                        if (move_uploaded_file($tmpname, $uploadfile)) {
                            echo "<p class='sys-message success'>Фото успешно загружено</p>";
                            $uploaded = true;
                        } else {
                            echo "<p class='sys-message fail'>Не удалось загрузить фото. Ошибка: " . $ferror . "</p>";
                        }
                    } else
                    {
                        echo "<p class='sys-message fail'>Неверный тип файла: выберите файл в формате jpg, jpeg или png</p>";
                    }
                }
                else
                {
                    echo "<p class='sys-message fail'>Выберите файл</p>";
                }

            }

            if($uploaded)
            {
                $alt = $_POST['photo_alt'];
                $author = $_POST['author'];
                $title = $_POST['photo_title'];
                $comment = $_POST['photo_comment'];

                include("application/included/dbconnect.php");

                $sql = "INSERT INTO photos_list (`alt`, `url`, `author`, `title`, `comment`) VALUES ('$alt', '$uploadfile', '$author', '$title', '$comment')";
                $result = mysqli_query($conn, $sql);

                if(!$result) {
                    echo "<p class='sys-message fail'>Не удалось загрузить фото</p>";
                }
                else
                {
                    echo "<p class='sys-message success'>Фото успешно загружено</p>";

                    mysqli_close($conn);

                    header('Location: /media/photo');
                }
            }
        }


        $this->view->generate('media/photos_view.php', 'template_view.php', $data);
    }
}