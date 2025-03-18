<?php

class ModelHistoric extends Model {

    public function historicHome() {

        $req = $this->getDb()->prepare('SELECT  c.id_category, c.name, s.id_subcategory, s.theme, 
                                                m.id_media, title, m.id_author, description, a.name as author,
                                                e.id_exemplaire, h.emprunt_date, 
                                                h.id_user, u.name as user_name, u.first_name as user_first_name, 
                                                h.exemplaire_status, h.type_histo, h.return_date, h.user_statut, 
                                                h.id_historic
                                        FROM    category c, subcategory s, media m, author a, 
                                                historic h, exemplaire e, user u
                                        WHERE   c.id_category = s.id_category 
                                        AND     s.id_subcategory = m.id_subcategory 
                                        AND     m.id_author = a.id_author
                                        AND     e.id_media = m.id_media
                                        AND     e.id_exemplaire = h.id_exemplaire
                                        AND     h.id_user = u.id_user
                                        ORDER BY id_historic DESC;');
        
        $req->execute();
        
        $arrayobj = [];

        while($histo = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayobj[] = new Historic($histo);
        }

        return $arrayobj;

    }




}