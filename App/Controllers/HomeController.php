<?php
namespace App\Controllers;

class HomeController extends Controller {
    public function index() {
        echo $this->render('Home');
    }
}