<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Employee</title>
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
                <li><a href="/"><img src="../assets/img/home-24.ico" alt=""><span>Home</span> </a></li>
                <li><a href="media-create"><img src="../assets/img/icons8-add-25.png" alt=""><span>Ajouter un média</span></a></li>
                <li><a href="https://mailtrap.io/inboxes/3460695/messages/4762720767" target="_blank"><img src="../assets/img/inbox-24.ico" alt=""> <span> Mail</span></a></li>
                <li><a href="/dashboardEmployee/0"><img src="../assets/img/conference-24.ico" alt=""><span>Gestion Utilisateurs</span> </a></li>
                <li><a href="/dashboardMedia/0"> <img src="../assets/img/icons8-book-30.png" alt=""><span>Gestion Medias</span> </a></li>
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
        <section id="dashboard">
            <section id="grid-user-gestion">
                <section id="left-grid">
                    <h1>Gestion des Utilisateurs</h1>


                    <form action="" method="post" id="search_formEmployee" >
                        <label for="searchEmployee">Rechercher un utilisateur :</label>
                        <input type="text" name="searchEmployee" id="searchEmployee">
                    </form>


                    <button class="btn-add-user">
                        <span>+</span>
                    </button>

                    <div class="user-container">
                        <ul class="user-gestion-list">
                            <li>id</li>
                            <li>Name</li>
                            <li>Date</li>
                            <li>Livre non retourné</li>

                        </ul>
                    </div>

                    <?php foreach ($datas as $data): ?>
                        <a href="<?php echo $router->generate('getUser', ['id' => $data->getId_user()]); ?>" id="responseEmployee"></a>
                        <div class="user-row">
                            <div class="user-dashboard">

                                <a href="<?php echo $router->generate('dashboard-employee', ['id_user' => $data->getId_user()]); ?>">
                                    <p class="id-user-dashboard"><?php echo $data->getId_user() ?></p>
                                </a>




                                <p class="name-dashboard"><?php echo $data->getName() ?> <?php echo $data->getFirst_name() ?></p>
                                <p class="date-dashboard"><?php echo $data->getLast_connexion()->format('d/m/y') ?></p>
                                <p class="livre-non"><?php if (null !== $data->getNb_outdated_emprunt()): ?>
                                        <?php echo $data->getNb_outdated_emprunt(); ?>
                                    <?php else: ?>
                                        0
                                    <?php endif; ?></p>
                                <a href="<?php echo $router->generate('getUser', ['id' => $data->getId_user()]); ?>"><button type="submit" id="more-dashboard">More</button></a>

                                <a href="<?php echo $router->generate('modif-user', ['id_user' => $data->getId_user()]); ?>"><img id="edit-user" src="../assets/img/icons8-orange-edit-50 (1).png" alt=""></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
                <section id="right-grid">

                    <div class="<?php echo ($id_user == 0) ? 'activity-visible' : 'activity-hidden'; ?>">
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
                                            <td><?php echo $emprunt->getEmprunt_date()->format('d/m/y') ?></td>
                                            <td><?php echo $emprunt->getMax_return_date()->format('d/m/y') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="<?php echo ($id_user > 0) ? 'activity-visible' : 'activity-hidden'; ?>">
                        <div class="gestion-user" role="region" tabindex="0">
                            <table>
                                <caption>Emprunts de l'utilisateur</caption>
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
                                    <?php foreach ($empruntsuser as $dataM): ?>
                                        <tr>
                                            <td><?php echo $dataM->getId_media() ?></td>
                                            <td><?php echo $dataM->getTitle() ?></td>
                                            <td><?php echo $dataM->getStatus() ?></td>
                                            <td><?php echo $dataM->getEmprunt_date()->format('d/m/y') ?></td>
                                            <td><?php echo $dataM->getMax_return_date()->format('d/m/y') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </section>
        </section>

        <div class="form-container" id="form-container" style="display :none"> 

        <form action="/createEmployee" method="POST" id="employee-form">
            <h2 class="text-center" id="form-title">Création d'un Employé</h2>
            
            <div class="form-group" id="name-group">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" name="name" id="name" class="form-input" placeholder="Entrez le nom" required>
            </div>

            <div class="form-group" id="first-name-group">
                <label for="first_name" class="form-label">Prénom :</label>
                <input type="text" name="first_name" id="first_name" class="form-input" placeholder="Entrez le prénom" required>
            </div>

            <div class="form-group" id="password-group">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-input" placeholder="Entrez le mot de passe" required>
            </div>

            <div class="form-group" id="confpassword-group">
                <label for="confpassword" class="form-label">Confirmez le mot de passe :</label>
                <input type="password" name="confpassword" id="confpassword" class="form-input" placeholder="Confirmez le mot de passe" required>
                <span id="password-error" class="error-message"></span>
            </div>

            <div class="form-group submit-btn" id="submit-btn-group">
                <input type="submit" value="Valider" id="submit-btn" class="submit-input">
                
            </div>
        </form>
    </div>

        <form action="<?php echo $router->generate('update-user');  ?>" method="POST" id="edit-form">


            <input type="hidden" name="id_user" value="<?php echo $data->getId_user(); ?>">

            <label for="name_user">Nom :</label>
            <input type="text" name="name_user" id="name_user" value="<?php echo $data->getName(); ?>" required>

            <label for="first_name_user">Prénom :</label>
            <input type="text" name="first_name_user" id="first_name_user" value="<?php echo $data->getFirst_name(); ?>" required>


            <div class="flex-product">
                <div class="input-group">
                    <label for="adress">Adresse :</label>
                    <input type="text" name="adress" id="adress" value="<?php echo $data->getAdress(); ?>" required>
                </div>

                <div class="input-group">
                    <label for="phone">Téléphone :</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $data->getPhone(); ?>" required>
                </div>
            </div>

            <label for="email">Email :</label>
            <input type="text" name="email" id="email" value="<?php echo $data->getEmail(); ?>" required>

            <label for="statut">Statut :</label>
            <input type="number" id="statut" name="statut" value="<?php echo $data->getStatut(); ?>">

            <div class="edit-flex">
                <a href="/update"><input class="modifier" type="submit" name="update" value="Enregistrer les modifs"></a>
                <a href="/update"><input id="supprimer" class="supprimer" type="submit" name="delete" value="Supprimer"></a>
                <a href="/update"><input id="annuler" type="submit" name="retour" value="Retour"></a>
            </div>
        </form>


    </section>



    <script src="./../assets/js/dashboard.js"></script>


    <script src="../assets/js/ajaxEmployee.js"></script>
</body>

</html>