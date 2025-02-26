<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/scss/style.css">
</head>
<body>


    <div id="top-mobile">
        <figure>
            <img src="./assets/img/Group 7.png" alt="Logo" id="logo" style="height: 50px;">
        </figure>
        <a href="">
            <img src="./assets/img/menu.png" alt="" id="burger" style="height: 50px;">
        </a>
    </div>

    <nav id="burger-menu" style="display: none">
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Produits</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <div class="search">
        <input type="text" placeholder="Recherchez des produits" id="search-product">
        <label for="search-product"></label>
    </div>

                                                    <!-- PRODUIT EN VEDETEES -->

                                                    <?php if($_SESSION){
    echo "bonjour " . $_SESSION['first_name'];
    } ?>

    <section id="product">
        <h1>Produits en vedettes</h1>
        <div class="product-keyword">
            <ul class="list-keyword">
                <li>Tous</li>
                <li>Romans</li>
                <li>Science</li>
                <li>BD</li>
            </ul>
        </div>


        <?php foreach ($datas as $data): ?>
        <div class="flex">
            <div class="card-product">
                <div class="card">
                    
                    <img src="./assets/img/livre-cuisine-tout-en-pot-jean-pierre-dezavelle.webp" alt="">
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
            <div class="right-last-add">
                <div class="title-product-latest"><?php echo $data->getTitle(); ?></div>
                
                <div class="auteur-product-latest">De '<?php echo $data->getAuthor(); ?>'</div>

          
                <div class="rating">
                <input value="5" name="rate" id="star5" type="radio">
                <label title="text" for="star5"></label>
                <input value="4" name="rate" id="star4" type="radio">
                <label title="text" for="star4"></label>
                <input value="3" name="rate" id="star3" type="radio" checked="">
                <label title="text" for="star3"></label>
                <input value="2" name="rate" id="star2" type="radio">
                <label title="text" for="star2"></label>
                <input value="1" name="rate" id="star1" type="radio">
                <label title="text" for="star1"></label>
                </div>
                <div class="horizontal-lign">  </div>
                <div class="description-product-latest"><?php echo $data->getDescription(); ?></div>
                <!-- From Uiverse.io by LeonKohli -->
                    <!-- From Uiverse.io by andrew-demchenk0 --> 
               
                </div>
        </section>
    </section>


    <div id="bottom-nav">
    <ul class="bottom-nav-list">
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Catégories</a></li>
        <li><a href="#">Mon Compte</a></li>
        <li><a href="#">Panier</a></li>
    </ul>
    <button class="btn-add">
        <span>+</span>
    </button>
</div>






    <script src="main.js"></script>
</body>
</html>