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



    <div id="top-mobile">
        <figure>
            <img src="./assets/img/logo2.png
            " alt="Logo" id="logo" style="height: 150px;">
        </figure>

        <ul class="flex">

            <!-- EN FONCTION DE LA SESSION AFFICHER L'UN ou L'AUTRE -->
             
            <li><a id="deconnexion-home" href="logout">Déconnexion</a></li>
            <li><a id="connexion-home" href="login">Connexion</a></li>
            <li><a id="connexion-home" href="/dashboardEmployee/0">Employee</a></li>
            <li><a id="connexion-home" href="/dashboardMedia/0">Media</a></li>
            
        </ul>
        <a href="#">
            <img src="./assets/img/menu.png" alt="" id="burger" style="height: 50px;">
        </a>
    </div>

    <nav id="burger-menu" style="display:none">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/login">Connexion</a></li>
            <li><a href="/dashboardMedia/0">Media</a></li>
            <li><a href="/dashboardEmployee/0">Employee</a></li>
            <li><a id="deconnexion-home" href="logout">Déconnexion</a></li>
        </ul>
    </nav>

    <form action="" method="post" id="search_formMedia" >
                       
                        <input type="text" name="searchMedia"  placeholder="Recherchez des produits" id="search-product-dashboard">

                    </form>

                            <!-- PRODUIT EN VEDETEES -->

                                                    <?php if($_SESSION){
    echo "bonjour " . $_SESSION['first_name'];
    } ?>

    <section id="product">
        <h1>Livre à la Une</h1>
        <div class="product-keyword">
            <ul class="list-keyword">
                <li>Tous</li>
                <li>Romans</li>
                <li>Science</li>
                <li>BD</li>
                
            </ul>
        </div>
        <div class="carrousel-container">
            <div class="carrousel">
                <div class="carrousel-item"><img src="assets\img\livre1 recto la femme de ménage.jpg" alt="couverture du livre la femme de ménage"></div>
                <div class="carrousel-item"><img src="assets\img\livre recto 12.jpg" alt="livre de mélissa da costa"></div>
                <div class="carrousel-item"><img src="assets\img\livre3 recto.jpg" alt=""></div>
                <div class="carrousel-item"><img src="assets\img\livre4 recto.jpg" alt=""></div>
                <div class="carrousel-item"><img src="assets\img\livre5 recto.jpg" alt=""></div>
                <div class="carrousel-item"><img src="assets\img\livre6 recto.jpg" alt=""></div>
                <div class="carrousel-item"><img src="assets\img\livre7 recto.jpg" alt=""></div>
                <div class="carrousel-item"><img src="assets\img\livre8 recto.jpg" alt=""></div>
                <div class="carrousel-item"><img src="assets\img\livre harry potter recto.jpg" alt="livre d'harry potter et le prisonnier d'azkaban"></div>
                <div class="carrousel-item"><img src="assets\img\livre recto HG.jpg" alt=""></div>
            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>

        <?php foreach ($datas as $data): ?>
        <div class="flex-product">
            <div class="card-product">
                <div class="card">
                    
                    <img src="assets\img\livre1 recto la femme de ménage.jpg" alt="">
                    <div class="title-product"><?php echo $data->getTitle(); ?></div>
                    <div class="auteur-product"><?php echo $data->getAuthor(); ?></div>
                </div>
            </div>

            <div class="card-product">
                <div class="card">
                    <img src="assets\img\livre4 recto.jpg" alt="">
                    <div class="title-product"><?php echo $data->getTitle(); ?></div>
                    <div class="auteur-product"><?php echo $data->getAuthor(); ?></div>
                </div>
            </div>

            <div class="card-product">
                <div class="card">
                    <img src="./assets/img/livre-cuisine-tout-en-pot-jean-pierre-dezavelle.webp" alt="">
                    <div class="title-product"><?php echo $data->getTitle(); ?></div>
                    <div class="auteur-product"><?php echo $data->getAuthor(); ?></div>
                </div>
            </div>
        </div>
        
        <?php endforeach; ?>
                                                <!-- AJOUT RECENT -->

        <section id="last-add">
                
                <div class="card-product">
                    <h1>Ajout récent</h1>
                    <div class="card">
                        <img src="./assets/img/livre-cuisine-tout-en-pot-jean-pierre-dezavelle.webp" alt="">
                    </div>
                </div>
w
                    <div class="right-last-add">
                        <div class="title-product-latest"><?php echo $data->getTitle(); ?></div>
                        <div class="auteur-product-latest">De '<?php echo $data->getAuthor(); ?>'</div>

        
                      
                        <div class="horizontal-lign">  </div>
                        <div class="description-product-latest"><?php echo $data->getDescription(); ?></div>
                        </div>

                        <div class="card-product">
                    <h1>Ajout récent</h1>
                    <div class="card">
                        <img src="./assets/img/livre-cuisine-tout-en-pot-jean-pierre-dezavelle.webp" alt="">
                    </div>

                </div>

                    <div class="right-last-add">
                        <div class="title-product-latest"><?php echo $data->getTitle(); ?></div>
                        
                        <div class="auteur-product-latest">De '<?php echo $data->getAuthor(); ?>'</div>

                
                
                        <div class="horizontal-lign">  </div>
                        <div class="description-product-latest"><?php echo $data->getDescription(); ?></div>
                        </div>
        </section>
        </section>

        
    </section>

    


    <div id="bottom-nav">
    <ul class="bottom-nav-list">
        <li><a href="#"> <img src="./assets/img/home (2).png" alt="" height="20px">Accueil</a> </li>
        <li><a href="#"> Catégories</a></li>
        <li><a href="#"><img src="./assets/img/icons8-basket-64.png" alt="" height="20px">Panier</a></li>
        <li><a href="#" > <img src="./assets/img/icons8-user-50.png" alt="" height="20px">Mon Compte</a></li>
    </ul>
    <button class="btn-add">
        <span>+</span>
    </button>
</div>

    <script src="./assets/js/burger.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script src="../assets/js/ajaxMedia.js"></script>
    <script src="../assets/js/carrousel.js"></script>
</body>
</html>