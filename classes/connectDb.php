<?php

class connectDb{
    static private $instance = null;
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB = "forum.local";

    private function __construct() {

    }

    private function __clone() {

    }

    static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new PDO('mysql:host='.self::HOST.';dbname='.self::DB, self::USER, self::PASSWORD) or die(self::$instance);
            self::$instance->exec("set names utf8");
        }
        return self::$instance;
    }

}
?>