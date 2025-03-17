<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link href="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
" rel="stylesheet">

</head>

<body>
    <section id="side-bar-dash">
        <section id="navbar-left">
            <ul class="nav-menu">
                <li><a href="/"><img src="../assets/img/home-24.ico" alt=""><span>Home</span> </a></li>
                
             
                <li><a href="" target="_blank"><img src="../assets/img/inbox-24.ico" alt=""> <span> Mail</span></a></li>

               
                <li id="settings-dashboard"><a href=""><img src="../assets/img/settings-19-24.ico" alt=""> <span>Settings</span> </a></li>
                <li><a href="/logout"><img src="../assets/img/icons8-logout-25.png" alt=""> <span>Logout</span></a></li>
                <li>
                    <label class="switch">
                        <input checked="true" id="checkbox" type="checkbox" />
                        <span class="slider">
                            <div class="star star_1"></div>
                            <div class="star star_2"></div>
                            <div class="star star_3"></div>
                            <svg viewBox="0 0 16 16" class="cloud_1 cloud">
                                <path
                                    transform="matrix(.77976 0 0 .78395-299.99-418.63)"
                                    fill="#fff"
                                    d="m391.84 540.91c-.421-.329-.949-.524-1.523-.524-1.351 0-2.451 1.084-2.485 2.435-1.395.526-2.388 1.88-2.388 3.466 0 1.874 1.385 3.423 3.182 3.667v.034h12.73v-.006c1.775-.104 3.182-1.584 3.182-3.395 0-1.747-1.309-3.186-2.994-3.379.007-.106.011-.214.011-.322 0-2.707-2.271-4.901-5.072-4.901-2.073 0-3.856 1.202-4.643 2.925"></path>
                            </svg>
                        </span>
                    </label>
                </li>
            </ul>
        </section>

        <section id="dashboard-user">
            <section id="grid-dash-user">
                <div id="top-carousel">
                    <section class="splide" aria-label="">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php foreach ($medias as $media): ?>
                                <li class="splide__slide">
                                
                                    <figure><img src="<?php echo $media->getImage_recto(); ?>" alt="">
                                        <figcaption><?php echo $media->getTitle(); ?></figcaption>
                                    </figure>
                                </li>
                               <?php endforeach; ?>

                            </ul>
                            <h1>Les livres les plus empruntés</h1>
                        </div>
                    </section>

                </div>
                <div id="infos-media">
                    <figure>
                        <img src="<?php echo $lastmedia->getImage_recto(); ?>" alt="">
                    </figure>
                    <p class="title-infos"><?php echo $lastmedia->getTitle(); ?></p>
                    <p class="auteur-infos"><?php echo $lastmedia->getAuthor(); ?></p>


                    <p class="description">Dans une petite ville côtière oubliée du temps, Clara, une jeune historienne, arrive pour découvrir les secrets enfouis d'une ancienne famille aristocratique. Lorsqu'elle tombe sur un vieux journal intime, des événements mystérieux, liés à une disparition vieille de plusieurs décennies, refont surface.</p>
                    <button onclick="window.location.href = '#'" type="button" id="btn-resa-dash">
                        Réserver maintenant
                    </button>
                </div>


                <div id="emprunt-resa">
    <section id="grid-user-emprunt">
        <section class="emprunt-user">
            <h2>Vos Emprunts</h2>
            <div class="emprunt-lists">
                <?php foreach($emprunts as $emprunt): ?>
                <ul class="emprunt-header">  
                    <li>MEDIA</li>
                    <li>EXEMPLAIRE</li>
                    <li>TITRE</li>
                    <li>DATE D'EMPRUNT</li>
                    <li>DATE DE RETOUR</li>
                </ul>
                <ul class="emprunt-data">
                    <li><?php echo $emprunt->getId_media(); ?></li>
                    <li><?php echo $emprunt->getId_exemplaire(); ?></li>
                    <li><?php echo $emprunt->getTitle(); ?></li>
                    <li><?php echo $emprunt->getEmprunt_date()->format('d/m/y') ?></li>
                    <li><?php echo $emprunt->getMax_return_date()->format('d/m/y'); ?></li>
                </ul>
                
            </div>
        </section>
        <section class="resa-user">
            <h2>Vos Réservations</h2>
            <div class="resa-lists">
                <ul class="resa-header">
                    <li>ID MEDIA</li>
                    <li>ID EXEMPLAIRE</li>
                    <li>TITRE</li>
                    <li>DATE DE LA DEMANDE</li>
                    <li>STATUT</li>
                </ul>
                <ul class="resa-data">
                    <li><?php echo $emprunt->getId_media(); ?></li>
                    <li><?php echo $emprunt->getId_exemplaire(); ?></li>
                    <li><?php echo $emprunt->getTitle(); ?></li>
                    <li><?php echo $emprunt->getEmprunt_date()->format('d/m/y') ?></li>
                    <li><?php echo $emprunt->getResa() ?></li>
                </ul>
                <?php endforeach;  ?>
            </div>


        
        </section>
    </section>
</div>


            </section>


        </section>

        <script src="../assets/js/theme-toggle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
        <script src="../assets/js/slider.js"></script>

</body>

</html>