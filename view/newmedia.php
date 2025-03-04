<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/scss/style.css">
</head>
<body>



    <h1>Création de nouveaux médias</h1>

        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif?>


    <p id="bonjour-m">BONJOUR</p>

<form action="mediasmart/media/create" method="POST" enctype="multipart/form-data" id="form-create-media" class="media-form">
    <h2 class="form-title">Ajouter un nouveau média</h2>
    
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="id_author">Auteur :</label>
        <select name="id_author" id="id_author" class="form-select">
            <option value="">Sélectionner un auteur</option>
            <?php foreach ($authors as $author): ?>
                <option value="<?php echo $author->getId_author(); ?>"><?php echo $author->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group category-group">
        <label class="group-label">Catégorie :</label>
        <div class="radio-container">
            <?php foreach ($categories as $category): ?>
                <div class="radio-item">
                    <input type="radio" name="id_category" id="id_category_<?php echo $category->getId_category(); ?>" value="<?php echo $category->getId_category(); ?>" class="radio-input">
                    <label for="id_category_<?php echo $category->getId_category(); ?>" class="radio-label"><?php echo $category->getName(); ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="id_subcategory">Genre :</label>
        <select name="id_subcategory" id="id_subcategory" class="form-select">
            <option value="">Sélectionner un genre</option>
            <?php foreach ($subcategories as $subcategory): ?>
                <option value="<?php echo $subcategory->getId_subcategory(); ?>" data-category-id="<?php echo $subcategory->getId_category(); ?>"><?php echo $subcategory->getTheme(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea name="description" id="description" class="form-textarea" required></textarea>
    </div>
    
    <div class="form-group">
        <label for="image" class="file-label">Image :</label>
        <div class="file-upload">
            <input type="file" name="image" id="image" class="file-input" required>
            <span class="file-custom">Choisir un fichier</span>
        </div>
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn-submit">Créer</button>
    </div>
</form>

<p id="bonjour">bjr</p>
<a href="<?php echo $router->generate('dashboard-employee') ?>">retour</a>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('input[name="id_category"]');
    const subcategorySelect = document.getElementById('id_subcategory');
   
    // Stocker les options des sous-catégories dans une variable
    const subcategoryOptions = Array.from(subcategorySelect.options);

    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', function() {
            const selectedCategoryId = this.value;

            // Clear existing options in subcategory select
            subcategorySelect.innerHTML = '<option value=""></option>';

            // Add new options based on selected category
            subcategoryOptions.forEach(function(option) {
                if (option.getAttribute('data-category-id') === selectedCategoryId) {
                    subcategorySelect.appendChild(option);
                }
            });
        });
    });
});
</script>

</body>
</html>