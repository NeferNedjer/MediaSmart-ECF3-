<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Media</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- <header>
        <nav>

           <?php if ($_SESSION) {
                echo "Bonjour" . $_SESSION['first_name'];
            } ?> 
            <a href="/media-create">Créer un média</a>
            <a href="/createEmployee">créer un employée</a>
        </nav>
    </header> -->
    <section id="side-bar-dash">
        <section id="navbar-left">
            <ul class="nav-menu">
                <li><a href=""><img src="../assets/img/home-24.ico" alt=""><span>Home</span>  </a></li>
                <li><a href="media-create"><img src="../assets/img/icons8-add-25.png" alt=""><span>Ajouter un média</span></a></li>
                <li><a href="#"><img src="../assets/img/inbox-24.ico" alt=""> <span> Inbox</span></a></li>
                <li><a href=""><img src="../assets/img/conference-24.ico" alt=""><span>Gestion Utilisateurs</span>  </a></li>
                <li><a href="#"> <img src="../assets/img/icons8-book-30.png" alt=""><span>Gestion Medias</span> </a></li>
                <li id="settings-dashboard"><a href=""><img src="../assets/img/settings-19-24.ico" alt=""> <span>Settings</span> </a></li>
                <li><a href="#"><img src="../assets/img/icons8-logout-25.png" alt=""> <span>Logout</span></a></li>
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
        <section id="dashboard">
            <section id="grid-user-gestion">
                <section id="left-grid">
                    <h1>Gestion des Medias</h1>
                    <form action="" method="post" id="search_formMedia" >
                        <label for="searchMedia">Rechercher un média :</label>
                        <input type="text" name="searchMedia" id="searchMedia">
                    </form>
                    <div id="responseMedia" >
                        <ul></ul>
                    </div>
                    <div class="user-container">
                        <ul class="user-gestion-list">
                            <li>id</li>
                            <li>Categorie</li>
                            <li>Sous Categorie</li>
                            <li>titre</li>  
                        </ul>
                    </div>
                    <?php foreach ($datas as $data): ?>
                        <div class="user-row">
                            <div class="user-dashboard">
                            
                            <a href="<?php echo $router->generate('dashboard-media', ['id_media' => $data->getId_media()]); ?>">
                                <p class="id-user-dashboard"><?php echo $data->getId_media() ?></p>
                                </a>
                                <p class="date-dashboard"><?php echo $data->getName() ?></p>
                                <p class="livre-non"><?php echo $data->getId_subcategory() ?></p>
                                <p class="name-dashboard"><?php echo $data->getTitle() ?></p>
                                <button type="submit" id="more-dashboard">More</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
                <section id="right-grid">
              
                    <div class="<?php echo ($id_media == 0) ? 'activity-visible' : 'activity-hidden'; ?>">
                        <div class="gestion-user" role="region" tabindex="0">
                            <table>
                                <caption>Derniers Medias</caption>
                                <thead>
                                    <tr>
                                        <th>ID MEDIA</th>
                                        <th>CATEGORIE</th>
                                        <th>SOUS CATEGORIE</th>
                                        <th>TITRE</th>
                                        <th>NOMBRE EXEMPLAIRES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datas as $data): ?>
                                        <tr>
                                            <td><?php echo $data->getId_media() ?></td>
                                            <td><?php echo $data->getName() ?></td>
                                            <td></td>
                                            <td><?php echo $data->getTitle() ?></td>
                                            <td></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="<?php echo ($id_media > 0) ? 'activity-visible' : 'activity-hidden'; ?>">
                        <div class="gestion-user" role="region" tabindex="0">
                            <table>
                                <caption>Exemplaires du média :<?php echo $data->getTitle() ?> </caption>
                                <thead>
                                    <tr>
                                        <th>ID EXEMPLAIRE</th>
                                        <th>ETAT</th>
                                        <th>DATE DE CREATION</th>
                                        <th>DISPO</th>
                                        <th>NOM EMPRUNTEUR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($exemplaires as $exemplaire): ?>
                                        <tr>
                                            <td><?php echo $exemplaire->getId_exemplaire() ?></td>
                                            <td><?php echo $exemplaire->getStatus() ?></td>
                                            <td><?php echo $exemplaire->getCreation_date()->format('d/m/y') ?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </section>
    <script src="../assets/js/ajaxMedia.js"></script>
</body>
</html>