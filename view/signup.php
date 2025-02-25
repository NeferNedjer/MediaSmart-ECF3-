<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
        <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
        <?php endif?>
    <div>
        <h1>Inscription</h1>
        <form action="/mediasmart/register" method="POST">
    
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="<?php if (!empty($_POST)) echo $_POST['name'] ?>" required><br><br>

            <label for="first_name">Prénom :</label>
            <input type="text" name="first_name" id="first_name" value="<?php if (!empty($_POST)) echo $_POST['first_name'] ?>" required><br><br>
            
            <label for="adress">Adresse :</label>
            <input type="text" name="adress" value="<?php if (!empty($_POST)) echo $_POST['adress'] ?>" required><br><br>

            <label for="phone">Téléphone :</label>
            <input type="text" name="phone" value="<?php if (!empty($_POST)) echo $_POST['phone'] ?>" required><br><br>

            <label for="emmail">Email :</label>
            <input type="text" name="email" id="email" value="<?php if (!empty($_POST)) echo $_POST['email'] ?>" required><br><br>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required><br><br>

            <label for="confmotdepasse">Confirmer le mot de passe :</label>
            <input type="password" id="confmotdepasse" name="confpassword" required><br><br>

            <input type="submit" name="submit" value="inscription">
        </form>
    
        
    </div>
</body>
</html>

