<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../assets/img/logoM.png">
</head>
<body>
    <h1>Création de nouveaux médias</h1>

        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif?>


    <form action="mediasmart/media/create" method="POST" enctype="multipart/form-data" id="search-form">

        <label for="id_category">Catégorie :</label>
        <select name="id_category" id="id_category">
            <option value=""></option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->getId_category(); ?>"><?php echo $category->getName(); ?></option>
            <?php endforeach; ?>
        </select><br><br>




        <label for="id_subcategory">Sous-catégorie :</label>
        <select name="id_subcategory" id="id_subcategory">
            <option value=""></option>
            <?php foreach ($subcategories as $subcategory): ?>
                <option value="<?php echo $subcategory->getId_subcategory(); ?>" data-category-id="<?php echo $subcategory->getId_category(); ?>"><?php echo $subcategory->getTheme(); ?></option>
            <?php endforeach; ?>
        </select><br><br>


        <label for="search">Recherche Auteur :</label>
        <input type="text" name="search" id="search" autocomplete="off"><br><br>

        <ul id="response"></ul>

        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="description">Description :</label>
        <input type="text" name="description" id="description" required><br><br>

        <label for="image">Image :</label>
        <input type="file" name="image" id="image" required><br><br>

        

        <input type="submit" value="Créer">
    </form>



    <script src="../assets/js/newmedia.js"></script>
    <script src="../assets/js/ajax.js"></script>

</body>
</html>