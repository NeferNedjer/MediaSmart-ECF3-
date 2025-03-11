<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Média</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
</head>
<body>
    <div id="backround" class='flex-container'></div>
        <div id="user-details">
            <div class="user-info">
                <img src="<?php echo $media->getImage_recto() ?>" alt="couverture du livre" width="150px" height="200px">
                <img src="<?php echo $media->getImage_verso() ?>" alt="couverture du livre" width="150px" height="200px">
                <h1><?php echo $media->getTitle() ?></h1><br>
                <p>Chemin de l'image recto : <?php echo $media->getImage_recto() ?></p>
                <p>Chemin de l'image verso : <?php echo $media->getImage_verso() ?></p>
                <p>Identifiant : <?php echo $media->getId_media(); ?></p><br>
                <p>Auteur : <?php echo $media->getAuthor(); ?></p><br>
                <p>Categorie : <?php echo $media->getId_category(); ?></p><br>
                <p>sous-categorie : <?php echo $media->getId_subcategory(); ?></p><br>
                <p>Description : <?php echo $media->getDescription(); ?></p><br>
               
        </ul>

                <a href="<?php echo $router->generate('dashboard-media', ['id_media' => 0]) ?>">retour</a>


            </div>
        </div>
    </div>
</body>
</html>