<?php

class ModelEmprunt extends Model {

    public function getEmpruntByUser($id_user) {

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 
                                                m.id_media, title, m.id_author, description, image_recto, image_verso , a.name as author,
                                                e.id_exemplaire, emprunt_date, max_return_date, resa, mail_sent,
                                                er.id_user, u.name as user_name, u.first_name as user_first_name, status
                                        FROM    category c, subcategory s, media m, author a, emprunt_resa er, exemplaire e, user u
                                        WHERE   c.id_category = s.id_category 
                                        AND     s.id_subcategory = m.id_subcategory 
                                        AND     m.id_author = a.id_author
                                        AND     e.id_media = m.id_media
                                        AND     e.id_exemplaire = er.id_exemplaire
                                        AND     er.id_user = u.id_user
                                        AND     er.id_user = :id_user
                                        AND     er.resa = 0
                                        ORDER BY emprunt_date;');
        $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();
        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Emprunt($data);
        }

        return $arrayobj;

    }

    public function getEmpruntResaByUser($id_user) {

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 
                                                m.id_media, title, m.id_author, description, image_recto, image_verso , a.name as author,
                                                e.id_exemplaire, emprunt_date, max_return_date, resa, mail_sent,
                                                er.id_user, u.name as user_name, u.first_name as user_first_name, status
                                        FROM    category c, subcategory s, media m, author a, emprunt_resa er, exemplaire e, user u
                                        WHERE   c.id_category = s.id_category 
                                        AND     s.id_subcategory = m.id_subcategory 
                                        AND     m.id_author = a.id_author
                                        AND     e.id_media = m.id_media
                                        AND     e.id_exemplaire = er.id_exemplaire
                                        AND     er.id_user = u.id_user
                                        AND     er.id_user = :id_user
                                        ORDER BY emprunt_date;');
        $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();
        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Emprunt($data);
        }

        return $arrayobj;

    }



    public function empruntHome() {

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 

                                                m.id_media, title, m.id_author, description, image_recto, image_verso , a.name as author,

                                                e.id_exemplaire, emprunt_date, max_return_date, resa, mail_sent,
                                                er.id_user, u.name as user_name, u.first_name as user_first_name, status
                                        FROM    category c, subcategory s, media m, author a, emprunt_resa er, exemplaire e, user u
                                        WHERE   c.id_category = s.id_category 
                                        AND     s.id_subcategory = m.id_subcategory 
                                        AND     m.id_author = a.id_author
                                        AND     e.id_media = m.id_media
                                        AND     e.id_exemplaire = er.id_exemplaire
                                        AND     er.id_user = u.id_user
                                        AND     er.resa = 0
                                        ORDER BY max_return_date ;');
        
        $req->execute();
        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Emprunt($data);
        }

        return $arrayobj;

    }

    public function getExemplaireById(int $id_media) {

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, m.id_media, 
                                                title, m.id_author, description, image_recto, image_verso, 
                                                e.id_exemplaire, status, creation_date,
                COALESCE(er.id_user, 0) AS id_user, 
                COALESCE(u.name, "") AS user_name, 
                COALESCE(u.first_name, "") AS user_first_name, 
                COALESCE(er.resa, 9) AS resa,
                COALESCE((SELECT count(*) 
                            FROM exemplaire e 
                            WHERE e.id_media=m.id_media), 0) AS nb_exemplaires,
                COALESCE((SELECT count(*) 
                            FROM emprunt_resa er, exemplaire e 
                            WHERE er.id_exemplaire = e.id_exemplaire 
                            AND e.id_media=m.id_media 
                            AND resa=0), 0) AS nb_emprunts,
                COALESCE((SELECT count(*) 
                            FROM emprunt_resa er, exemplaire e 
                            WHERE er.id_exemplaire = e.id_exemplaire 
                            AND e.id_media=m.id_media 
                            AND resa=1), 0) AS nb_resa
                                                
        FROM        category c, subcategory s, media m, exemplaire e

        LEFT JOIN   emprunt_resa er
        ON          e.id_exemplaire = er.id_exemplaire

        LEFT JOIN   user u
        ON          u.id_user = er.id_user

        WHERE       c.id_category = s.id_category 
        AND         s.id_subcategory = m.id_subcategory 
        AND         e.id_media = m.id_media
        AND         m.id_media = :id_media
        ORDER BY    e.id_exemplaire;');

        $req->bindParam(':id_media', $id_media, PDO::PARAM_INT);
        $req->execute();
        $arrayobj = [];

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Emprunt($data);
        }

        return $arrayobj;

    }

    public function updateEmprunt(int $id_exemplaire) {

        // 1_ Suite à une "RESA" : Mise à jour au statut "EMPRUNT" :
        $req = $this->getDb()->prepare('UPDATE emprunt_resa SET resa = 0, emprunt_date = NOW(), max_return_date = DATE_ADD(NOW(), INTERVAL 21 DAY) WHERE id_exemplaire = :id_exemplaire');
        $req->bindParam(':id_exemplaire', $id_exemplaire, PDO::PARAM_INT);
        $req->execute();

        // 2_ Je récupère les données de l'enregistrement mis à jour, ainsi que celles de l'utilisateur et de l'exemplaire emprunté, pour créer un enregistrement dans le fichier d'historisation:
        $req = $this->getDb()->prepare('INSERT INTO historic (id_user, id_exemplaire, type_histo, emprunt_date, return_date, user_statut, exemplaire_status) 
                    SELECT er.id_user, er.id_exemplaire, 1, er.emprunt_date, er.max_return_date, u.statut, e.status 
                    FROM emprunt_resa er, user u, exemplaire e
                    WHERE er.id_exemplaire = :id_exemplaire
                    AND er.id_user=u.id_user
                    AND er.id_exemplaire=e.id_exemplaire;');
        $req->bindParam(':id_exemplaire', $id_exemplaire, PDO::PARAM_INT);
        $req->execute();

    }

    public function deleteResa(int $id_exemplaire, int $status) {

        // 1_ Récupérer les données avant de les supprimer
        $req = $this->getDb()->prepare('SELECT er.*, u.statut AS user_statut, e.status AS exemplaire_status
                                        FROM emprunt_resa er, user u, exemplaire e
                    WHERE er.id_exemplaire = :id_exemplaire
                    AND er.id_user=u.id_user
                    AND er.id_exemplaire=e.id_exemplaire;');
        $req->bindParam(':id_exemplaire', $id_exemplaire, PDO::PARAM_INT);
        $req->execute();
        $deletedData = $req->fetch(PDO::FETCH_ASSOC);

        // 2_ Supprimer la RESA (resa == 1) ou l'EMPRUNT (resa == 0)
        $req = $this->getDb()->prepare('DELETE FROM emprunt_resa WHERE id_exemplaire = :id_exemplaire');
        $req->bindParam(':id_exemplaire', $id_exemplaire, PDO::PARAM_INT);
        $req->execute();    

        // 3_ Si on est dans le cadre de la suppression d'un EMPRUNT (c'est le cas d'un RETOUR de Média), alors Je récupère les données de l'enregistrement supprimé, ainsi que celles de l'utilisateur et de l'exemplaire emprunté, pour créer un enregistrement dans le fichier d'historisation:
        if($deletedData['resa'] == 0) {
            $req = $this->getDb()->prepare('INSERT INTO historic(id_user, id_exemplaire, type_histo, emprunt_date, return_date, user_statut, exemplaire_status) 
            VALUES (:id_user, :id_exemplaire, 2, :emprunt_date, NOW(), :user_statut, :exemplaire_status)');
            $req->bindParam(':id_user', $deletedData['id_user'], PDO::PARAM_INT);
            $req->bindParam(':id_exemplaire', $deletedData['id_exemplaire'], PDO::PARAM_INT);
            $req->bindParam(':emprunt_date', $deletedData['emprunt_date'], PDO::PARAM_STR);
            $req->bindParam(':user_statut', $deletedData['user_statut'], PDO::PARAM_STR);
            $req->bindParam(':exemplaire_status', $status, PDO::PARAM_STR);
            $req->execute();
            if ($deletedData['exemplaire_status'] != $status) {
                $req = $this->getDb()->prepare('UPDATE exemplaire SET status = :status WHERE id_exemplaire = :id_exemplaire');
                $req->bindParam(':id_exemplaire', $id_exemplaire, PDO::PARAM_INT);
                $req->bindParam(':status', $status, PDO::PARAM_INT);
                $req->execute();
            }
        }

    }

    public function createEmprunt(int $id_exemplaire , int $id_user) {
        
        // 1_ Créer un nouvel enregistrement EMPRUNT dans la table emprunt_resa (EMPRUNT en direct, sans RESA préalable) :
        $req = $this->getDb()->prepare('INSERT INTO emprunt_resa (id_exemplaire, id_user, resa, emprunt_date, max_return_date) VALUES (:id_exemplaire, :id_user, 0, NOW(), DATE_ADD(NOW(), INTERVAL 21 DAY))');
        $req->bindParam(':id_exemplaire', $id_exemplaire, PDO::PARAM_INT);
        $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();

        // 2_ Je récupère les données de l'enregistrement EMPRUNT nouvellement créé, ainsi que celles de l'utilisateur et de l'exemplaire emprunté, pour créer un enregistrement dans le fichier d'historisation:
        $req = $this->getDb()->prepare('INSERT INTO historic (id_user, id_exemplaire, type_histo, emprunt_date, return_date, user_statut, exemplaire_status) 
                    SELECT er.id_user, er.id_exemplaire, 1, er.emprunt_date, er.max_return_date, u.statut, e.status 
                    FROM emprunt_resa er, user u, exemplaire e
                    WHERE er.id_exemplaire = :id_exemplaire
                    AND er.id_user=u.id_user
                    AND er.id_exemplaire=e.id_exemplaire;');
        $req->bindParam(':id_exemplaire', $id_exemplaire, PDO::PARAM_INT);
        $req->execute();
        
    }

    public function nbResaByUser(int $id_user) {
        
        $req = $this->getDb()->prepare('SELECT COUNT(*) AS nb_resa FROM emprunt_resa WHERE id_user = :id_user AND resa = 1');
        $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();
        $nb_resa = $req->fetch(PDO::FETCH_ASSOC);

        return $nb_resa['nb_resa'];
        
    }

    public function exemplaireDispo(int $id_media) {

        $req = $this->getDb()->prepare('SELECT id_exemplaire 
                                        FROM exemplaire 
                                        WHERE id_media=:id_media 
                                        AND id_exemplaire NOT IN(SELECT id_exemplaire FROM emprunt_resa) 
                                        ORDER BY `status`');
        $req->bindParam(':id_media', $id_media, PDO::PARAM_INT);
        $req->execute();
        $id_exemplaire = $req->fetch(PDO::FETCH_ASSOC);

        return $id_exemplaire['id_exemplaire'];
    }

    public function createResa(int $id_user, int $id_exemplaire) {

        // 1_ Créer un nouvel enregistrement RESA dans la table emprunt_resa :
        
        $req = $this->getDb()->prepare('INSERT INTO emprunt_resa (id_exemplaire, id_user, resa, emprunt_date, max_return_date) VALUES (:id_exemplaire, :id_user, 1, NOW(), DATE_ADD(NOW(), INTERVAL 21 DAY))');
        $req->bindParam(':id_exemplaire', $id_exemplaire, PDO::PARAM_INT);
        $req->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $req->execute();
    }

    

}