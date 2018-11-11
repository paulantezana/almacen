<?php
    namespace App\Models;
    use App\Models\Database;

    class Consult{
        public function query($query, $params = []){
            $pdo       = Database::connection();
            $queryDB   = $pdo -> prepare($query);
            $queryDB -> execute($params);
            return $queryDB;
        }
    }