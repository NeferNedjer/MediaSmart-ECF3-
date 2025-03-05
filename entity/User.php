<?php

class User {

    private $id_user;
    private $name;
    private $first_name;
    private $email;
    private $password;
    private $adress;
    private $phone;
    private $statut;
    private $email_verified;
    private $token;
    private $inscription_date;
    private $last_connexion;
    private $nb_emprunts;
    private $nb_resa;
    private $nb_outdated_emprunt;

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

    public function getStatut() {
        return $this->statut;
    }

    public function getEmail_verified() {
        return $this->email_verified;
    }

    public function getToken() {
        return $this->token;
    }

    public function getInscription_date() {
        return $this->inscription_date;
    }

    public function getLast_connexion() {
        return $this->last_connexion;
    }

    public function getNb_emprunt() {
        return $this->nb_emprunts;
    }

    public function getNb_resa() {
        return $this->nb_resa;
    }

    public function getNb_outdated_emprunt() {
        return $this->nb_outdated_emprunt;
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

    public function setPhone(string $phone) {
        $this->phone = $phone;
    }

    public function setStatut(int $statut) {
        $this->statut = $statut;
    }

    public function setEmail_verified(int $email_verified) {
        $this->email_verified = $email_verified;
    }

    public function setToken(string $token) {
        $this->token = $token;
    }

    public function setInscription_date(string $inscription_date) {
        $this->inscription_date = new DateTime($inscription_date);
    }

    public function setLast_connexion(string $last_connexion) {
        $this->last_connexion = new DateTime($last_connexion);
    }

    public function setNb_emprunts(int $nb_emprunts) {
        $this->nb_emprunts = $nb_emprunts;
    }

    public function setNb_resa(int $nb_resa) {
        $this->nb_resa = $nb_resa;
    }

    public function setNb_outdated_emprunt(int $nb_outdated_emprunt) {
        $this->nb_outdated_emprunt = $nb_outdated_emprunt;
    }

}