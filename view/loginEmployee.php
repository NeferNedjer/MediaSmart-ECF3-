<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Connexion Employee</title>
    <link rel="icon" href="../assets/img/logoM.png">
</head>
<body>
    <form action="/loginEmployee" method="post">

    <label for="name">Nom :</label>
    <input type="text" name="name"><br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password"><br><br>

    <input type="submit" value="Valider">
    </form>
</body>
</html>

<!-- //on doit rajouter un prenom (first-name) à la bdd -->