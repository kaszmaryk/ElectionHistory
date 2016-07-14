<?php
class Route {
    static function start() {
        $id_prev = '';
        if(isset($_SESSION['user'])) {
            $controller_name = 'Profile';
            $action_name = 'index';

            //echo $user_id;
            $routes = explode('/', $_SERVER['REQUEST_URI']);
            // получаем имя контроллера
            if ( !empty($routes[1]) ) {
                $controller_name = $routes[1];
            }

            // получаем имя экшена
            if ( !empty($routes[2]) ) {;
                if(strpos($routes[2], '?')) {
                    list($action_url, $id_prev) = explode("?", $routes[2]);
                    $action_name = $action_url;
                } else {
                    $action_name = $routes[2];
                }
            }
        } else {
            $controller_name = 'Main';
            $action_name = 'index';
        }

        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = $controller_name.'_controller';
        $action_name = 'action_'.$action_name;

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path)) {
            include "application/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path)) {
            include "application/controllers/".$controller_file;
        }
        else {
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action($id_prev);
        }
        else {
            Route::ErrorPage404();
        }

    }

    function ErrorPage404() {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

}