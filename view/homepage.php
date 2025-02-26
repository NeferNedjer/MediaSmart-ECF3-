<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($_SESSION): ?>
        <h2>Bonjour <?= $_SESSION['first_name']; ?></h2>
        <a href="<?= $router->generate('logout'); ?>">Déconnexion</a>
    <?php else: ?>
        <a href="<?= $router->generate('login'); ?>">Connexion</a>
        <a href="<?= $router->generate('register'); ?>">inscription</a>
    <?php endif; ?>

    <h1>Les derniers médias disponibles</h1>
    <?php foreach ($datas as $data): ?>
        <article>
            <h2><?php echo $data->getTitle(); ?></h2>
            <p><?php echo $data->getDescription(); ?></p>
            <p><?php echo $data->getAuthor(); ?></p>
            <p><?php echo $data->getId_subcategory(); ?></p>
        </article>
    <?php endforeach; ?>
</body>
</html>