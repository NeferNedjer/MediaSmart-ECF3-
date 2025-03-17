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
            <img src="../assets/img/Group 46.png" alt="">
            
        </figure>

        <ul class="flex">
            

            <!-- EN FONCTION DE LA SESSION AFFICHER L'UN ou L'AUTRE -->
            <?php if(empty($_SESSION['name'])): ?>
            <li><a id="connexion-home" href="login">Connexion</a></li>
            <li><a id="connexion-home" href="/register">Inscription</a></li>
            <?php else: ?>
            <li><a id="deconnexion-home" href="logout">Déconnexion</a></li>
            <li><a id="connexion-home" href="<?php echo $router->generate('dashboard-user', ['id_user' => $_SESSION['id_user']]); ?>">User</a></li>
            <li><a id="connexion-home" href="/dashboardEmployee/0">Employee</a></li>
            <li><a id="connexion-home" href="/dashboardMedia/0">Media</a></li>
            <?php endif;  ?>
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

    <form action="/searchMediaHomepage" method="post" id="searchMediaHomepage" >
                       
        <input id="searchbar" type="text" name="searchMediaHomepage"  placeholder="Recherchez un titre" >
        <input id="btn" type="submit" value="chercher">
    </form>

    <section class="response">
        <?php if(isset($mediaHome)) { ?>
        <?php foreach ($mediaHome as $media): ?>
            <a href="<?php echo $router->generate('getMedia', ['id_media' => $media->getId_media()]); ?>"><p><?php echo $media->getTitle() ?></p></a>
            
        <?php endforeach; ?>
        <?php }else { ?>
            <p>Aucun titre ne correspond à votre recherche.</p>
        <?php } ?>
    </section>

                            <!-- PRODUIT EN VEDETEES -->

                                                    <?php if($_SESSION){
    echo "bonjour " . $_SESSION['first_name'];
    } ?>

    <section id="product">
        <h1>Livre à la Une :</h1>
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
            <?php foreach ($datas as $data): ?>
                <div class="carrousel-item"><img src="<?php echo $data->getImage_recto(); ?>" alt="<?php echo $data->getTitle() ?>"></div>
            <?php endforeach; ?>  
            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>

        <h1>Disponible :</h1>
        <div class="flex-product">
            <?php foreach ($datas as $data): ?>
            <div class="card-product">
                <div class="card">
                    
                    <a href="<?php echo $router->generate('getMedia', ['id_media' => $data->getId_media()]); ?>"><img src="<?php echo $data->getImage_recto(); ?>" alt=""></a>
                    <div class="title-product"><?php echo $data->getTitle(); ?></div></a>
                    <div class="auteur-product"><?php echo $data->getAuthor(); ?></div>
                </div>
            </div>
            <?php endforeach; ?>
         
        </div>
        
        
                                                <!-- AJOUT RECENT -->
        <h1>Ajout récent :</h1>
        <section id="last-add">
                <?php foreach ($datas as $data): ?>
                <div class="card-product title-product-latest">
                    <p><?php echo $data->getTitle(); ?><br><br></p>
                    <img src="<?php echo $data->getImage_recto(); ?>" alt="<?php echo $data->getTitle() ?>">
                </div>
                
                    <div class="card description-product-latest"><?php echo $data->getDescription(); ?>
                    <div class="auteur-product-latest"><?php echo $data->getAuthor(); ?></div>
                </div>
                    
                
               
                
<!--                        
                    <div class="right-last-add">
                        <div class="title-product-latest"><?php //echo $data->getTitle(); ?></div>
                        <div class="auteur-product-latest">De '<?php //echo $data->getAuthor(); ?>'</div>

        
                      
                        <div class="horizontal-lign">  </div>
                        <div class="description-product-latest"><?php //echo $data->getDescription(); ?></div>
                        </div>

                        <div class="card-product">
                    <h1>Ajout récent</h1>
                    <div class="card">
                        <img src="./assets/img/livre-cuisine-tout-en-pot-jean-pierre-dezavelle.webp" alt="">
                    </div> -->
                    

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