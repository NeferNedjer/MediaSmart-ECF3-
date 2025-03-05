<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Employee</title>
    <link rel="stylesheet" href="./assets/scss/style.css">
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
                <li><a href="#"><img src="../assets/img/conference-24.ico" alt=""><span>Gestion Utilisateurs</span>  </a></li>
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
                    <h1>Gestion des Utilisateurs</h1>
                    <div class="user-container">
                        <ul class="user-gestion-list">
                            <li>id</li>
                            <li>Name</li>
                            <li>Date</li>
                            <li>Livre non retourné</li>
                            
                        </ul>
                    </div>

                    <?php foreach ($datas as $data): ?>
                        <div class="user-row">
                            <div class="user-dashboard">
                                <p class="id-user-dashboard"><?php echo $data->getId_user() ?></p>
                                <p class="name-dashboard"><?php echo $data->getName() ?> <?php echo $data->getFirst_name() ?></p>
                                <p class="date-dashboard"><?php echo $data->getLast_connexion()->format('d/m/y') ?></p>
                                <p class="livre-non"><?php if (null !== $data->getNb_outdated_emprunt()): ?>
                                    <?php echo $data->getNb_outdated_emprunt(); ?>
                                    <?php else: ?>
                                              0
                                    <?php endif; ?></p>
                                <a href="<?php echo $router->generate('getUser', ['id' => $data->getId_user()]); ?>"><button type="submit" id="more-dashboard">More</button></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
                <section id="right-grid">
                    
                    <div class="activity-visible">
                        <div class="gestion-user" role="region" tabindex="0">
                            <table>
                                <caption>Dernier emprunt</caption>
                                <thead>
                                    <tr>
                                        <th>NOM UTILISATEUR</th>
                                        <th>CATEGORIE</th>
                                        <th>TITRE</th>
                                        <th>DATE EMPRUNT</th>
                                        <th>DATE RETOUR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($emprunts as $emprunt): ?>
                                        <tr>
                                            <td><?php echo $emprunt->getUser_name() ?> <?php echo $emprunt->getUser_first_name() ?></td>
                                            <td><?php echo $emprunt->getName() ?></td>
                                            <td><?php echo $emprunt->getTitle() ?></td>
                                            <td><?php echo $emprunt->getEmprunt_date()->format('d/m/y')?></td>
                                            <td><?php echo $emprunt->getMax_return_date()->format('d/m/y') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="activity-hidden">
                        <div class="gestion-user" role="region" tabindex="0">
                            <table>
                                <caption>Activité de l'utilisateur</caption>
                                <thead>
                                    <tr>
                                        <th>ID MEDIA</th>
                                        <th>TITRE</th>
                                        <th>ETAT A L'EMPRUNT</th>
                                        <th>DATE D'EMPRUNT</th>
                                        <th>DATE DE RETOUR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datas as $data): ?>
                                        <tr>
                                            <td><a href="<?php echo $router->generate('getUser', ['id' => $data->getId_user()]); ?>"><?php echo $data->getName() ?> <?php echo $data->getFirst_name() ?></a></td>
                                            <td></td>
                                            <td></td>
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

    <script src="../assets/js/dashboard.js"></script>


</body>

</html>