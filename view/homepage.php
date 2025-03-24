<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Smart</title>
    <link rel="icon" href="../assets/img/logoM.png">
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
                <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_employee'])): ?>
                    <li><a id="connexion-home" href="login">Connexion</a></li>
                    <li><a id="connexion-home" href="/register">Inscription</a></li>
                    <?php else: ?>
                    <?php if (!empty($_SESSION['id_user'])): ?>
                    <li><a id="deconnexion-home" href="logout">Déconnexion</a></li>
                    <li><a id="connexion-home" href="<?php echo $router->generate('dashboard-user', ['id_user' => $_SESSION['id_user']]); ?>">Tableau de bord</a></li>
                    
                    <?php elseif (!empty($_SESSION['id_employee'])): ?>
                    <li><a id="deconnexion-home" href="logout">Déconnexion</a></li>
                    <li><a id="connexion-home" href="/dashboardEmployee/0">Gestion des utilisateurs</a></li>
                    <li><a id="connexion-home" href="/dashboardMedia/0">Gestion des  médias</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>

        </div>
        <div class="background-home">
            <div class="overlay">
                <p class="discover">Découvrez nos dernières nouveautés. <span>Découvrir plus. </span></p>
                <h1>Bienvenue sur Media Smart</h1>
                <div class="flex">
                    <button id="explore">Explorer nos livres</button>
                    <p id="more">En savoir plus </p>




                </div>
            </div>
            <img src="../assets/img/header (2).jpg" alt="">
        </div>
    </section>

    <div class="menu-overlay">
    <div class="menu-content">
      <ul>
        <li><a href="<?php echo $router->generate('dashboard-user', ['id_user' => $_SESSION['id_user']]); ?>">Dashboard</a></li>

        <li class="redi-categorie"><a href="">Catégories</a></li>
        <li><a href="profile">Profil</a></li>
        <li class="redi-contact">Contact</li>

        <li><a href="/login">Connexion</a></li>
        <li><a href="/register">Inscription</a></li>
      </ul>
    </div>
  </div>

    <nav class="floating-nav" id="floating-nav">
        <div class="nav-content">
            <div class="nav-left">
                <a href="/" class="nav-logo">
                    <img src="../assets/img/Group 46.png" alt="Logo" height="40">
                </a>
            </div>

            <div class="nav-center">
                <form action="/searchMediaHomepage" method="post" id="searchMediaHomepage">
                    <div class="search">
                        <input id="searchbar" type="text" name="searchMediaHomepage" placeholder="Recherchez un titre">
                    </div>
                    <button type="submit" id="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="nav-right">
                <button id="burger-button" class="burger-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>


    <div id="sidebar">
        <button class="close-sidebar">X</button>
        <h2>Catégories</h2>

        <ul class="categories-list">
            <?php
            $mainCategories = $model->getMainCategories();
            foreach ($mainCategories as $category):
            ?>
                <li class="category-header" data-category="<?php echo $category->getId_category(); ?>">
                    <?php echo $category->getName(); ?> <span class="arrow">▼</span>
                    <ul class="subcategory-list hidden">
                        <?php
                        $subcategories = $model->getSubcategoriesByCategory($category->getId_category());
                        foreach ($subcategories as $subcategory):
                        ?>
                            <li class="subcategory-item">
                                <a href="#disponibilite-cate"
                                    data-category="<?php echo $category->getId_category(); ?>"
                                    data-subcategory="<?php echo $subcategory->getId_subcategory(); ?>">
                                    <?php echo $subcategory->getTheme(); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
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
            <div class="user-profile">
                <figure>
                    <img src="../assets/img/icons8-user-60.png" alt="">
                    <p><?php echo isset($_SESSION['first_name']) ? 'Bonjour ' . $_SESSION['first_name'] : 'Bonjour visiteur'; ?></p>
                </figure>
                <figure>
                    <a href="logout"><img id="logout-cate" src="../assets/img/icons8-logout-64.png" alt="Déconnexion"></a>
                </figure>
            </div>
        </section>





    </div>






    <!-- <form action="/searchMediaHomepage" method="post" id="searchMediaHomepage">
        <div class="search">
            <input id="searchbar" type="text" name="searchMediaHomepage" placeholder="Recherchez un titre">
        </div>
        <button type="submit" id="search-button">

        </button>
    </form> -->

    <div id="show-cate"></div>


    <section class="response" style="display:none">
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

        <h1>Média à la Une :</h1>

        <div class="carrousel-container">
            <div class="carrousel">
                <?php foreach ($datas as $data): ?>
                    <div class="carrousel-item"><a href="<?php echo $router->generate('getMedia', ['id_media' => $data->getId_media()]); ?>"><img src="<?php echo $data->getImage_recto(); ?>" alt="<?php echo $data->getTitle() ?>"></a></div>
                <?php endforeach; ?>
            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>




        <section id="disponibilite-cate">
            <h1>Disponible :</h1>


            <div class="carousel-product-container">
                <button class="carousel-prev">❮</button>
                <div class="flex-product">
                    <?php foreach ($datas as $data): ?>
                        <div class="card-product">
                            <div class="card">

                                <a href="<?php echo $router->generate('getMedia', ['id_media' => $data->getId_media()]); ?>"><img src="<?php echo $data->getImage_recto(); ?>" alt=""></a>
                                <div id="title-and-author">
                                    <div class="title-product1"><?php echo $data->getTitle(); ?></div>
                                    <div class="auteur-product1"><?php echo $data->getAuthor(); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-next">❯</button>
            </div>

        </section>



        <!-- AJOUT RECENT -->
        <h1>Ajout récent :</h1>
        <section id="last-add">

            <?php foreach ($datas as $data): ?>
                <div class="cards-product title-product-latest">

                    <a href="<?php echo $router->generate('getMedia', ['id_media' => $data->getId_media()]); ?>"><img src="<?php echo $data->getImage_recto(); ?>" alt=""></a>

                </div>
                <div class="right">
                    <a href="<?php echo $router->generate('getMedia', ['id_media' => $data->getId_media()]); ?>">
                        <p class="title-product"><?php echo $data->getTitle(); ?></p><br>
                    </a>
                    <div class="auteur-product-latest">De <span> <?php echo $data->getAuthor(); ?> </span> (Auteur)</div>

                    <div class="horizontal-lign"> </div>
                    <div class="description-product-latest"><?php echo $data->getDescription(); ?>

                    </div>
                </div>
                </div>

            <?php endforeach; ?>
        </section>


    </section>


    </section>




    <div id="bottom-nav">
        <ul class="bottom-nav-list">
            <li><a href="/"> <img src="./assets/img/home (2).png" alt="" height="20px">Accueil</a> </li>
            <li class="redi-categorie"> <img src="../assets/img/icons8-subfolder-24.png" alt=""> Catégories</a></li>
            <li><a href="#"><img src="./assets/img/icons8-basket-64.png" alt="" height="20px">Panier</a></li>
            <?php if (isset($_SESSION['id_user'])):  ?>
                <li><a href="<?php echo $router->generate('dashboard-user', ['id_user' => $_SESSION['id_user']]); ?>"> <img src="./assets/img/icons8-user-50.png" alt="" height="20px">Mon Compte</a></li>
            <?php else : ?>
                <li><a href="/login">Connexion</a></li>
            <?php endif;  ?>
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
                    <a href="/">
                        <li>Accueil</li>
                    </a>
                    <a href="#">
                        <li>Média</li>
                    </a>
                    <a href="#">
                        <li>Contact</li>
                    </a>
                    <?php if (isset($_SESSION['id_user'])):  ?>
                        <a href="<?php echo $router->generate('dashboard-user', ['id_user' => $_SESSION['id_user']]); ?>">
                            <li>Dashboard</li>
                        </a>
                    <?php else: ?>
                        <a href="/login">
                            <li>Connexion</li>
                        </a>
                    <?php endif; ?>
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



    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script src="../assets/js/searchHomeNav.js"></script>
    <script src="./assets/js/navBar.js"></script>
    <script src="/assets/js/burger.js"></script>


    <script src="path-to-the-script/splide-extension-auto-scroll.min.js"></script>
    <!-- <script src="../assets/js/ajaxMedia.js"></script> -->
    <script src="../assets/js/slider-home-dispo.js"></script>
    <script type="module" src="./assets/js/redirection-home.js"></script>
    <script src="../assets/js/category.js"></script>
    <script src="../assets/js/footer.js"></script>
    <script src="../assets/js/carrousel.js"></script>
</body>

</html>

