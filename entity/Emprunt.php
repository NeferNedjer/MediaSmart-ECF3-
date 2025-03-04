<?php

class Emprunt extends Exemplaire {

    private $emprunt_date;
    private $max_return_date;
    private $resa;
    private $mail_sent;
    private $id_user;
    private $user_name;
    private $user_first_name;

    public function __construct(array $datas) {
        $this->hydrate($datas);
    }

    public function hydrate(array $datas) {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getEmprunt_date() {
        return $this->emprunt_date;
    }

    public function getMax_return_date() {
        return $this->max_return_date;
    }

    public function getResa () {
        return $this->resa;
    }

    public function getMail_sent() {
        return $this->mail_sent;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getUser_name() {
        return $this->user_name;
    }

    public function getUser_first_name() {
        return $this->user_first_name;
    }

    //SETTERS
    public function setEmprunt_date (string $emprunt_date) {
        $this->emprunt_date = new DateTime($emprunt_date);
    }

    public function setMax_return_date(string $max_return_date) {
        $this->max_return_date = new DateTime($max_return_date);
    }

    public function setResa (int $resa) {
        $this->resa = $resa;
    }

    public function setMail_sent(int $mail_sent) {
        $this->mail_sent = $mail_sent;
    }

    public function setId_user(int $id_user) {
        $this->id_user = $id_user;
    }

    public function setUser_name(string $user_name) {
        $this->user_name = $user_name;
    }

    public function setUser_first_name(string $user_first_name) {
        $this->user_first_name =$user_first_name;
    }

}




 
                                               