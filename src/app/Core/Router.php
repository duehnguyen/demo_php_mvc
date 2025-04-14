<?php

namespace App\Core;

use Pecee\SimpleRouter\SimpleRouter;

class Router {
    public static function start() {
        require_once __DIR__ . '/../../routes/api.php';
        SimpleRouter::start();
    }
}
