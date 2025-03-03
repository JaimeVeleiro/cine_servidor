<?php

namespace App\Controllers;

use App\Models\Cinemas;
use Core\Model;

class CinemaController
{
    public static function index() {
        Model::sessionTimeout();
        $cinemas = Cinemas::all();
        require_once __DIR__ . "/../views/cinemas.php";
    }

    public static function show() {
        Model::sessionTimeout();
        require_once __DIR__ . "/../views/movies.php";
    }
}