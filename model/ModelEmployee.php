<?php

class ModelEmployee extends Model {

    public function createEmployee(string $name, string $first_name, string $password) { 
        
        $req = $this->getDb()->prepare('INSERT INTO `employee` (`name`, first_name, `password`) VALUES (:name, :first_name, :password)');
        $password = password_hash($password, PASSWORD_BCRYPT);
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $req->bindParam(':password', $password, PDO::PARAM_STR);
        $req->execute();
    }

    public function getEmployeeByName(string $name) {
        
        //on doit rajouter un first-name à la class Employee et la bdd et le status pour pouvoir definir si user ou employee

        $req = $this->getDb()->prepare('SELECT `id_employee`, `name`, first_name, `password` FROM employee WHERE `name` = :name');
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->execute();

        return new Employee($req->fetch(PDO::FETCH_ASSOC));
    }

    public function employeeHome() {

        $req = $this->getDb()->query('SELECT u.*, 
                        COALESCE((SELECT count(*) FROM emprunt_resa er WHERE u.id_user = er.id_user AND resa=0 GROUP BY er.id_user), 0) as nb_emprunts,
                        COALESCE((SELECT count(*) FROM emprunt_resa er WHERE u.id_user = er.id_user AND resa=1 GROUP BY er.id_user),0) as nb_resa,
                        COALESCE((SELECT count(*) FROM emprunt_resa er WHERE u.id_user = er.id_user AND max_return_date < NOW() AND resa=0 GROUP BY er.id_user),0) as nb_outdated_emprunt
                    FROM user u;');
        
        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[]= new User($data);
        }
        return $arrayobj;
    }
}