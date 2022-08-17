<?php

namespace App;

class User
{
    protected $users = [
        'user1', 'user2', 'user3'
    ];

    public function all() {
        return $this->users;
    }
}
