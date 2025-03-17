<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail Product</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
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

            <!-- EN FONCTION DE LA SESSION AFFICHER L'UN ou L'AUTRE -->
             
            <li><a id="deconnexion-home" href="logout">Déconnexion</a></li>
            <li><a id="connexion-home" href="login">Connexion</a></li>
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
            <button type="submit" id="resa-btn-hidden">Réserver</button>
            <button type="submit" id="emprunt-btn-hidden">Emprunter</button>
        </section>
        

        
    </div>


    <nav id="burger-menu" style="display:none">
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Produits</a></li>
            <li><a href="#">Contact</a></li>
            <li><a id="deconnexion-home" href="logout">Déconnexion</a></li>
        </ul>
    </nav>

    <div class="search">
        <input type="text" placeholder="Recherchez des produits" id="search-product">
        <label for="search-product"></label>
    </div>

   

    <div class="product-detail">
        <h1 id="product-title">Titre</h1>
        <div class="product-info">
            <img src="../assets/img//Firefly génère moi des images de couverture de livre différente , merci 83764.jpg" alt="Couverture du Livre" id="product-image">
            
            <div class="product-meta">
                <p>Type:</p>
                <p>Genre:</p>
                <p id="product-author">De " "</p>
                <p class="dispo-product">Diponibilité: Oui</p>
                <div class="horizontal-lign"></div>
                <p id="product-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur voluptatem minima, debitis sapiente magnam nihil dolorem tempora et ad velit. Est ea exercitationem, quod saepe architecto veritatis maiores labore assumenda earum provident sint, repellat beatae ipsam quaerat qui ad, odio repellendus asperiores dolor neque amet! Qui voluptatum inventore accusamus sint.</p>
            

            </div>
        </div>
    </div>

    <div class="related-products">
        <h2>Produits liés</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                
                <div class="swiper-slide">
                    <img src="../assets/img/Firefly Génère une image illustrant PHP, un langage de programmation web backend, en mettant en avan (1).jpg" alt="Book 1">
                    <p>Titre du Livre 1</p>
                </div>
                <div class="swiper-slide">
                    <img src="../assets/img/Firefly génère moi des images de couverture de livre différente , merci 99256.jpg" alt="Book 2">
                    <p>Titre du Livre 2</p>
                </div>
                <div class="swiper-slide">
                    <img src="../assets/img/Firefly génère moi des images de couverture de livre différente , merci 75358.jpg" alt="Book 3">
                    <p>Titre du Livre 3</p>
                </div>
                <div class="swiper-slide">
                    <img src="../assets/img/Firefly génère moi des images de couverture de livre différente , merci 99256.jpg" alt="Book 2">
                    <p>Titre du Livre 2</p>
                </div>
                <div class="swiper-slide">
                    <img src="../assets/img/Firefly génère moi des images de couverture de livre différente , merci 99256.jpg" alt="Book 2">
                    <p>Titre du Livre 2</p>
                </div>
                
            </div>
            
            <div class="swiper-pagination"></div>
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>


    <div id="bottom-nav">
    <ul class="bottom-nav-list">
        <li><a href="#"> <img src="../assets/img/home (2).png" alt="" height="20px">Accueil</a> </li>
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
                    <a href="#"><li>Accueil</li></a>
                    <a href="#"><li>Produits</li></a>
                    <a href="#"><li>Contact</li></a>
                    <a href="#"><li>Dashboard</li></a>
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
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    
    <script src="../assets/js/burger.js"></script>
    <script src="../assets/js/footer.js"></script>
    
</body>
</html>