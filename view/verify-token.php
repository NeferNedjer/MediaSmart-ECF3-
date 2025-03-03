<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    

</head>
<body>

<div id= "background-form" >
    <div id="verify-token">
        <h2>Validation de l'adresse e-mail</h2> 
        <p>Merci de bien vouloir valider votre adresse mail</p>
        <p>Si vous n'avez pas reçu de mail de validation, veuillez vérifier votre dossier spam.</p>
        
        <form action="/verify-token" method="POST" id="form-verify-token"> 
            <input type="hidden" name="token" id="token" value="<?php echo $_GET['token']; ?>"> 
            <button type="submit" name="submit" id="btn-submit">
                 validation           
            </button>
        </form> 
    </div>
</div>
</body>
</html>