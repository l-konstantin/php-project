<?php

use App\Loader;

require "vendor/autoload.php";

$loader = new Loader();
$loader->loadClass();
$loader->fireMethod();
