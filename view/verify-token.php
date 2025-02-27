<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/mediasmart/verify-token" method="POST">


    <input type="hidden" name="token" id="token" value="<?php echo $_GET['token']; ?>">
    <input type="submit" name="submit" value="Validation">

    </form>
</body>
</html>