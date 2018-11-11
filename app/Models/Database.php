<?php
    namespace App\Models;
    use PDO;

    class Database{
        public static function connection(){
            $db = new PDO("mysql:host=localhost;dbname=almacen","yoel","cascadesheet",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                ]
            );
            return $db;
        }
    }