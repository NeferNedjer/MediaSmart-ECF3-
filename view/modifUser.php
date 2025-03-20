<!DOCTYPE html>
<html lang="fr">
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


   
    <section id="grid-signup">
    
    <form action="<?php //echo $router->generate('update-user');  ?>" method="POST" id="form-signup">
       

        <input type="hidden" name="id_user" value="<?php echo $data->getId_user(); ?>">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="<?php echo $data->getName() ;?>" required>

        <label for="first_name">Prénom :</label>
        <input type="text" name="first_name" id="first_name" value="<?php echo $data->getFirst_name();?>" required>
        
        <div class="flex-product">
                    <div class="input-group">
                    <label for="adress">Adresse :</label>
                    <input type="text" name="adress" id="adress" value="<?php echo $data->getAdress(); ?>" required>
                </div>

                <div class="input-group">
                    <label for="phone">Téléphone :</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $data->getPhone(); ?>" required>
                </div>
         </div>

        <label for="email">Email :</label>
        <input type="text" name="email" id="email" value="<?php echo $data->getEmail(); ?>" required>
        
        <label for="statut">Statut :</label>
        <input type="number" id="statut" name="statut" value="<?php echo $data->getStatut(); ?>">

        <a href="/update"><input id="submit-signup" type="submit" name="update" value="Modifier"></a>
        <a href="/update"><input id="submit-signup" type="submit" name="delete" value="Supprimer"></a>
        <a href="/update"><input id="submit-signup" type="submit" name="retour" value="Retour"></a>
    </form>
    
    <section id="right-signup">
        <img src="../assets/img/signup.jpg" alt="Image d'inscription">
    </section>
    </section> 
</div> 
</body>
</html>