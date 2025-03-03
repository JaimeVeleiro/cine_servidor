<?php

namespace core;

class FrontController
{
    function __construct()
    {
        if (!isset($_GET["url"])) {
            $url = "customer";
        } else {
            $url = $_GET["url"];
            $args = explode("/", trim($url));
            array_shift($args);
            $url = $args[0];
            array_shift($args);
        }

        $controller = ucwords($url) . "Controller";

        if (!file_exists("../app/controllers/" . $controller . ".php")) {
            header("HTTP/1.0 404 Not Found");
            echo "Controller Not Found";
            die();
        }

        if (isset($args[0])) {
            $method = $args[0];
            array_shift($args);
        } else {
            $method = "login";
        }

        $controller = "App\\Controllers\\$controller";

        if (!method_exists($controller, $method)) {
            header("HTTP/1.0 404 Not Found");
            echo "Method Not Found";
            die();
        }

        $myController = new $controller;
        if (isset($args[0])) {
            $myController->$method($args);
            exit;
        }

        $myController->$method();
    }
}