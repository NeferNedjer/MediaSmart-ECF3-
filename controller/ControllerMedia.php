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

                $id_media = $model->createMedia($_POST['id_subcategory'], $_POST['title'], $id_author, $_POST['description']);

                if(!empty($_FILES['image_recto']['tmp_name'])) {
                    $source = $_FILES['image_recto']['tmp_name'];
                    $destination = 'assets/img/';
                    $image_recto = $this->convertWebp($id_media, $face='recto', $source, $destination, $qualite = 80);
                } else {
                    $image_recto = "assets/img/default.webp";
                }
                
                if(!empty($_FILES['image_verso']['tmp_name'])) {
                    $source = $_FILES['image_verso']['tmp_name'];
                    $destination = 'assets/img/';
                    $image_verso = $this->convertWebp($id_media, $face='verso', $source, $destination, $qualite = 80);
                }else {
                    $image_verso = "assets/img/default.webp";
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

    public function updateMedia() {
        global $router;

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_media'])){
            $id_media = $_POST['id_media'];
            $model = new ModelMedia();   
            $data = $model->getMediaById($id_media);
            if(!empty($_POST['id_subcategory']) && !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['description'])) {
                
                $model->updateMedia($_POST['id_media'], $_POST['id_subcategory'], $_POST['title'], $_POST['id_author'], $_POST['description'], $_POST['image_recto'], $_POST['image_verso']);
                header('Location: /dashboardMedia/0');
                exit();
            } else {
                $error = "Tous les champs doivent être remplis (hormis l'image)";
                require_once('./view/modifMedia.php');
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
        $medias = $model->mediaHome();
        //$searchmedia = $model->getMedia($search);

        require_once('./view/detailMedia.php');
    }

    
    function convertWebp($id_media, $face, $source, $destination, $qualite = 80) {
        try {
            // Vérifier le type MIME du fichier source
            $info = getimagesize($source);
            if ($info === false) {
                // Si getimagesize échoue, retourner une image par défaut
                return 'assets/img/default.webp';
            }
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
            case 'image/avif':
                $image = imagecreatefromavif($source);
                break;
                case 'image/webp':
                    $image = imagecreatefromwebp($source);
                    break;
            default:
                // Retourner une image par défaut si le format n'est pas supporté
                return 'assets/img/default.webp';
        }
    
        if ($image === false) {
            // Si la création de l'image a échoué
            return 'assets/img/default.webp';
        }

        //Création du nom de l'image de destination :
        $model = new ModelMedia();
        $cat = $model->getMediaById($id_media);
        $newname = $cat->getName().'_'.$id_media.'_'.$face.'.webp';
        $newdestination = $destination . $newname;

        // Convertir en WebP et enregistrer le fichier
        if (!imagewebp($image, $newdestination, $qualite)) {
            imagedestroy($image);
            return 'assets/img/default.webp';
        }
    
        // Libérer la mémoire
        imagedestroy($image);
    
        return $newdestination;
        
        } catch (Exception $e) {
            // Log l'erreur pour le débogage
            error_log("Erreur de conversion d'image: " . $e->getMessage());
            // Retourner une image par défaut en cas d'erreur
            return 'assets/img/default.webp';
        }
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
                    $modelEmprunt->deleteResa($_POST['id_exemplaire'], $_POST['status']);
                    header('Location: ' . $router->generate('dashboard-media', ['id_media' => $_POST['id_media']]));
                    exit();
            } elseif ($action == 'Retour') {
                    $modelEmprunt = new ModelEmprunt();
                    $modelEmprunt->deleteResa($_POST['id_exemplaire'], $_POST['status']);
                    header('Location: ' . $router->generate('dashboard-media', ['id_media' => $_POST['id_media']]));
                    exit();
            } elseif ($action == 'Emprunt') {
                if(isset($_POST['user_id']) && !empty($_POST['user']) && !empty($_POST['user_id'])) {

                    $modelEmprunt = new ModelEmprunt();
                    $modelEmprunt->createEmprunt($_POST['id_exemplaire'], $_POST['user_id']);
                    header('Location: ' . $router->generate('dashboard-media', ['id_media' => $_POST['id_media']]));
                    exit();
                } else {
                    $error = "Vous devez sélectionner un utilisateur";
                    header('Location: ' . $router->generate('dashboard-media', ['id_media' => $_POST['id_media']]));
                    exit();
                }
            } elseif ($action == 'Modifier') {
                $modelExemplaire = new ModelExemplaire();
                $modelExemplaire->updateExemplaire($_POST['id_exemplaire'], $_POST['status']);
                header('Location: ' . $router->generate('dashboard-media', ['id_media' => $_POST['id_media']]));
                exit();    
            }
        }     
    }


    public function searchMediaHomepage() {

        global $router;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchMediaHomepage'])) {
            $searchMediaHomepage = $_POST['searchMediaHomepage'];
            $model = new ModelMedia();
            $mediaHome = $model->getsearchMediaHomepage($searchMediaHomepage);
            $datas = $model->mediaHome();
            if (!empty($mediaHome)) {
                require_once('./view/homepage.php');
            } else {
                echo "Aucun titre ne correspond à votre recherche.";
                header('Location: /');
                exit();
            }
        } else {
            echo "Aucun titre ne correspond à votre recherche.";
            header('Location: /');
            exit();
        }
    }

    public function modifMedia($id_media) {

        global $router;

        $model = new ModelMedia();

        $data = $model->getMediaById($id_media);
        
        require_once './view/modifMedia.php';

        exit();
         
    }

    public function createCategory() {

        global $router;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nameCategory = $_POST['nameCategory'];
            $modelCategory = new ModelCategory();
            $modelCategory->updateCategory($nameCategory);
            header('Location: /dashboardMedia/0');
            exit();
            
        }
    }

    public function createSubcategory() {

        global $router;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $nameSubCategory = $_POST['nameSubCategory'];
            $modelSubCategory = new ModelSubCategory();
            $modelSubCategory->updateSubCategory($nameSubCategory);
            header('Location: /dashboardMedia/0');
            exit();
        }
    }


    public function filterMediaByCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            
            if (isset($data['subcategory_id'])) {
                $model = new ModelMedia();
                $medias = $model->getMediaBySubcategory2($data['subcategory_id']);
                
                $formattedMedias = array_map(function($media) {
                    return [
                        'id_media' => $media->getId_media(),
                        'title' => $media->getTitle(),
                        'author' => $media->getAuthor(),
                        'image_recto' => $media->getImage_recto()
                    ];
                }, $medias);
                
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'medias' => $formattedMedias
                ]);
                exit;
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => 'Invalid request'
        ]);
        exit;
    }

    public function retourMedia() {
        global $router;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_exemplaire = $_POST['id_exemplaire'];
            $id_user = $_POST['id_user'];
            $action = $_POST['action'];
            $status = $_POST['status'];

            if($action == 'Retour') {
                    $modelEmprunt = new ModelEmprunt();
                    $modelEmprunt->deleteResa($id_exemplaire , $status);
                    header('Location: ' . $router->generate('dashboard-employee', ['id_user' => $id_user]));
                    exit();  
            }
        }     
    }


}