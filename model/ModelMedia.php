<?php

class ModelMedia extends Model{  
    
    public function mediaHome(){

        $req = $this->getDb()->query('SELECT    c.id_category, c.name, s.id_subcategory, s.theme, 
                                                id_media, title, m.id_author, description, image , a.name as author
                                        FROM    category c, subcategory s, media m, author a 
                                        WHERE   c.id_category = s.id_category 
                                        AND     s.id_subcategory = m.id_subcategory
                                        AND     m.id_author = a.id_author
                                        ORDER BY id_media DESC LIMIT 10;');


        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Media($data);
        }

        return $arrayobj;
    }

    public function getMediaById(int $id){

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 
                                                id_media, title, m.id_author, description, image , a.name as author
                                        FROM    category c, subcategory s, media m, author a
                                        WHERE   c.id_category = s.id_category 
                                        AND     s.id_subcategory = m.id_subcategory 
                                        AND     m.id_author = a.id_author
                                        AND     id_media = :id;');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        
        return new Media($data);

    }

    public function getMediaByAuthor(int $id){

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 
                                                id_media, title, m.id_author, description, image , a.name as author
                                        FROM    category c, subcategory s, media m, author a
                                        WHERE   c.id_category = s.id_category 
                                        AND     s.id_subcategory = m.id_subcategory 
                                        AND     m.id_author = a.id_author
                                        AND     id_author = :id;');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();

        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Media($data);
        }

        return $arrayobj;
    }
    
    public function getMediaByCategory(int $id){

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 
                                                id_media, title, m.id_author, description, image , a.name as author
                                        FROM    category c, subcategory s, media m, author a
                                        WHERE   c.id_category = s.id_category 
                                        AND     s.id_subcategory = m.id_subcategory 
                                        AND     m.id_author = a.id_author
                                        AND     c.id_category = :id;');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();

        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Media($data);
        }

        return $arrayobj;
    }

    public function getMediaBySubcategory(int $id){

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 
                                                id_media, title, m.id_author, description, image , a.name as author
                                        FROM    category c, subcategory s, media m, author a 
                                        WHERE   c.id_category = s.id_category 
                                        AND     s.id_subcategory = m.id_subcategory 
                                        AND     m.id_author = a.id_author
                                        AND     s.id_subcategory = :id;');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();

        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Media($data);
        }

        return $arrayobj;
    }

    public function createMedia(int $id_subcategory, string $title, int $id_author, string $description, string $image){
        $req = $this->getDb()->prepare('INSERT INTO media (id_subcategory, title, id_author, description, image) 
                                                VALUES (:id_subcategory, :title, :id_author, :description, :image);');

        $req->bindParam(':id_subcategory', $id_subcategory, PDO::PARAM_INT);
        $req->bindParam(':title', $title, PDO::PARAM_STR);
        $req->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $req->bindParam(':description', $description, PDO::PARAM_STR);
        $req->bindParam(':image', $image, PDO::PARAM_STR);
               
        $req->execute();
    }

    public function deleteMedia($id) {
        $req = $this->getDb()->prepare('DELETE FROM media WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function updateMedia(int $id_media, int $id_subcategory, string $title, int $id_author, string $description, string $image){
        $req = $this->getDb()->prepare('UPDATE media SET id_subcategory=:id_subcategory, title=:title, id_author=:id_author,
                                                        description=:description, image=:image 
                                        WHERE id_media=:id_media ;');

        $req->bindParam(':id_media', $id_media, PDO::PARAM_INT);
        $req->bindParam(':id_subcategory', $id_subcategory, PDO::PARAM_INT);
        $req->bindParam(':title', $title, PDO::PARAM_STR);
        $req->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $req->bindParam(':description', $description, PDO::PARAM_STR);
        $req->bindParam(':id_media', $id_media, PDO::PARAM_INT);

        $req->execute();
    }

    public function getCategories(){

        $req = $this->getDb()->query('SELECT * FROM category;');

        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Category($data);
        }

        return $arrayobj;
    }

    public function getSubcategories(){

        $req = $this->getDb()->query('SELECT * FROM subcategory;');

        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Subcategory($data);
        }

        return $arrayobj;
    }

    public function getAuthors(){

        $req = $this->getDb()->query('SELECT * FROM author;');

        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Author($data);
        }

        return $arrayobj;
    }





}






 