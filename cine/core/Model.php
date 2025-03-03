<?php

namespace core;
use PDO, PDOException;
use const Config\DSN, Config\USER, Config\PASS;

class Model
{
    public static function connect():PDO {
        try {
            $db = new PDO(DSN, USER, PASS);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        return $db;
    }

    static function sessionTimeout(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $inactividad = 300;
        if (isset($_SESSION["timeout"])) {
            $sessionTTL = time() - $_SESSION["timeout"];
            if ($sessionTTL > $inactividad) {
                session_destroy();
                session_unset(); // Opcional: Borra todas las variables de sesión
                header("Location: /");
                exit; // 🔥 IMPORTANTE: Detiene la ejecución del script
            }
        }

        $_SESSION["timeout"] = time();
    }

}