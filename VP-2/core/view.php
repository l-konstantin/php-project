<?php

namespace App;

class View
{
    protected $loader;
    protected $twig;

    public function render(String $filename, array $data) {
        extract($data);
        require_once __DIR__."/../views/".$filename.".php";
    }
}