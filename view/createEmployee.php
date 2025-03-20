<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'employee</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link rel="icon" href="../assets/img/logoM.png">
</head>
<body>


<div class="form-container" id="form-container">
        <form action="/createEmployee" method="POST" id="employee-form">
            <h2 class="text-center" id="form-title">Création d'un Employé</h2>
            
            <div class="form-group" id="name-group">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" name="name" id="name" class="form-input" placeholder="Entrez le nom" required>
            </div>

            <div class="form-group" id="first-name-group">
                <label for="first_name" class="form-label">Prénom :</label>
                <input type="text" name="first_name" id="first_name" class="form-input" placeholder="Entrez le prénom" required>
            </div>

            <div class="form-group" id="password-group">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-input" placeholder="Entrez le mot de passe" required>
            </div>

            <div class="form-group" id="confpassword-group">
                <label for="confpassword" class="form-label">Confirmez le mot de passe :</label>
                <input type="password" name="confpassword" id="confpassword" class="form-input" placeholder="Confirmez le mot de passe" required>
                <span id="password-error" class="error-message"></span>
            </div>

            <div class="form-group submit-btn" id="submit-btn-group">
                <input type="submit" value="Valider" id="submit-btn" class="submit-input">
                
            </div>
        </form>
    </div>


</body>
</html>