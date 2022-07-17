<?php
namespace App\Controllers;

use App\Models\Post;

class BlogController extends Controller {
    public function index() {
        $post = new Post;

        $this->render('Blog');
    }
}