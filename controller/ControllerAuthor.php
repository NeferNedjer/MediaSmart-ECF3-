<?php
class ControllerAuthor {

    public function searchAuthor() {

        global $router;

        // if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $model = new ModelAuthor();

            // if (isset($_POST['search'])) {
                $search = $_POST['search'] . '%';
                $searchauthors = $model->getSearchAuthors($search);
                Header('Content-Type: application/json; charset=UTF-8');
                echo json_encode($searchauthors); 
                exit();
            // }
        // }
    }


}