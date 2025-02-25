<?php

class ModelUser extends Model {

    public function getUserById(int $id_user) {

        $user = $this->getDb()->prepare('SELECT `id_user`, `name`, `firstname`, `email`, `password`, `adress`, `phone`, `status`, `email_verified`, `token`, `signup_date` FROM `user` WHERE `id_user` = :id_user');
        $user->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $user->execute();
        return new User($user->fetch(PDO::FETCH_ASSOC));
    }

    public function getUserByEmail(string $email) {

        $user = $this->getDb()->prepare('SELECT `id_user`, `name`, `firstname`, `email`, `password`, `address`, `phone`, `status`, `email_verified`, `token`, `signup_date` FROM user WHERE `email` = :email');
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->execute();
        return new User($user->fetch(PDO::FETCH_ASSOC));
    }

    public function isLoggedIn() {

        if(isset($_SESSION['id_user'])) {
            header('Location: /mediasmart');
        }
    }

    public function createUser(string $name, string $firstname, string $email, string $password, string $address, int $phone) {

        $user  = $this->getDb()->prepare('INSERT INTO `user` (`name`, `firstname`, `email`, `password`, `address`, `phone`) VALUES (:name, :firstname, :email, :password, :address, :phone)');
        $password = password_hash($password, PASSWORD_BCRYPT);
        $user->bindParam(':name', $name, PDO::PARAM_STR);
        $user->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->bindParam(':password', $password, PDO::PARAM_STR);
        $user->bindParam(':address', $address, PDO::PARAM_STR);
        $user->bindParam(':phone', $phone, PDO::PARAM_INT);
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
    

}