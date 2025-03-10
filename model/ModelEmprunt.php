<?php

class ModelEmprunt extends Model {

    public function getEmpruntByUser($id_user) {

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 
                                                m.id_media, title, m.id_author, description, image , a.name as author,
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

    public function empruntHome() {

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 
                                                m.id_media, title, m.id_author, description, image , a.name as author,
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

        $req = $this->getDb()->prepare('
        SELECT  c.id_category, c.name, s.id_subcategory, s.theme, m.id_media, 
                title, m.id_author, description, image, e.id_exemplaire, status, creation_date,
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


}