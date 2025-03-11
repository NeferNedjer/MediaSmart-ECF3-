<?php
class ControllerMedia {

    public function home() {

        global $router;

        $model = new ModelMedia();  
        $datas = $model->mediaHome();

        // var_dump($datas);

        require_once('./view/homepage.php');
    }

    public function read($id) {

        global $router;

        $model = new ModelMedia();
        $data = $model->getMediaById($id);

        // var_dump($data);

        require_once('./view/detailmedia.php');
    }

    public function author($id) {

        global $router;

        $model = new ModelMedia();   
        $datas = $model->getMediaByAuthor($id);
 
        // var_dump($datas);

        require_once('./view/mediaselector.php');
    }

    public function category($id) {

        global $router;

        $model = new ModelMedia();   
        $datas = $model->getMediaByCategory($id);
 
        // var_dump($datas);

        require_once('./view/mediaselector.php');
    }

    public function subcategory($id) {

        global $router;

        $model = new ModelMedia();   
        $datas = $model->getMediaBySubcategory($id);
 
        // var_dump($datas);

        require_once('./view/mediaselector.php');
    }

    public function create() {

        global $router;

        // Validation du formulaire
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // $model = new ModelMedia();

            // if (isset($_POST['search'])) {
            //     $search = $_POST['search'] . '%';
            //     $searchauthors = $model->getSearchAuthors($search);
            //     echo json_encode($searchauthors);
            //     exit();
            // }

            if(!empty($_POST['id_subcategory']) && !empty($_POST['title']) && !empty($_POST['id_author']) && !empty($_POST['description'])) {
                $model = new ModelMedia();
                $model->createMedia($_POST['id_subcategory'], $_POST['title'], $_POST['id_author'], $_POST['description'], $_POST['image']);

                    require_once('./view/newmedia.php');
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
                $model->updateMedia($_POST['id'], $_POST['id_subcategory'], $_POST['title'], $_POST['id_author'], $_POST['description'], $_POST['image']);
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
        $search = $_POST['searchMedia'] . '%';
        $searchMedia = $model->getMedia($search);
        Header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($searchMedia);
        
    }



}