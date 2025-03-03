<?php

class ControllerEmployee {

    public function create() {

        global $router;
        $model = new ModelEmployee();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['password'])) {
                if($_POST['password'] === $_POST['confpassword']) {
                    $model = new ModelEmployee();
                    $model->createEmployee($_POST['name'], $_POST['first_name'], $_POST['password']);
                    // require_once './view/homepage.php';
                    header('Location: /');
                    exit();
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

    public function loginEmployee() {

        //on doit rajouter un first-name à la bdd et à la class Employee

        global $router;
        $model = new ModelEmployee();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!empty($_POST['name']) && !empty($_POST['password'])) {
                $employee = $model->getEmployeeByName($_POST['name']);
                if($employee && password_verify($_POST['password'], $employee->getPassword())) {
                    $_SESSION['id_employee'] = $employee->getId_employee();
                    $_SESSION['name'] = $employee->getName();
                    $_SESSION['first_name'] = $employee->getFirst_name();
                    $_SESSION['type_user'] = '2';
                    header('Location: /');
                    exit();
                }else {
                    echo "Email ou mot de passe invalide.";
                }
            }else {
                echo "Toutes les cases doivent être remplis.";
            }
        }
        require_once './view/loginEmployee.php';
    }

    public function dashboardEmployee() {

    }

}