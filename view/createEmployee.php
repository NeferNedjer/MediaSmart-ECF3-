<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'employee</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
</head>
<body>
<div id=background>
    <div id="createEmployee" class='flex-container'>
        <h2>Création d'un employé</h2> <br><br>
        <form action="/mediasmart/createEmployee" method="POST">
            <div class="mb-3">
            <label for="name">Nom :</label>
            <input type="text" name="name"><br><br>
            </div>
            <div class="mb-3">       
            <label for="first_name">Prénom :</label>
            <input type="text" name="first_name"><br><br>
            </div>
            <div class="mb-3">
            <label for="password">Password :</label>
            <input type="password" name="password"><br><br>
            </div>
            <div class="mb-3">
            <label for="confpassword">Confirmez le password :</label>
            <input type="password" name="confpassword" id="confpassword"><br><br>
            </div>
            <div class="mb-3">
            <input type="submit" value="Valider">
            </div>
        </form>
    </div>
</div>
</body>
</html>