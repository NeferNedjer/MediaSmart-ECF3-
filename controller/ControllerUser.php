<?php

class ControllerUser {

    public function login() {
        global $router;
        $model = new ModelUser();
        $model->isLoggedIn();// Verifie si le user est déjà loggé.

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // vérifie si le prenom le nom et le mot de passe sont remplis
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $user = $model->getUserByEmail($_POST['email']);
                //vérifie si les données du user et le mot de passe sont corrects
                if($user && password_verify($_POST['password'], $user->getPassword())) {
                    $_SESSION['id_user'] = $user->getId_user();
                    $_SESSION['name'] = $user->getName();
                    $_SESSION['first_name'] = $user->getFirst_name();
                    header('Location: /mediasmart');
                    exit;
                }else {
                    $error = 'Email ou mot de passe invalide';
                }
            }else {
                $error = 'Toutes les cases doivent être remplies.';
            }
        }
        require_once './view/login.php';
    }

    public function register() {
        $error = '';
        global $router;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                if($_POST['password'] === $_POST['confpassword']) {
                    $model = new ModelUser();
                    if($model->checkUserMail($_POST['email'])) {
                        $model->createUser($_POST['name'], $_POST['first_name'], $_POST['email'], $_POST['password'], $_POST['adress'], $_POST['phone']);
                        $error =  "Compte créé avec succès.";
                        require_once './view/login.php';
                    }else {
                        $error = "Email déjà utilisé.";
                        require_once './view/signup.php';
                    }
                }else {
                    $error = "Les mots de passe ne correspondent pas.";
                    require_once './view/signup.php';
                }
            }else {
                $error = "Toutes les cases doivent être remplies";
            }
        }else {
            require_once './view/signup.php';
        }
    }

    
    public function logout() {
  
        session_unset();
        session_destroy();
        header('Location: /mediasmart');
        exit();
    }



}