<?php

class AdminView {

    public function ShowAddItemForm() {
        require_once './templates/abm.phtml';
    }

    public function ShowModifyItemForm() {
        require_once './templates/modificarGame.phtml';
    }

}
