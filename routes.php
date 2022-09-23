<?php


use App\Controllers\AuthController;
use App\Router;
use App\Controllers\PostController;
use App\Controllers\PublicController;

Router::get('/', [PublicController::class, 'index']);
Router::get('/new', [PostController::class, 'new']);
Router::post('/add', [PostController::class, 'add']);
Router::get('/posts/show', [PostController::class, 'show']);
Router::get('/posts/edit', [PostController::class, 'edit']);
Router::post('/posts/edit', [PostController::class, 'update']);
Router::get('/posts/delete', [PostController::class, 'delete']);
Router::get('/test', [PublicController::class, 'test']);

Router::get('/upload', [PublicController::class, 'uploadForm']);
Router::post('/upload', [PublicController::class, 'upload']);

Router::get('/register', [AuthController::class, 'registerForm']);
Router::get('/login', [AuthController::class, 'loginForm']);
Router::post('/register', [AuthController::class, 'register']);
Router::post('/login', [AuthController::class, 'login']);
Router::get('/logout', [AuthController::class, 'logout']);