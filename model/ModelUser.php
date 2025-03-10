<?php

class ModelUser extends Model {

    public function getUserById(int $id_user) {

        $user = $this->getDb()->prepare('SELECT `id_user`, `name`, `first_name`, `email`, `password`, `adress`, `phone`, `statut`, `email_verified`, `token`, `inscription_date` FROM `user` WHERE `id_user` = :id_user');
        $user->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $user->execute();
        return new User($user->fetch(PDO::FETCH_ASSOC));
    }

    public function getUserByEmail(string $email) {

        $user = $this->getDb()->prepare('SELECT `id_user`, `name`, `first_name`, `email`, `password`, `adress`, `phone`, `statut`, `email_verified`, `token`, `inscription_date` FROM user WHERE `email` = :email');
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->execute();
        
        //return new User($user->fetch(PDO::FETCH_ASSOC));

        if($user->rowCount() == 0) {
            return null;
        } else {
            return new User($user->fetch(PDO::FETCH_ASSOC));
        }
        
    }

    public function isLoggedIn() {

        if(isset($_SESSION['id_user'])) {
            header('Location: /mediasmart');
            exit();
        }
    }

    public function createUser(string $name, string $first_name, string $email, string $password, string $adress, int $phone, string $token) {

        $user  = $this->getDb()->prepare('INSERT INTO `user` (`name`, `first_name`, `email`, `password`, `adress`, `phone`, token, inscription_date, last_connexion) VALUES (:name, :first_name, :email, :password, :adress, :phone, :token, NOW(), NOW())');
        $password = password_hash($password, PASSWORD_BCRYPT);
        $user->bindParam(':name', $name, PDO::PARAM_STR);
        $user->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->bindParam(':password', $password, PDO::PARAM_STR);
        $user->bindParam(':adress', $adress, PDO::PARAM_STR);
        $user->bindParam(':phone', $phone, PDO::PARAM_INT);
        $user->bindParam(':token', $token, PDO::PARAM_STR);
        $user->execute();
    }

    public function checkUserMail(string $email) {

        $user = $this->getDb()->prepare('SELECT `email` FROM user WHERE `email` = :email');
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->execute();
        $data = $user->fetch(PDO::FETCH_ASSOC);
        $isChecked = false;

        if($data){
            $isChecked = false;
        }else {
            $isChecked = true;
        }
        return $isChecked;
    }
    
    public function getUserByToken(string $token) {

        $user = $this->getDb()->prepare('SELECT id_user, email, inscription_date, NOW() as now_date FROM `user` WHERE token = :token');
        $user->bindParam(':token', $token, PDO::PARAM_STR);
        $user->execute();

        if($user->rowCount() == 0) {
            return null;
        } else {
            $userData = $user->fetch(PDO::FETCH_ASSOC);
            return ['user' => new User($userData), 'now_date' => $userData['now_date']];
        }
    }

    public function updateEmail(string $email) {

        $updateReq = $this->getDb()->prepare("UPDATE user SET email_verified = 1 WHERE email = :email");
        $updateReq->bindParam(':email', $email, PDO::PARAM_STR);
        $updateReq->execute();
    }

    public function updatetoken(int $id_user, string $token) {

        $updateReq = $this->getDb()->prepare("UPDATE user SET token=:token, inscription_date=NOW() WHERE id_user = :id_user");
        $updateReq->bindParam(':token', $token, PDO::PARAM_STR);
        $updateReq->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $updateReq->execute();
    }

    public function updateUser(string $name, string $first_name, string $email, string $adress, string $phone, int $statut, int $id_user) {

        $req = $this->getDb()->prepare('UPDATE `user` SET `name`= :name,`first_name`= :first_name,`email`= :email,`adress`= :adress,`phone`= :phone,`statut`= :statut WHERE id_user = :id_user');
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        $req->bindParam(':adress', $adress, PDO::PARAM_STR);
        $req->bindParam(':phone' ,$phone, PDO::PARAM_STR);
        $req->bindParam(':statut', $statut, PDO::PARAM_INT);
        $req->bindParam(':id_user', $id_user,PDO::PARAM_INT);
        $req->execute();

    }

    public function deleteUser(int $id_user) {
        $req = $this->getDb()->prepare('DELETE FROM user WHERE id_user = :id_user');
        $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();
    }

    public function updateconnexion(int $id_user) {
        $req = $this->getDb()->prepare('UPDATE `user` SET `last_connexion`= NOW() WHERE id_user = :id_user;');
        $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();
    }

    public function getUtilisateur($search) {

        $req = $this->getDb()->prepare('SELECT name FROM `user` WHERE `name` LIKE :search');
        $req->bindParam('search', $search, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    

}