<?php

namespace App\Models;

use Core\Model;
use PDO, PDOException;

class Cinemas
{
    public static function all() {
        try{
            $db = Model::connect();

            $sql = "select * from cinemas";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}