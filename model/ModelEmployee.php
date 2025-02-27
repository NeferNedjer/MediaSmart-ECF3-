<?php

class ModelEmployee extends Model {

    public function createEmployee(string $name, string $password) { 
        
        $req = $this->getDb()->prepare('INSERT INTO `employee`(`name`, `password`) VALUES (:name, :password)');
        $password = password_hash($password, PASSWORD_BCRYPT);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':password', $password, PDO::PARAM_STR);
        $req->execute();
    }
}