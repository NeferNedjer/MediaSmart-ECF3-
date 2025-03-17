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

    public function updateExemplaire(int $id_exemplaire, int $status) {

        $req = $this->getDb()->prepare('UPDATE exemplaire SET status = :status WHERE id_exemplaire = :id_exemplaire');
        $req->bindParam(':id_exemplaire', $id_exemplaire, PDO::PARAM_INT);
        $req->bindParam(':status', $status, PDO::PARAM_INT);
        $req->execute();

    }

    
    
}