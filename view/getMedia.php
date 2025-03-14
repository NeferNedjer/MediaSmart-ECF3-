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

        <div id="media">
            <div class="media-detail">
                <div >
                    <img class="img-media" src="<?php echo $media->getImage_recto() ?>" alt="couverture du livre" >
                    <img class="img-media" src="<?php echo $media->getImage_verso() ?>" alt="couverture du livre" >
                </div>
                <h1><?php echo $media->getTitle() ?></h1><br>
                <h2>Identifiant : </h2> <p> <?php echo $media->getId_media(); ?></p>
                <h2>Auteur : </h2> <p><?php echo $media->getAuthor(); ?></p>
                <h2>Categorie : </h2><p><?php echo $media->getId_category(); ?></p>
                <h2>sous-categorie : </h2><p><?php echo $media->getId_subcategory(); ?></p>
                <h2>Description : </h2><p><?php echo $media->getDescription(); ?></p>

                <a href="<?php echo $router->generate('dashboard-media', ['id_media' => 0]) ?>">retour</a>
            </div>
        </div>
    </div>
</body>
</html>