<?php

class Subcategory extends Category {

    private $id_subcategory;
    private $id_category;
    private $theme;

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
    public function getId_subcategory() {
        return $this->id_subcategory;
    }

    public function getId_category() {
        return $this->id_category;
    }

    public function getTheme() {
        return $this->theme;
    }

    //SETTERS
    public function setId_subcategory(int $id_subcategory) {
        $this->id_subcategory = $id_subcategory;
    }

    public function setId_category(int $id_category) {
        $this->id_category = $id_category;
    }

    public function setTheme(string $theme) {
        $this->theme = $theme;
    }
}