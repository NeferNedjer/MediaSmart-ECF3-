<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($_SESSION){
        echo "bonjour " . $_SESSION['first_name'];
    } ?>
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