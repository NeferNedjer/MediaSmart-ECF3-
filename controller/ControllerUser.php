<?php

class ControllerUser {

    public function login() {
        global $router;
        $model = new ModelUser();
        $model->isLoggedIn();// Verifie si le user est déjà loggé.

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // vérifie si le prenom le nom et le mot de passe sont remplis
            if(!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['password'])){
                $user = $model->getUser($_POST['name'], $_POST['firstname']);
                //vérifie si les données du user et le mot de passe sont corrects
                if($user && password_verify($_POST['password'], $user->getPassword())) {
                    $_SESSION['id_user'] = $user->getId_user();
                    $_SESSION['name'] = $user->getName();
                    header('Location: /mediasmart');
                    exit;
                }else {
                    $error = 'Nom ou mot de passe invalide';
                }
            }else {
                $error = 'Toutes les cases doivent être remplies.';
            }
        }
        require_once './view/login.php';
    }

    public function register() {

        global $router;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['password'])) {
                if($_POST['password'] === $_POST['password_verify']) {
                    $model = new ModelUser();
                    if($model->checkUserMail($_POST['email'])) {
                        $model->createUser($_POST['name'], $_POST['firstname'], $_POST['email'], $_POST['password'], $_POST['address'], $_POST['phone']);
                        echo "Compte créé avec succès.";
                        require_once './view/login.php';
                    }else {
                        echo "Email déjà utilisé.";
                        require_once './view/signup.php';
                    }
                }else {
                    echo "Les mots de passe ne correspondent pas.";
                    require_once './view/signup.php';
                }
            }else {
                echo "Toutes les cases doivent être remplies";
            }
        }else {
            require_once './view/signup.php';
        }
    }
}