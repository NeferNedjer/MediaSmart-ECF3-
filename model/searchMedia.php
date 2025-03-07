<?php


$searchMedia = $_POST['searchMedia'].'%';
$bdd = new PDO('mysql:host=localhost;dbname=mediasmart;charset=utf8mb4', 'root', '');
$req = $bdd->prepare('SELECT * FROM media WHERE title LIKE :searchMedia');
$req->bindParam(':searchMedia', $searchMedia, PDO::PARAM_STR);
$req->execute();

echo json_encode($req->fetchAll(PDO::FETCH_ASSOC));