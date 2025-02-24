<?php

abstract class Model{

    private static $db;


    //GETTERS
    protected function getDb(){
        if (self::$db == null) {
            self::setDb();
        }
        return self::$db;
    }

    //SETTERS
    private static function setDb(){
        try {
            self::$db = new PDO('mysql:host=localhost;dbname=mediasmart;charset=utf8mb4', 'root', '');
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}