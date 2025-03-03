<?php

namespace App\Models;

use Core\Model;
use PDO, PDOException;

class Purchases
{
    public static function all() {
        $db = Model::connect();
        $sql = "select m.name, p.numTickets, p.date  from purchases p
                    join ExamenDic2024.movies m on p.idMovie = m.idMovie
                    join ExamenDic2024.customers c on c.idCustomer = p.idCustomer
                        where p.idCustomer = :user_id;";

        $stmt = $db->prepare($sql);

        $params = [
            ":user_id" => $_SESSION["user_id"],
        ];

        $stmt->execute($params);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }
}