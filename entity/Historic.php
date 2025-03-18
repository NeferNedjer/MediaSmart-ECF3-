<?php

class Historic extends Exemplaire {

    private $id_historic;
    private $emprunt_date;
    private $return_date;
    private $type_histo;
    private $exemplaire_status;
    private $user_statut;
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
    public function getId_historic() {
        return $this->id_historic;
    }

    public function getEmprunt_date() {
        return $this->emprunt_date;
    }

    public function getReturn_date() {
        return $this->return_date;
    }

    public function getType_histo () {
        return $this->type_histo;
    }

    public function getExemplaire_status() {
        return $this->exemplaire_status;
    }

    public function getUser_statut() {
        return $this->user_statut;
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
    public function setId_historic(int $id_historic) {
        $this->id_historic = $id_historic;
    }
    
    public function setEmprunt_date (string $emprunt_date) {
        $this->emprunt_date = new DateTime($emprunt_date);
    }

    public function setReturn_date(string $return_date) {
        $this->return_date = new DateTime($return_date);
    }

    public function setType_histo (int $type_histo) {
        $this->type_histo = $type_histo;
    }

    public function setExemplaire_status(int $exemplaire_status) {
        $this->exemplaire_status = $exemplaire_status;
    }

    public function setUser_statut(int $user_statut) {
        $this->user_statut = $user_statut;
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