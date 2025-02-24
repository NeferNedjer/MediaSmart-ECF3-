<?php

class Category {

    private $id_category;
    private $name;

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
    public function getId_category() {
        return $this->id_category;
    }

    public function getName() {
        return $this->name;
    }

    //SETTERS
    public function setId_category(int $id_category) {
        $this->id_category = $id_category;
    }

    public function setName(string $name) {
        $this->name = $name;
    }
}