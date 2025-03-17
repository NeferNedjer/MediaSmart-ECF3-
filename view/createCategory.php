<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation de catégorie</title>
</head>
<body>
    <form action="/createCategory" method="post">
        <label for="nameCategory">Nom de la catégorie :</label>
        <input type="text" name="nameCategory" id="nameCategory">
        <input type="submit" value="Enregistrer">
    </form>
    <!-- faire echo $data->getId_category en input hidden, peut etre faire un menu deroulant avec toutes les category existantes pour selectionner celle que l'on veut et ainsi recuperer l'id_category -->

    <select name="" id="">
        <option value="">Choisissez une categorie</option>
        <?php foreach($datas as $data): ?>
        <option value="<?php echo $data->getId_category() ?>"><?php echo $data->getName() ?></option>
        <?php endforeach; ?>
    </select>

    <form action="/createSubCategory" method="post">
    <label for="nameSubCategory">Nom de la sous-catégorie :</label>
    <input type="text" name="nameSubCategory" id="nameSubCategory">
    <input type="submit" value="Enregistrer">
    </form>

</body>
</html>