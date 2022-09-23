<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;

class PublicController {

    public function index(){

        $posts = Post::all();
        dd($posts);
//        $users = User::all();
//        var_dump($users);
        view('home', compact('posts'));
    }

    public function uploadForm(){
        view('upload');
    }

    public function upload(){
        var_dump($_FILES, $_POST);
        $img = $_FILES['image'];
        $extension = explode('.',$img['name']);
        $extension = $extension[count($extension)-1];
        $hash = md5($img['name'].microtime());
        move_uploaded_file($img['tmp_name'], 'public/uploads/'. $hash. '.' . $extension);
    }


    public function test(){

        var_dump($_SESSION);


    }
}