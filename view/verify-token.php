<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/mediasmart/verify-token" method="POST">


    <input type="text" name="token" id="token" value="<?php echo $_GET['token']; ?>">
    <input type="submit" name="submit" value="Validation">

    </form>
</body>
</html><?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// echo "Fichier appelé";

// var_dump($_GET['token']);
// if (isset($_GET['token'])) {
//     $token = $_GET['token'];
// var_dump($token);
//     // Vérifier le jeton dans la base de données
//     try{
//     $bdd = new PDO('mysql:host=localhost;dbname=mediasmart', 'root', '');
//     $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// var_dump($bdd);
//     $req = $bdd->prepare("SELECT email FROM user WHERE token = :token");
//     $req->bindParam(':token', $token, PDO::PARAM_STR);
//     $req->execute();
    

//     if ($req->rowCount() > 0) {
//         // Jeton valide, mettre à jour le statut de vérification
//         $data = $req->fetch(PDO::FETCH_ASSOC);
//         $email = $data['email'];
// var_dump($email);
//         $updateReq = $bdd->prepare("UPDATE user SET email_verified = 1 WHERE email = :email");
//         $updateReq->bindParam(':email', $email, PDO::PARAM_STR);
//         $updateReq->execute();

        // echo "Votre adresse email a été vérifiée avec succès.";
//     } else {
//         echo "Jeton de vérification invalide.";
//     }
// } catch (PDOException $e) {
//     echo "Erreur : " . $e->getMessage();
// }
// } else {
//     echo "Aucun jeton de vérification fourni.";
// }
?>
