<?php

class Exemplaire extends Media {

    private $id_exemplaire;
    private $id_media;
    private $status;
    private $creation_date;
    private $barcode;


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
    public function getId_exemplaire() {
        return $this->id_exemplaire;
    }

    public function getId_media() {
        return $this->id_media;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCreation_date() {
        return $this->creation_date;
    }

    public function getBarcode() {
        return $this->barcode;
    }

    //SETTERS
    public function setId_exemplaire(int $id_exemplaire) {
        $this->id_exemplaire =$id_exemplaire;
    }

    public function setId_media(int $id_media) {
        $this->id_media = $id_media;
    }

    public function setStatus(int $status) {
        $this->status = $status;
    }

    public function setCreation_date(string $creation_date) {
        $this->creation_date = new DateTime($creation_date); 
    }

    public function setBarcode(string $barcode) {
        $this->barcode = $barcode;
    }
}