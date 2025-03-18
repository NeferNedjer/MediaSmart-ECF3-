

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/scss/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>

<body>



    <section id="header-home">
        <div id="top-mobile">
            <figure>
                <img src="../assets/img/Group 46.png" alt="">
            </figure>
            <ul class="flex">
                <li><a href="/">Accueil</a></li>
                <li><a href="#">Catégorie</a></li>
                <li><a href="#"></a></li>
                <?php if (empty($_SESSION['name'])): ?>
                    <li><a id="connexion-home" href="login">Connexion</a></li>
                    <li><a id="connexion-home" href="/register">Inscription</a></li>
                <?php else: ?>
                    <li><a id="deconnexion-home" href="logout">Déconnexion</a></li>
                    <li><a id="connexion-home" href="/dashboardEmployee/0">Employee</a></li>
                    <li><a id="connexion-home" href="/dashboardMedia/0">Media</a></li>

                <?php endif; ?>
            </ul>

        </div>
        <div class="background-home">
            <div class="overlay">
                <p class="discover">Découvrez nos dernières nouveautés. <span>Découvrir plus.</span></p>
                <h1>Bienvenue sur Media Smart</h1>
                <div class="flex">
                    <button id="explore">Explorer nos livres</button>
                    <p>En savoir plus</p>



                </div>
            </div>
            <img src="../assets/img/header (2).jpg" alt="">
        </div>
    </section>

    <div id="sidebar">
        <button class="close-sidebar">X</button>
        <h2>Catégories</h2>
        <ul class="livre-categorie">
            <li class="category-header">Livres <span class="arrow">▼</span></li>
            <ul id="livre-cate">
                <li><a href="#">ROMAN</a></li>
                <li><a href="#">NOUVELLE</a></li>
                <li><a href="#">POLAR</a></li>
                <li><a href="#">FANTASTIQUE</a></li>
                <li><a href="#">FICTION</a></li>
                <li><a href="#">MANGA</a></li>
                <li><a href="#">BIOGRAPHIE</a></li>
                <li><a href="#">POESIE</a></li>
                <li><a href="#">ESSAI</a></li>
                <li><a href="#">CONTE ET LEGENDE</a></li>
                <li><a href="#">BANDE DESSINEE</a></li>
                <li><a href="#">JEUNESSE</a></li>
            </ul>

        </ul>

        <ul class="dvd-categorie">

            <li class="category-header-dvd">DVD <span class="arrow">▼</span></li>
            <ul id="dvd-cate">
                <li><a href="#">ACTION</a></li>
                <li><a href="#">AVENTURE</a></li>
                <li><a href="#">COMEDIE</a></li>
                <li><a href="#">DRAME</a></li>
                <li><a href="#">FANTASTIQUE</a></li>
                <li><a href="#">GUERRE</a></li>
                <li><a href="#">POLICIER</a></li>
                <li><a href="#">
                        SCIENCE FICTION</a></li>

            </ul>
        </ul>

        <div id="author-cate">
            <h3>Recherche par Auteur: <span class="arrow">▼</span></h3>
            <section class="author-hidden">
                <div class="checkbox-wrapper">
                    <label class="checkbox-label">
                        <input type="checkbox" name="Valérie Perrin">
                        <span class="checkbox-custom"></span>
                        <span class="label-text">Valérie Perrin</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="Anna Stuart">
                        <span class="checkbox-custom"></span>
                        <span class="label-text">Anna Stuart</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="Claire McGowan">
                        <span class="checkbox-custom"></span>
                        <span class="label-text">Claire McGowan</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="Xavier Poussard">
                        <span class="checkbox-custom"></span>
                        <span class="label-text">Xavier Poussard</span>
                    </label>
                </div>
            </section>
        </div>



        <section id="user-cate">
            <figure>
                <img src="../assets/img/icons8-nom-50.png" alt="">
                <p style="white-space :nowrap"><?php if (isset($_SESSION['first_name'])) {
                echo 'Bonjour '.$_SESSION['first_name'];
                            } else {
                                echo 'Bonjour visiteur';
                            } ?> </p>
            </figure>
            <figure>
            <a href="logout"><img id="logout-cate" src="../assets/img/icons8-logout-64.png" alt=""></a>
            
        </figure>
        </section>

    </div>


    <form action="/searchMediaHomepage" method="post" id="searchMediaHomepage">
        <div class="search">
            <input id="searchbar" type="text" name="searchMediaHomepage" placeholder="Recherchez un titre">
        </div>
        <button type="submit" id="search-button">

        </button>
    </form>

    <div id="show-cate"></div>

    <section class="response">
        <?php if (isset($mediaHome)) { ?>
            <?php foreach ($mediaHome as $media): ?>
                <a href="<?php echo $router->generate('getMedia', ['id_media' => $media->getId_media()]); ?>">
                    <p><?php echo $media->getTitle() ?></p>
                </a>

            <?php endforeach; ?>
        <?php } else { ?>
            <p>Aucun titre ne correspond à votre recherche.</p>
        <?php } ?>
    </section>

    <!-- PRODUIT EN VEDETEES -->



    <section id="product">

        <h1>Livre à la Une :</h1>
        
        <div class="carrousel-container">
            <div class="carrousel">
                <?php foreach ($datas as $data): ?>
                    <div class="carrousel-item"><img src="<?php echo $data->getImage_recto(); ?>" alt="<?php echo $data->getTitle() ?>"></div>
                <?php endforeach; ?>
            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>

        <h1>Disponible :</h1>


        <div class="carousel-product-container">
            <button class="carousel-prev">❮</button>
            <div class="flex-product">
                <?php foreach ($datas as $data): ?>
                    <div class="card-product">
                        <div class="card">

                            <a href="<?php echo $router->generate('getMedia', ['id_media' => $data->getId_media()]); ?>"><img src="<?php echo $data->getImage_recto(); ?>" alt=""></a>
                            <div class="title-product1"><?php echo $data->getTitle(); ?></div>
                            <div class="auteur-product1"><?php echo $data->getAuthor(); ?></div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-next">❯</button>
        </div>





        <!-- AJOUT RECENT -->
        <h1>Ajout récent :</h1>
        <section id="last-add">

            <?php foreach ($datas as $data): ?>
                <div class="cards-product title-product-latest">

                    <img src="<?php echo $data->getImage_recto(); ?>" alt="">

                </div>
                <div class="right">
                    <p class="title-product"><?php echo $data->getTitle(); ?></p>
                    <a href="">
                        <div class="auteur-product-latest">De <span> <?php echo $data->getAuthor(); ?> </span> (Auteur)</div>
                    </a>
                    <div class="horizontal-lign"> </div>
                    <div class="card description-product-latest"><?php echo $data->getDescription(); ?>

                    </div>
                </div>
                </div>

            <?php endforeach; ?>
        </section>


    </section>


    </section>




    <div id="bottom-nav">
        <ul class="bottom-nav-list">
            <li><a href="#"> <img src="./assets/img/home (2).png" alt="" height="20px">Accueil</a> </li>
            <li><a href="#"> Catégories</a></li>
            <li><a href="#"><img src="./assets/img/icons8-basket-64.png" alt="" height="20px">Panier</a></li>
            <li><a href="#"> <img src="./assets/img/icons8-user-50.png" alt="" height="20px">Mon Compte</a></li>
        </ul>
        <button class="btn-add">
            <span>+</span>
        </button>
    </div>

    <footer id="footer">
        <div class="footer-content">
            <div class="footer-section about">
                <h2 class="logo-text">MediaSmart</h2>
                <p>
                    MédiaSmart est votre destination ultime pour les meilleurs livres et produits technologiques. Nous nous engageons à fournir des produits de haute qualité et un service client exceptionnel.
                </p>
                <div class="contact">
                    <p>+123 456 789</p>
                    <p>info@mediasmart.com</p>
                </div>
                <div class="socials">

                </div>
            </div>
            <div class="footer-section links">
                <h2>Liens rapides</h2>
                <br>
                <ul>
                    <a href="#">
                        <li>Accueil</li>
                    </a>
                    <a href="#">
                        <li>Produits</li>
                    </a>
                    <a href="#">
                        <li>Contact</li>
                    </a>
                    <a href="#">
                        <li>Dashboard</li>
                    </a>
                </ul>
            </div>
            <div class="footer-section contact-form">
                <h2>Contactez-nous</h2>
                <br>
                <form action="#" method="post">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Votre email...">
                    <textarea name="message" class="text-input contact-input" placeholder="Votre message..."></textarea>
                    <button type="submit" class="btn btn-big">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>

    </footer>

    <script src="./assets/js/burger.js"></script>


    <script src="path-to-the-script/splide-extension-auto-scroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script src="../assets/js/ajaxMedia.js"></script>
    <script src="../assets/js/slider-home-dispo.js"></script>
    <script src="../assets/js/redirection-home.js"></script>
    <script src="../assets/js/category.js"></script>
    <script src="../assets/js/footer.js"></script>
    <script src="../assets/js/carrousel.js"></script>
</body>

</html>