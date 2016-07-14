<?php

class Controller {
    public $model;
    public $view;
    public $tr = 12;

    function _construct() {
        $this->$view = new View();
    }

    function action_index() {

    }
}