<?php

namespace App\Models;

use Core\Model;
use PDO, PDOException;

class Movies
{
    public static function show($args) {
        try {
            $db = Model::connect();

            $sql = "SELECT idMovie, name, year, nationality, tickets, cover from movies where cinema = $args[0]";
            $stmt = $db->prepare($sql);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function findOne($args) {
        try {
            $db = Model::connect();

            $sql = "SELECT idMovie, name, tickets from movies where idMovie = $args[0]";
            $stmt = $db->prepare($sql);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateTickets($args) {
        try {
            $db = Model::connect();

            $sql = "update movies set tickets=tickets-:ticketsToBuy where idMovie = :idMovie";
            $stmt = $db->prepare($sql);

            $stmt->execute([
                ":ticketsToBuy" => $_POST["ticketsToBuy"],
                ":idMovie" => $args[0]
            ]);

            return $_POST["ticketsToBuy"];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updatePurchase($args) {
        try {
            $db = Model::connect();

            $sql = "update purchases set numTickets=numTickets+:ticketsPurchased where idMovie=:idMovie and idCustomer=:idCustomer";
            $stmt = $db->prepare($sql);

            $stmt->execute([
                ":ticketsPurchased" => $_POST["ticketsToBuy"],
                ":idMovie" => $args[0],
                ":idCustomer" => $_SESSION["user_id"]
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insertPurchase($args) {
        try {
            $db = Model::connect();

            $sql = "insert into purchases (idCustomer, idMovie, date, numTickets) values (:idCustomer, :idMovie, :date, :numTickets)";
            $stmt = $db->prepare($sql);

            $stmt->execute([
                ":idCustomer" => $_SESSION["user_id"],
                ":idMovie" => $args[0],
                ":date" => date("Y-m-d"),
                ":numTickets" => $_POST["ticketsToBuy"],
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}