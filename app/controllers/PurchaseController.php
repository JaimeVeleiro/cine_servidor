<?php

namespace App\Controllers;

use App\Models\Purchases;
use Core\Model;

class PurchaseController
{
    public static function index() {
        Model::sessionTimeout();

        $purchases = Purchases::all();

        require_once __DIR__ . "/../views/purchases.php";
    }
}