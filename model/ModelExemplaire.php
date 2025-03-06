<?php

class ModelExemplaire extends Model {
    
    public function exemplaireHome() {

        $req = $this->getDb()->prepare('SELECT * FROM `exemplaire` ORDER BY `creation_date`');

        $req->execute();
        $arrayobj = [];

        while($exemplaires = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Exemplaire($exemplaires);
        }

        return $arrayobj;

    }

    public function getExemplaireById(int $id) {

        $req = $this->getDb()->prepare('');
    }
    
}