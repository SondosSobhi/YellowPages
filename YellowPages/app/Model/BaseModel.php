<?php

class BaseModel
{
    protected $conn;

    protected function connection(){
        try{
            $this->conn = new PDO ('mysql:host=localhost; dbname=yellowpages', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }catch (PDOException $ex){
            exit("Database connection error" . $ex->getMessage());
        }
        return $this->conn;
    }

    protected function prepareQuery($query){
        return $this->connection()->prepare($query);
    }

    protected function executeQuery($var){
        return $var->execute();
    }
}