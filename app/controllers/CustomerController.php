<?php

namespace app\controllers;

use App\Models\Customer;
use Core\Validation;

class CustomerController
{

    public function login (): void
    {
        require_once __DIR__ . "/../views/login.php";
    }

    public function logout(): void {
        session_start();
        session_destroy();
        require_once __DIR__ . "/../views/login.php";
    }

    public function enterLogin():void {
        list($data, $errors) = Validation::validateUser();

        if (count($errors)) {
            require_once __DIR__ . "/../views/login.php";
            exit;
        }

        $customer = Customer::findByEmail($data["email"]);

        if (!$customer || !password_verify($data["password"], $customer->password)) {
            $errors['login'] = true;
            require_once __DIR__ . "/../views/login.php";
            exit;
        }

        session_start();
        $_SESSION["user"] = $customer->name . " " .  $customer->surname;
        $_SESSION["user_id"] = $customer->idCustomer;

        header('Location: /cinema/index');


    }
}