<?php

require_once __DIR__ . '/../app/Controllers/UserController.php';

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', function() {
    echo 'Home pages';
});

Router::get('/users', [UserController::class, 'index']);
Router::get('/users/{id}', [UserController::class, 'show']);
