<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <div>
        <h1>Inscription</h1>
        <form action="signup.php" method="POST">
    
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required><br><br>

            <label for="firstname">Prénom :</label>
            <input type="text" name="firstname" id="firstname" required><br><br>
            
            <label for="adress">Adresse :</label>
            <input type="text" name="adress" required><br><br>

            <label for="phone">Téléphone :</label>
            <input type="text" name="phone" required><br><br>

            <label for="emmail">Email :</label>
            <input type="text" name="email" id="email" required><br><br>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required><br><br>

            <label for="confmotdepasse">Confirmer le mot de passe :</label>
            <input type="password" id="confmotdepasse" name="confpassword" required><br><br>

        </form>
    
        <button type="submit">Envoyer</button>
    </div>
</body>
</html>

