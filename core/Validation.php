<?php

namespace core;

use PDO, PDOException;
use Core\Model;

class Validation
{
    public static function validateUser():array {
        $data = [];
        $errors = [];

        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $data["email"] = $_POST["email"];
        } else {
            $errors["email"] = $_POST["email"];
        }

        if (preg_match("/[a-zA-Z0-9]{2,}/", $_POST["password"])) {
            $data["password"] = $_POST["password"];
        } else {
            $errors["password"] = $_POST["password"];
        }

        return [$data, $errors];
    }
}