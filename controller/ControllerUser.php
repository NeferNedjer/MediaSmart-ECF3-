<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


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

                        $token = bin2hex(random_bytes(16));


                        $model->createUser($_POST['name'], $_POST['first_name'], $_POST['email'], $_POST['password'], $_POST['adress'], $_POST['phone'], $token);
                        $error =  "Compte créé avec succès. Un email de confirmation vous a été envoyé.";


                     
                        require 'vendor/autoload.php';
                        
                       
                            $first_name = $_POST['first_name'];
                            $email = $_POST['email'];

                            $verificationLink = "http://localhost/mediasmart/view/verify-token.php?token=$token";

                            // $verificationLink = $router->generate('verify-token', ['token' => $token]);


                        $mail = new PHPMailer(true);
                        
                        try {
                            // Configuration de l'expéditeur
                            $mail->setFrom('no-reply@mediasmart.com', 'Votre Site');
                        
                            // Configuration du destinataire
                            $mail->addAddress($email, $first_name);
                        
                            // Configuration du contenu de l'email
                            $mail->isHTML(true); // Indique que le contenu de l'email est en HTML
                            $mail->Subject = 'Vérifiez votre adresse email';
                            $mail->Body    = "Bonjour $first_name, \n\nPour vérifier votre inscription, cliquez sur le lien suivant : <a href=\"" . $verificationLink . "\">Confirmation de votre adresse mail</a>";
                        
                            // Configuration du serveur SMTP (Mailtrap)
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.mailtrap.io';
                            $mail->Port       = 2525; // Port de Mailtrap
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'b41082ebc7e4bf'; // Remplacez par votre nom d'utilisateur Mailtrap
                            $mail->Password   = '1fcb7750bb513a'; // Remplacez par votre mot de passe Mailtrap
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        
                            $mail->send();
                            echo 'Email envoyé avec succès';
                        } catch (Exception $e) {
                            echo "L'envoi de l'email a échoué: {$mail->ErrorInfo}";
                        }
                        
                        






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

    public function verify() {
      global $router;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // vérifie si le prenom le nom et le mot de passe sont remplis
            if(!empty($_POST['token']) ){

                $token = $_POST['token'];
                $model = new ModelUser();
                $user = $model->getUserByToken($token);
        
                $email = $user->getEmail();
                $inscription_date= $user->getInscription_date();

                $model->updateEmail($email);

                require_once './view/login.php';

            exit();
            }
        }
    }








}