<?php
require_once './app/views/admin.view.php';
require_once './helpers/auth.helper.php';

class AdminController {
    private $view;

    public function __construct() {
        AuthHelper::verify();
        $this->view = new AdminView();   
    } 
    
    public function ShowAddItemForm() {
        $this->view->ShowAddItemForm();
    }
}