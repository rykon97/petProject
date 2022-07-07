<?php

namespace App;

use App;
use App\Controllers\HomeController;

class Kernel 
{
    public function launch() {
        App::$router->get('/', [HomeController::class, 'index']);
        App::$router->resolve();
    }
}