<?php
class ControllerMedia {

    public function home() {

        global $router;

        $model = new ModelMedia();

        $datas = $model->mediaHome();

        require_once('./view/homepage.php');
    }

    public function read($id) {

        global $router;

        $model = new ModelMedia();
        $data = $model->getMediaById($id);

        require_once('./view/detailmedia.php');
    }

    public function author($id) {

        global $router;

        $model = new ModelMedia();   
        $datas = $model->getMediaByAuthor($id);

        require_once('./view/mediaselector.php');
    }

    public function category($id) {

        global $router;

        $model = new ModelMedia();   
        $datas = $model->getMediaByCategory($id);

        require_once('./view/mediaselector.php');
    }

    public function subcategory($id) {

        global $router;

        $model = new ModelMedia();   
        $datas = $model->getMediaBySubcategory($id);

        require_once('./view/mediaselector.php');
    }

    public function create() {

        global $router;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if(!empty($_POST['id_subcategory']) && !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['description'])) {
                $model = new ModelMedia();

                $modelAuthor = new ModelAuthor();
                $id_author = $modelAuthor->getIdByAuthor($_POST['author']);

                $id_media = $model->createMedia($_POST['id_subcategory'], $_POST['title'], $id_author, $_POST['description'],  $_FILES['image_recto']['name'], $_FILES['image_verso']['name']);

                if(!empty($_FILES['image_recto']['tmp_name'])) {
                    $source = $_FILES['image_recto']['tmp_name'];
                    $destination = './assets/img/';
                    $image_recto = $this->convertWebp($id_media, $face='recto', $source, $destination, $qualite = 80);
                } else {
                    $image_recto = "";
                }
                
                if(!empty($_FILES['image_verso']['tmp_name'])) {
                    $source = $_FILES['image_verso']['tmp_name'];
                    $destination = './assets/img/';
                    $image_verso = $this->convertWebp($id_media, $face='verso', $source, $destination, $qualite = 80);
                }else {
                    $image_verso = "";
                }

                $model->updateImageMedia($image_recto, $image_verso, $id_media);

                if (isset($_POST['nbex']) && $_POST['nbex'] > 0){
                    $model->createExemplaire($_POST['nbex'], $id_media);
                }

                    //require_once('./view/dashboardMedia.php');
                    header('Location: ' . $router->generate('dashboard-media', ['id_media' => $id_media]));

                    exit();
                
            } else {
                $error = "Tous les champs doivent être remplis (hormis l'image)";
                require_once('./view/newmedia.php');
            }
        } else {   // appel du formulaire avec chargement des données Category, Subcategory et Author
            $model = new ModelMedia();
            $categories = $model->getCategories();
            $subcategories = $model->getSubcategories();
            $authors = $model->getAuthors();
            require_once('./view/newmedia.php');
        }
    }

    public function delete() {
        
        global $router;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $model = new ModelMedia();
            $model->deleteMedia($id);
            header('Location: /');
            exit();
        }
    }

    public function update($id) {
        global $router;
        $model = new ModelMedia();
        $data = $model->getMediaById($id);
        require_once('./view/updatemedia.php');

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])){
            if(!empty($_POST['id_subcategory']) && !empty($_POST['title']) && !empty($_POST['id_author']) && !empty($_POST['description'])) {
                $model = new ModelMedia();
                $model->updateMedia($_POST['id'], $_POST['id_subcategory'], $_POST['title'], $_POST['id_author'], $_POST['description'], $_POST['image_recto'], $_POST['image_verso']);
                header('Location: /');
                exit();
            } else {
                $error = "Tous les champs doivent être remplis (hormis l'image)";
                require_once('./view/updatemedia.php');
            }
        }
    }

    public function notfound() {

        require_once './view/404.php';
    }


    public function searchMedia() {

        global $router;

        $model = new ModelMedia();
        $search = '%' . $_POST['searchMedia'] . '%';
        $searchMedia = $model->getMedia($search);
        Header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($searchMedia);
        
    }

    public function searchMediaYoyo() {

        global $router;

        if (isset($_GET['query'])) {
            $query = $_GET['query'];
            $model = new ModelMedia();
            $results = $model->searchMedia($query);
            header('Content-Type: application/json');
            echo json_encode($results);
            exit();
        }
        
    }

    public function getMedia($id_media) {

        global $router;
        $model = new ModelMedia();
        $media = $model->getMediaById($id_media);

        require_once('./view/getMedia.php');
    }
    
    function convertWebp($id_media, $face, $source, $destination, $qualite = 80) {
        // Vérifier le type MIME du fichier source
        $info = getimagesize($source);
        $mime = $info['mime'];
    
        // Charger l'image source selon son type
        switch ($mime) {
            case 'image/jpg':
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                // Désactiver la transparence si nécessaire
                imagepalettetotruecolor($image);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source);
                break;
            default:
                throw new Exception("Format d'image non pris en charge : $mime");
        }
    
        //Création du nom de l'image de destination :
        $model = new ModelMedia();
        $cat = $model->getMediaById($id_media);
        $newname = $cat->getName().'_'.$id_media.'_'.$face.'.webp';
        $newdestination = $destination . $newname;

        // Convertir en WebP et enregistrer le fichier
        imagewebp($image, $newdestination, $qualite);
    
        // Libérer la mémoire
        imagedestroy($image);
    
        return $newdestination;
    }
    
    public function actionMedia() {
        global $router;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];
            $id_exemplaire = $_POST['id_exemplaire'];
            $id_media = $_POST['id_media'];

            if($action == 'Valider') {
                    $modelEmprunt = new ModelEmprunt();
                    $modelEmprunt->updateEmprunt($_POST['id_exemplaire']);
                    header('Location: ' . $router->generate('dashboard-media', ['id_media' => $_POST['id_media']]));
                    exit();
            } elseif ($action == 'Annuler') {
                    $modelEmprunt = new ModelEmprunt();
                    $modelEmprunt->deleteResa($_POST['id_exemplaire']);
                    header('Location: ' . $router->generate('dashboard-media', ['id_media' => $_POST['id_media']]));
                    exit();
            } elseif ($action == 'Retour') {
                
            } elseif ($action == 'Emprunt') {
                
            }
        }     
    }


}