<?php

// use SplFileInfo;

class Media extends Subcategory {

    private $id_media;
    private $id_subcategory;
    private $title;
    private $id_author;
    private $description;
    private $image;
    private $author;

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

    public function getImage() {
        return $this->image;
    }

    public function getAuthor() {
        return $this->author;
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

//     public function setImage(SplFileInfo $image) {
//         $this->image = $image;
//     }
}