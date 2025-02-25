<?php

class User {

    private $id_user;
    private $name;
    private $first_name;
    private $email;
    private $password;
    private $adress;
    private $phone;
    private $status;
    private $email_verified;
    private $token;
    private $signup_date;

    public function __construct(array $datas){
        $this->hydrate($datas);
    }

    public function hydrate(array $datas){
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getId_user() {
        return $this->id_user;
    }

    public function getName(){
        return $this->name;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAdress() {
        return $this->adress;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getEmail_verified() {
        return $this->email_verified;
    }

    public function getToken() {
        return $this->token;
    }

    public function getSignup_date() {
        return $this->signup_date;
    }

    //SETTERS
    public function setId_user(int $id_user) {
        $this->id_user = $id_user;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setFirst_name(string $first_name) {
        $this->first_name = $first_name;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function setAdress(string $adress) {
        $this->adress = $adress;
    }

    public function setPhone(int $phone) {
        $this->phone = $phone;
    }

    public function setStatus(int $status) {
        $this->status = $status;
    }

    public function setEmail_verified(int $email_verified) {
        $this->email_verified = $email_verified;
    }

    public function setToken(string $token) {
        $this->token = $token;
    }

    public function setSignup_date(string $signup_date) {
        $this->signup_date = new DateTime($signup_date);
    }
}