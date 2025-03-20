<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

    public function dashboardEmployee($id_user) {

        global $router;
        $model = new ModelEmployee();
        $datas = $model->employeeHome();
        $modelemprunt = new ModelEmprunt();
        $emprunts = $modelemprunt->empruntHome();

        if($id_user == 0) {
            require_once('./view/dashboardEmployee.php');
        } else {
            $empruntsuser = $modelemprunt->getEmpruntByUser($id_user);
            require_once('./view/dashboardEmployee.php');
        }
        
    }

    public function getUser($id) {

        global $router;
        $model = new ModelUser();
        $data = $model->getUserById($id);
        $modelemprunt = new ModelEmprunt();
        $emprunts = $modelemprunt->getEmpruntByUser($id);
    
        require_once('./view/getUser.php');

    }

    public function dashboardMedia($id_media) {

        global $router;
        $model = new ModelMedia();
        $datas = $model->mediaHome();
        $modelemprunt = new ModelEmprunt();
        $emprunts = $modelemprunt->empruntHome();
        
        
        $categories = $model->getCategories();
        $subcategories = $model->getSubcategories();
        $authors = $model->getAuthors();
        $users = $model->getUsers();

        if($id_media == 0) {
            require_once('./view/dashboardMedia.php');
        } else {
            $exemplairemedia = $modelemprunt->getExemplaireById($id_media);
            require_once('./view/dashboardMedia.php');
        }
    }

    public function searchEmployee() {

        global $router;

        $model = new ModelUser();
        $search = $_POST['searchEmployee'] . '%';
        $searchEmployee = $model->getUtilisateur($search);
        Header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($searchEmployee);
        
    }

    public function getEmployee() {

        global $router;
        $model = new ModelEmployee;
        $employees = $model->getEmployee();
        require_once('./view/getEmployee.php');
    }

    public function deleteEmployee() {

        global $router;
        $model = new ModelEmployee();
        $model->deleteEmployee($_POST['id_employee']);
        header('Location: getEmployee');
    }

    public function dashboardHistoric() {

        global $router;
        $modelHistoric = new ModelHistoric();
        $historics = $modelHistoric->historicHome();
        require_once('./view/dashboardHistoric.php');
    }

    public function retardEmprunt() {

        global $router;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $model = new ModelEmprunt();
        $retards = $model->getRetardEmprunt();
        header('Location: ' . $router->generate('dashboard-employee', ['id_user' => 0]));
        exit();
        }
    }

    public function sendRetardEmprunt($text1, $text2, $text3, $text4, $text5, $email, $first_name) {
  
        global $router;

            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);
    
            try {
                // Configuration de l'expéditeur
                $mail->setFrom('no-reply@mediasmart.com', 'Votre Site');
    
                // Configuration du destinataire
                $mail->addAddress($email, $first_name);
    
                 // Configuration du contenu de l'email
                $mail->isHTML(true); // Indique que le contenu de l'email est en HTML
                $mail->Subject = 'Rappel sur votre emprunt de chez MediaSmart';
                $mail->Body    = "<h2>$text1</h2><br><br>
                                <h3>$text2</h3><br>
                                <h3>$text3</h3><br>
                                <h3>$text4</h3><br><br>
                                <h3>$text5</h3>
                ";
    
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
        
    }



}