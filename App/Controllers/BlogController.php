<?php
namespace App\Controllers;

use App\Models\Post;

class BlogController extends Controller {
    public function index() {
        $model = new Post;

        $this->render('Blog', [
            'posts' => [$model->find(2)]
        ]);
    }
}