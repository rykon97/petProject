<?php
namespace App\Controllers;

class BlogController extends Controller {
    public function index() {
        $this->render('Blog');
    }
}