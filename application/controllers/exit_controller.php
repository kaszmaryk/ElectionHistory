<?php
class exit_controller extends Controller{
    function action_index() {
        //$this->$view->generate('main_view.php', 'us_view.php');
        session_destroy();
        header('Location: /');
    }
}