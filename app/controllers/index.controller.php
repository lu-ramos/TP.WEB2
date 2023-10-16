<?php
require_once './app/views/index.view.php';
require_once './helpers/auth.helper.php';

class IndexController {
    private $view;

    public function __construct() {
        // AuthHelper::verify();
        $this->view = new IndexView();
    } 

    public function showIndex() {
        $this->view->showIndex();
    }
}