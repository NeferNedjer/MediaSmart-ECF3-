<?php

class ModelAuthor extends Model{      
    
    public function getSearchAuthors($search){

    $req = $this->getDb()->prepare('SELECT * FROM author WHERE name LIKE :search ORDER BY name LIMIT 10;');

    $req->bindParam('search', $search, PDO::PARAM_STR);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);

    }



}

