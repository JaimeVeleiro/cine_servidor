<?php

namespace App\Controllers;

use App\Models\Movies;
use Core\Model;

class MovieController
{
    public static function show($args)
    {
        Model::sessionTimeout();

        $movies = Movies::show($args);

        require_once __DIR__ . "/../views/movies.php";

    }

    public static function purchase($args) {
        Model::sessionTimeout();

        $movie = Movies::findOne($args);

        require_once __DIR__ . "/../views/purchase-menu.php";
    }

    public static function buyTickets($args) {
        Model::sessionTimeout();

        $ticketsPurchased = Movies::updateTickets($args);

        if (Movies::updatePurchase($args)) {
            Movies::insertPurchase($args);
        }

        require_once __DIR__ . "/../views/purchase-completed.php";
    }
}