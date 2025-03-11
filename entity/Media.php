<?php

// use SplFileInfo;

class Media extends Subcategory {

    private $id_media;
    private $id_subcategory;
    private $title;
    private $id_author;
    private $description;
    private $image_recto;
    private $image_verso;
    private $author;
    private $nb_exemplaires;
    private $nb_emprunts;
    private $nb_resa;

    public function __construct(array $datas) {
        $this->hydrate($datas);
    }

    public function hydrate(array $datas) {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getId_media() {
        return $this->id_media;
    }

    public function getId_subcategory() {
        return $this->id_subcategory;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getId_author() {
        return $this->id_author;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage_recto() {
        return $this->image_recto;
    }

    public function getImage_verso() {
        return $this->image_verso;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getNb_exemplaires() {
        return $this->nb_exemplaires;
    }
    public function getNb_emprunts() {
        return $this->nb_emprunts;
    }
    public function getNb_resa() {
        return $this->nb_resa;
    }

    //SETTERS
    public function setId_media(int $id_media) {
        $this->id_media = $id_media;
    }

    public function setId_subcategory(int $id_subcategory) {
        $this->id_subcategory = $id_subcategory;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function setId_author(int $id_author) {
        $this->id_author = $id_author;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function setAuthor(string $author) {
        $this->author = $author;
    }

    public function setImage_recto(string $image_recto) {
        $this->image_recto = $image_recto;
    }

    public function setImage_verso(string $image_verso) {
        $this->image_verso = $image_verso;
    }
    
    public function setNb_exemplaires(string $nb_exemplaires) {
        $this->nb_exemplaires = $nb_exemplaires;
    }
    public function setNb_emprunts(string $nb_emprunts) {
        $this->nb_emprunts = $nb_emprunts;
    }
    public function setNb_resa(string $nb_resa) {
        $this->nb_resa = $nb_resa;
    }
}