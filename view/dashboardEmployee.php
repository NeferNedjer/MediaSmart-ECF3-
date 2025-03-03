<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Employee</title>
</head>
<body>
    <header>
        <nav>
           <?php if($_SESSION) {
            echo "Bonjour " . $_SESSION['first_name'];
           } ?> 
            <a href="/media-create">Créer un média</a>
            <a href="/createEmployee">créer un employée</a>
        </nav>
    </header>
    <h1>Dashboard Employee</h1>
           <h2>Liste des Utilisateurs</h2>
           <?php foreach($datas as $data): ?>
            <p>Nom : <a href="<?php echo $router->generate('getUser', ['id' => $data->getId_user()]); ?>"><?php echo $data->getName()?> <?php echo $data->getFirst_name()?></a><br> Status :<?php echo $data->getStatut(); ?></div>
            <?php endforeach; ?></p>

            <a href="<?php echo $router->generate('home') ?>">Page d'accueil</a>
</body>
</html>