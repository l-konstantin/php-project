<?php

namespace App;

class Users extends MainController
{
    public function php() {
        $userModel = new User();
        $allUsers = $userModel->all();
        $this->view->render('users/userfirst', ['users' => $allUsers]);        
    }
}
