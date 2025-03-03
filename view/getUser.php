<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Utilisateur</title>
</head>
<body>
    <h1><?php echo $data->getName() ?> <?php echo $data->getFirst_name() ?></h1>
    <p>Identifiant : <?php echo $data->getId_user(); ?></p>
    <p>E-mail : <?php echo $data->getEmail(); ?></p>
    <p>Adresse : <?php echo $data->getAdress(); ?></p>
    <p>Téléphone : <?php echo $data->getPhone(); ?></p>
    <p>Status : <?php echo $data->getStatus(); ?></p>
    <p>Date d'inscription : <?php echo $data->getInscription_date()->format('d/m/Y à H:i'); ?></p>
    <a href="<?php echo $router->generate('dashboard-employee') ?>">retour</a>
</body>
</html>