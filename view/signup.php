<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Signup</h1>
        <form action="signup.php" method="POST">
    
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required><br><br>

            <label for="first-name">First-name</label>
            <input type="text" name="first-name" class="form-control" required><br><br>
            
            <label for="adress">Adress</label>
            <input type="text" name="adress" class="form-control" required><br><br>

            <label for="phone">Phone number</label>
            <input type="text" name="phone" class="form-control" required><br><br>

            <label for="emmail">Email</label>
            <input type="text" name="email" class="form-control" required><br><br>

            <label for="password"></label>
            <input type="password" name="password" class="form-control" required><br><br>

            <label for="confmotdepasse">Confirmer le mot de passe :</label>
            <input type="password" id="confmotdepasse" name="confpassword" required><br><br>
        </form>
    
        <button type="submit">Signup</button>
    </div>
</body>
</html>

