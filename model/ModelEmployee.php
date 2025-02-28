<?php

class ModelEmployee extends Model {

    public function createEmployee(string $name, string $password) { 
        
        $req = $this->getDb()->prepare('INSERT INTO `employee`(`name`, `password`) VALUES (:name, :password)');
        $password = password_hash($password, PASSWORD_BCRYPT);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':password', $password, PDO::PARAM_STR);
        $req->execute();
    }

    public function getEmployeeByName(string $name) {
        
        //on doit rajouter un first-name à la class Employee et la bdd et le status pour pouvoir definir si user ou employee

        $req = $this->getDb()->prepare('SELECT `id_employee`, `name`, `password` FROM employee WHERE `name` = :name');
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->execute();

        return new Employee($req->fetch(PDO::FETCH_ASSOC));
    }
}