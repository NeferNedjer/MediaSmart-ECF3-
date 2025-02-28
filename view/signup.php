<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./assets/scss/style.css">
</head>
<body>
        <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
        <?php endif?>


   
    <section id="grid-signup">
    
    <form action="/MediaSmart/register" method="POST" id="form-signup">
        <h1>Bonjour, Bienvenue sur MediaSmart</h1>
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="<?php if (!empty($_POST)) echo $_POST['name'] ;?>" required>

        <label for="first_name">Prénom :</label>
        <input type="text" name="first_name" id="first_name" value="<?php if (!empty($_POST)) echo $_POST['first_name'] ;?>" required>
        
        <div class="flex-product">
                    <div class="input-group">
                    <label for="adress">Adresse :</label>
                    <input type="text" name="adress" id="adress" value="<?php if (!empty($_POST)) echo $_POST['adress']; ?>" required>
                </div>

                <div class="input-group">
                    <label for="phone">Téléphone :</label>
                    <input type="text" name="phone" id="phone" value="<?php if (!empty($_POST)) echo $_POST['phone']; ?>" required>
                </div>
         </div>

        <label for="email">Email :</label>
        <input type="text" name="email" id="email" value="<?php if (!empty($_POST)) echo $_POST['email']; ?>" required>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <label for="confmotdepasse">Confirmer le mot de passe :</label>
        <input type="password" id="confmotdepasse" name="confpassword" required>

        <input id="submit-signup" type="submit" name="submit" value="inscription">
    </form>
    <section id="right-signup">
        <img src="./assets/img/signup.jpg" alt="Image d'inscription">
    </section>
    </section> 
</div> 
   
</body>
</html>

