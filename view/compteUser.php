<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
</head>
<body>
        <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
        <?php endif?>


   
    <section id="grid-signup">
    
    <form action="/compteUserModif" method="POST" id="form-signup">
        <h1>Mes infos</h1>
        
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
        <input type="hidden" id="statut" name="statut" value="<?php echo $data->getStatut(); ?>">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="<?php echo $data->getName() ;?>" required>

        <label for="first_name">Prénom :</label>
        <input type="text" name="first_name" id="first_name" value="<?php echo $data->getFirst_name() ;?>" required>
        
        <div class="flex-product">
                    <div class="input-group">
                    <label for="adress">Adresse :</label>
                    <input type="text" name="adress" id="adress" value="<?php echo $data->getAdress() ?>" required>
                </div>

                <div class="input-group">
                    <label for="phone">Téléphone :</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $data->getPhone() ?>" required>
                </div>
         </div>

        <label for="email">Email :</label>
        <input type="text" name="email" id="email" value="<?php echo $data->getEmail(); ?>" required>

        <input id="submit-signup" type="submit" name="submit" value="valider">
        <a href="<?php echo $router->generate('dashboard-user', ['id_user' => $_SESSION['id_user']]) ?>">Retour</a>
    </form>
    <section id="right-signup">
        <img src="../assets/img/signup.jpg" alt="Image d'inscription">
    </section>
    </section> 
</div> 
   
</body>
</html>
