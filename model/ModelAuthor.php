<?php

class ModelAuthor extends Model{      
    
    public function getSearchAuthors($search){

    $req = $this->getDb()->prepare('SELECT * FROM author WHERE name LIKE :search ORDER BY name LIMIT 10;');

    $req->bindParam('search', $search, PDO::PARAM_STR);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);

    }
     
    
    public function getIdByAuthor(string $author){

    $req = $this->getDb()->prepare('SELECT id_author FROM author WHERE name = :author ;');

    $req->bindParam(':author', $author, PDO::PARAM_STR);
    $req->execute();
        if($req->rowCount() == 0) {
            $this->createAuthor($author);
            return $this->getDb()->lastInsertId();
        } else {
            $result = $req->fetch(PDO::FETCH_ASSOC);
            return $result['id_author'];
        }

    }

    public function createAuthor(string $name) { 
        
        $req = $this->getDb()->prepare('INSERT INTO `author` (`name`) VALUES (:name)');
        $req->bindParam(':name', $name, PDO::PARAM_STR);
        $req->execute();
        return $this->getDb()->lastInsertId();
    }

}

