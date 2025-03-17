<?php

class ModelCategory extends Model {


public function updateCategory(string $nameCategory) {

    $req = $this->getDb()->prepare('INSERT INTO category (`name`) VALUES (:name) ');
    $req->bindParam(':name', $nameCategory, PDO::PARAM_STR);
    $req->execute();

}

}