<?php

class ControllerEmployee {

    public function create() {

        global $router;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!empty($_POST['name']) && !empty($_POST['password'])) {
                if($_POST['password'] === $_POST['confpassword']) {
                    $model = new ModelEmployee();
                    $model->createEmployee($_POST['name'], $_POST['password']);
                    require_once './view/homepage.php';
                }else {
                    echo "Les mots de pass ne correspondent pas.";
                }
            }else {
                echo "Veuillez remplir tous les champs";
            }
        }else {
            require_once('./view/createEmployee.php');
        }
    }

}