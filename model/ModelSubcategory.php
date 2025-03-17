<?php 


class ModelSubcategory extends Model {

    public function updateSubcategory(string $nameSubCategory) {

        global $router;
        $req = $this->getDb()->prepare('INSERT INTO subcategory (`name`) VALUES (:name) ');
        $req->bindParam(':name', $nameSubCategory, PDO::PARAM_STR);
        $req->execute();
    }
}