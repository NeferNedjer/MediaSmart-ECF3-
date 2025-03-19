<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>détail Media</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link rel="icon" href="../assets/img/logoM.png">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
</head>
<body>
<div id="top-mobile">
        <figure>
            <img src="../assets/img/Group 46.png" alt="">
            
        </figure>

        <ul class="flex">

             <?php if(isset($_SESSION['id_user'])): ?>
            <li><a id="deconnexion-home" href="/logout">Déconnexion</a></li>
            <?php else: ?>
            <li><a id="connexion-home" href="/login">Connexion</a></li>
            <?php endif; ?>
        </ul>
        <a href="#">
            <img src="./assets/img/menu.png" alt="" id="burger" style="height: 50px;">
        </a>
    </div>


    
    <div id="top-hidden-resa-bar">
        <section id="btn-resa-hidden">
            <figure>
                <img src="../assets/img/Group 46.png" alt="">
             </figure> 
        <form action="/resaUser" method="POST">
            <input type="hidden" name="id_media" value="<?php echo $media->getId_media(); ?>">
            <button onclick="window.location.href = '#'" type="submit" id="resa-btn-hidden">
                Réserver maintenant
            </button>
        
            
          
            </form>
        </section>
        

        
    </div>


    <nav id="burger-menu" style="display:none">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="#">Media</a></li>
            <li><a href="#">Contact</a></li>
            <li><a id="deconnexion-home" href="/logout">Déconnexion</a></li>
        </ul>
    </nav>

    <div class="product-detail">
        <h1 id="product-title"><?php echo $media->getTitle() ?></h1>
        <div class="product-info">
            <img src="<?php echo $media->getImage_recto() ?>" alt="Couverture du Livre" id="product-image">
            
            <div class="product-meta">
                <p>Type: <?php echo $media->getName() ?></p>
                <p>Genre: <?php echo $media->getTheme() ?></p>
                <p id="product-author">De "<?php echo $media->getAuthor() ?>"</p>
                <p class="dispo-product">Diponibilité: <?php echo ($media->getNb_emprunts() + $media->getNb_resa() < $media->getNb_exemplaires()) ? "oui" : "non"; ?>
            </p>
                <div class="horizontal-lign"></div>
                <p id="product-description"><?php echo $media->getDescription() ?></p>
            
                
            </div>
            
        </div><br>
        
    </div>
    
    <div class="related-products">
    
        <h2>Produits liés</h2>
        
        <div class="swiper-container">
        
            <div class="swiper-wrapper"> 
            <?php foreach ($medias as $media): ?>
                <div class="swiper-slide">
                
                    <img src="<?php echo $media->getImage_recto(); ?>" alt="<?php echo $media->getTitle(); ?>">
                    <p><?php echo $media->getTitle(); ?></p>
                    
                </div>
            <?php endforeach; ?>    
            </div>
        
            <div class="swiper-pagination"></div>
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
           
    </div>
   

    <div id="bottom-nav">
    <ul class="bottom-nav-list">
        <li><a href="/"> <img src="../assets/img/home (2).png" alt="" height="20px">Accueil</a> </li>
        <li><a href="#"> Catégories</a></li>
        <li><a href="#"><img src="../assets/img/icons8-basket-64.png" alt="" height="20px">Panier</a></li>
        <li><a href="#" > <img src="../assets/img/icons8-user-50.png" alt="" height="20px">Mon Compte</a></li>
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
                    <a href="/"><li>Accueil</li></a>
                    <a href="#"><li>Media</li></a>
                    <a href="#"><li>Contact</li></a>
                    <?php if(isset($_SESSION['id_user'])): ?>
                    <a href="<?php echo $router->generate('dashboard-user', ['id_user' => $_SESSION['id_user']]); ?>"><li>Dashboard</li></a>
                    <?php else : ?>
                        <a href="/login">Connexion</a>
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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/js/slider-details.js"></script>
    <script src="../assets/js/detailProduct.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script src="../assets/js/burger.js"></script>
    <script src="../assets/js/footer.js"></script>
    
</body>
</html>