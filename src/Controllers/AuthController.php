<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function registerForm(){
        view('register');
    }

    public function loginForm(){
        view('login');
    }

    public function register(){
        if($_POST['password'] === $_POST['confirm_password']) {
            $user = new User();
            $user->fname = $_POST['fname'];
            $user->lname = $_POST['lname'];
            $user->email = $_POST['email'];
            $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $user->save();
        }
        header('Location: /login');
    }

    public function login(){
         $user = User::where('email', $_POST['email']);
         if($user && password_verify($_POST['password'], $user->password)){
            $_SESSION['user_id'] = $user->id;
         }
        header('Location: /');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        header('Location: /');
    }
}