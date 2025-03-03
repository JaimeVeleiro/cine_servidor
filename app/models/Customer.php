<?php

namespace App\Models;

use Core\Model;
use PDO;
use PDOException;

class Customer
{
    public static function findByEmail($email):self | false {
        try {
            $db = Model::connect();

            $sql = "SELECT * FROM customers where email=:email";
            $stmt = $db->prepare($sql);

            $params = [
                ":email" => $email,
            ];

            $stmt->execute($params);
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetch(PDO::FETCH_CLASS);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}