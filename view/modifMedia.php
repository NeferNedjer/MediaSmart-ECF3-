<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Utilisateur</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link rel="icon" href="../assets/img/logoM.png">
</head>
<body>
<?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
        <?php endif?>


   

    
    <form action="<?php echo $router->generate('updateMedia');  ?>" method="POST" id="form-signup">
       

        <input type="hidden" name="id_media" value="<?php echo $data->getId_media(); ?>">
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" value="<?php echo $data->getTitle() ;?>" required>

        <label for="author">Auteur :</label>
        <input type="text" name="author" id="author" value="<?php echo $data->getAuthor();?>" required>
        <input type="hidden" name="id_author" value="<?php echo $data->getId_author(); ?>">

        <label for="category">Catégorie :</label>
        <input type="text" name="category" id="category" value="<?php echo $data->getName(); ?>" required>
        <input type="hidden" name="id_category" value="<?php echo $data->getId_category(); ?>">

        <label for="subcategory">Sous-catégorie :</label>
        <input type="text" name="subcategory" id="subcategory" value="<?php echo $data->getTheme(); ?>" required>
        <input type="hidden" name="id_subcategory" value="<?php echo $data->getId_subcategory(); ?>">
                    
        <label for="description">Description :</label>
        <textarea name="description" id="description" required><?php echo $data->getDescription(); ?></textarea>

        <label for="image_recto">Image recto :</label>
        <input type="text" name="image_recto" id="image_recto" value="<?php echo $data->getImage_recto(); ?>" >

        <label for="image_verso">Image verso :</label>
        <input type="text" name="image_verso" id="image_verso" value="<?php echo $data->getImage_verso(); ?>" >

        <a href="/update"><input id="submit-signup" type="submit" name="update" value="Modifier"></a>
        <a href="/dashboardMedia/0">retour</a>
    </form>
    
    
   
</div> 
</body>
</html>