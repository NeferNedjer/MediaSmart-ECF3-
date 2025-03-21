<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class ControllerUser {

    public function login() {
        global $router;
        $model = new ModelUser();
        $modelEmployee = new ModelEmployee();
        $model->isLoggedIn();// Verifie si le user est déjà loggé.
        $error = '';
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error = '';
            // vérifie si le prenom le nom et le mot de passe sont remplis
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $user = $model->getUserByEmail($_POST['email']);
                $employee = $modelEmployee->getEmployeeByName($_POST['email']);
                //vérifie si les données du user et le mot de passe sont corrects
                if($user && password_verify($_POST['password'], $user->getPassword())) {
                    if($user->getEmail_verified() == 0) {
                        $error = 'Veuillez vérifier votre adresse email.';
                        require_once './view/login.php';
                        exit();
                    }
                    $model->updateconnexion($user->getId_user());
                    $_SESSION['id_user'] = $user->getId_user();
                    $_SESSION['name'] = $user->getName();
                    $_SESSION['first_name'] = $user->getFirst_name();
                    $_SESSION['type_user'] = '1';
                    header('Location: /');
                    exit;
                }elseif($employee && password_verify($_POST['password'], $employee->getPassword())) {
                    $_SESSION['id_employee'] = $employee->getId_employee();
                    $_SESSION['name'] = $employee->getName();
                    $_SESSION['first_name'] = $employee->getFirst_name();
                    $_SESSION['type_user'] = '2';
                    //require_once('./view/dashboardEmployee.php');
                    header('Location: dashboardEmployee/0');
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

                // Vérification de la validité de l'adresse e-mail
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

                    if($_POST['password'] === $_POST['confpassword']) {

                        // Définir l'expression régulière pour le mot de passe
                        $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
                        // Vérifier si le mot de passe respecte les critères
                        if (preg_match($passwordPattern, $_POST['password'])) {

                            $model = new ModelUser();
                            if($model->checkUserMail($_POST['email'])) {

                                $token = bin2hex(random_bytes(16));


                                $model->createUser($_POST['name'], $_POST['first_name'], $_POST['email'], $_POST['password'], $_POST['adress'], $_POST['phone'], $token);
                                $error =  "Compte créé avec succès. Un email de confirmation vous a été envoyé.";

                                require 'vendor/autoload.php';
                                
                                    $first_name = $_POST['first_name'];
                                    $email = $_POST['email'];

                                    $verificationLink = "http://mediasmart/view/verify-token.php?token=$token";

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
                                    $mail->Username   = '73e55a41723c3d'; // Remplacez par votre nom d'utilisateur Mailtrap
                                    $mail->Password   = '644a45bfe892be'; // Remplacez par votre mot de passe Mailtrap
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
                        } else {
                            $error = "Le mot de passe doit contenir au moins 8 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre, et un caractère spécial.";
                            require_once './view/signup.php';
                        }
                    }else {
                        $error = "Les mots de passe ne correspondent pas.";
                        require_once './view/signup.php';
                    }
                } else {
                    $error = "Adresse e-mail invalide.";
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
        header('Location: /');
        exit();
    }


    public function verify() {
      global $router;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // vérifie si le prenom le nom et le mot de passe sont remplis
            if(!empty($_POST['token']) ){

                $token = $_POST['token'];
                $model = new ModelUser();
                $result = $model->getUserByToken($token);

                if ($result) {
                $user = $result['user']; // Access the User object
                $now_date = $result['now_date']; // Access the now_date value

                if ($user) { // Check if $user is not null
                    $email = $user->getEmail();
                    $inscription_date = $user->getInscription_date();
                    $id_user = $user->getId_user();


                    $currentDateTime = new DateTime($now_date);
    
                    // Check if $inscription_date is a string
                    if (!($inscription_date instanceof DateTime)) {
                    // Convert $inscription_date to DateTime object
                        $inscriptionDateTime = new DateTime($inscription_date);
                    } else {
                        $inscriptionDateTime = $inscription_date;
                    }
    
                    // Calculate the difference in minutes
                    $interval = $currentDateTime->diff($inscriptionDateTime);
                    $minutesDifference = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;

                    if ($minutesDifference <= 15) {
                        $model->updateEmail($email);
                        require_once './view/login.php';
                        exit();
                    } else {
                        $this->resend($id_user);
                        require_once './view/resend-token.php';
                        exit();
                    }
                } else {
                    echo "Token invalide.";
                }
            } else {
                echo "Aucun utilisateur trouvé pour ce token.";
            }
            }
        }
    }


    public function resend($id) {
  
        global $router;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $token = bin2hex(random_bytes(16));
            $model = new ModelUser();
            $model->updateToken($id, $token);
       
            $user = $model->getUserById($id);

            require 'vendor/autoload.php';
                        
                       
            $first_name = $user->getFirst_name();
            $email = $user->getEmail();

            $verificationLink = "http://mediasmart/view/verify-token.php?token=$token";

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
                $mail->Username   = '73e55a41723c3d'; // Remplacez par votre nom d'utilisateur Mailtrap
                $mail->Password   = '644a45bfe892be'; // Remplacez par votre mot de passe Mailtrap
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
                $mail->send();
                echo 'Email envoyé avec succès';
            } catch (Exception $e) {
                echo "L'envoi de l'email a échoué: {$mail->ErrorInfo}";
            }

            require_once './view/resend-token.php';
            exit();
        }
        require_once './view/resend-token.php';
        exit();
    }

    public function modifUser($id_user) {

        global $router;

        $model = new ModelUser();

        $data = $model->getUserById($id_user);
        
        require_once './view/dashboardEmployee.php';

        exit();
         
    }

    public function update() {
        global $router;
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['update'])) {

               
                if(!empty($_POST['name_user']) && !empty($_POST['first_name_user']) && !empty($_POST['email']) && !empty($_POST['adress']) && !empty($_POST['phone']) && !empty($_POST['statut'])){
              
                    $model = new ModelUser();
                    $model->updateUser($_POST['name_user'], $_POST['first_name_user'], $_POST['email'], $_POST['adress'], $_POST['phone'], $_POST['statut'], $_POST['id_user']);
                    header('Location: dashboardEmployee/0');
                } else {
                    $error = "Toutes les cases doivent être remplies";
                }
            } elseif (isset($_POST['delete'])) {
                $model = new ModelUser();
                $model->deleteUser($_POST['id_user']);
                header('Location: dashboardEmployee/0');
            } elseif (isset($_POST['retour'])) {
                header('Location: dashboardEmployee/0');
            }
         }      
    }

    public function dashboardUser($id_user) {

        global $router;
        $modelmedia = new ModelMedia();
        $medias = $modelmedia->mediaHome();
        $modellastmedia = new ModelMedia();
        $lastmedia = $modellastmedia->getLastMedia();
        $modelemployee = new ModelEmployee();
        $users = $modelemployee->employeeHome();
        $modelemprunts = new ModelEmprunt();
        $emprunts = $modelemprunts->getEmpruntResaByUser($id_user);
        
        require_once('./view/dashboardUser.php');
        
    }

    public function resaUser() {

        global $router;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new ModelEmprunt();
            $id_user = $_SESSION['id_user'];
            $id_media = $_POST['id_media'];

            if($model->nbResaByUser($id_user) < 3) {
                $id_exemplaire = $model->exemplaireDispo($id_media);
            
                if($id_exemplaire > 0) {

                    $model->createResa($id_user, $id_exemplaire);
                    header('Location: ' . $router->generate('dashboard-user', ['id_user' => $id_user]));
                    exit();
                } else {
                    $message= "Il n'y a plus d'exemplaire disponible.";
                    
                }

                header('Location: ' . $router->generate('dashboard-user', ['id_user' => $id_user]));
                exit();
            } else {
                $message= "Vous avez déjà 3 réservations en cours.";
                header('Location: ' . $router->generate('dashboard-user', ['id_user' => $id_user]));
                exit();
            }
        }
    }

    public function compteUser($id_user) {

        global $router;
        $model = new ModelUser();
        $data = $model->getUserById($id_user);
        require_once './view/compteUser.php';
        exit();

    }

    public function compteUserModif() {

        global $router;
        $id_user = $_SESSION['id_user'];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if(!empty($_POST['name']) && !empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['adress']) && !empty($_POST['phone']) && !empty($_POST['statut'])){
              
                $model = new ModelUser();
                $model->updateUser($_POST['name'], $_POST['first_name'], $_POST['email'], $_POST['adress'], $_POST['phone'], $_POST['statut'], $_POST['id_user']);
                header('Location: ' . $router->generate('dashboard-user', ['id_user' => $id_user]));
                exit();
            }
        } else {
            echo "Tous les champs doivent être remplis.";
        }
    }
    

    public function searchHistoricUser() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
            try {
                $modelHistoric = new ModelHistoric();
                $search = $_POST['search'] . '%';
                $results = $modelHistoric->searchUserHistoric($search);
                
                Header('Content-Type: application/json; charset=UTF-8');
                echo json_encode($results, JSON_THROW_ON_ERROR);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => 'Une erreur est survenue lors de la recherche']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Paramètres de recherche invalides']);
        }
    }
}


