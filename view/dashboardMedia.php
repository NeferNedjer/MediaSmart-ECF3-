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
            <li><a href="/"><img src="../assets/img/home-24.ico" alt=""><span>Home</span> </a></li>
                <li><a href="media-create"><img src="../assets/img/icons8-add-25.png" alt=""><span>Ajouter un média</span></a></li>
                <li><a href="#"><img src="../assets/img/inbox-24.ico" alt=""> <span> Inbox</span></a></li>
                <li><a href="/dashboardEmployee/0"><img src="../assets/img/conference-24.ico" alt=""><span>Gestion Utilisateurs</span> </a></li>
                <li><a href="/dashboardMedia/0"> <img src="../assets/img/icons8-book-30.png" alt=""><span>Gestion Medias</span> </a></li>
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
                    <button class="btn-add-dashboard">
                        <span>+</span>
                    </button>
                    <form action="" method="post" id="search_formMedia" >
                       
                        <input type="text" name="searchMedia"  placeholder="Recherchez des produits" id="search-product-dashboard">

                    </form>
                    
                    <div class="user-container">
                        <ul class="user-gestion-list">
                            <li>ID MEDIA</li>
                            <li>CATEGORIES</li>
                            <li>GENRE</li>
                            <li>TITRE</li>  
                        </ul>
                    </div>


                    <?php foreach ($datas as $data): ?>
                        <a href="" id="responseMedia"></a>


                        <div class="user-row">
                            <div class="user-dashboard">
                            
                            <a href="<?php echo $router->generate('dashboard-media', ['id_media' => $data->getId_media()]); ?>">
                                <p class="id-user-dashboard"><?php echo $data->getId_media() ?></p>
                                </a>
                                <p class="date-dashboard"><?php echo $data->getName() ?></p>
                                <p class="livre-non"><?php echo $data->getTheme() ?></p>
                                <p class="name-dashboard"><?php echo $data->getTitle() ?></p>

                                
                                
                                <button type="submit" id="more-dashboard">More</button>
                                <img src="../assets/img/icons8-orange-edit-50 (1).png" alt="" style="height: 25px;">
                               
                                    
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
                <section id="right-grid">


                    <div class="<?php echo ($id_media == 0) ? 'activity-visible' : 'activity-hidden'; ?>">
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
              

                    

                    <div class="<?php echo ($id_media > 0) ? 'activity-visible' : 'activity-hidden'; ?>">

                        <div class="gestion-user" role="region" tabindex="0">
                            <table>
                            <?php $first = 1; ?>
                            <?php foreach ($exemplairemedia as $exemplaire): ?>
                                <?php if ($first == 1) {; ?>
                                <caption>Exemplaires du <?php echo ucfirst(strtolower($data->getName())).' : '.$data->getTitle() ?> </caption>
                                <br>
                                <caption>Disponibilités :  <?php echo ($exemplaire->getNb_exemplaires()-$exemplaire->getNb_emprunts()-$exemplaire->getNb_resa()).' / '. $exemplaire->getNb_exemplaires() ?> </caption>
                                <thead>
                                    <tr>
                                        <th>ID EXEMPLAIRE</th>
                                        <th>ETAT</th>
                                        <th>DATE DE CREATION</th>
                                        <th>DISPO</th>
                                        <th>NOM EMPRUNTEUR</th>
                                    </tr>
                                </thead>
                                <?php } ; 
                                $first ++;
                                ?>
                                <tbody>
                                    <!-- <.... foreach ($exemplairemedia as $exemplaire): ?> -->
                                        <tr>
                                            <td><?php echo $exemplaire->getId_exemplaire() ?></td>
                                            <td><?php if ($exemplaire->getStatus()==1) {echo 'Neuf';} elseif ($exemplaire->getStatus()==2) {echo 'Bon';} elseif ($exemplaire->getStatus()==3) {echo 'Mauvais';} elseif ($exemplaire->getStatus()==4) {echo 'Déchiré';} elseif ($exemplaire->getStatus()==5) {echo 'A JETER !';}  ?></td>
                                            <td><?php echo $exemplaire->getCreation_date()->format('d/m/y') ?></td>
                                            <td><?php if ($exemplaire->getResa()==1) {echo 'Réservé';} elseif ($exemplaire->getResa()==0) {echo 'Emprunté';} else {echo 'Disponible';}  ?></td>
                                            <td><?php echo $exemplaire->getUser_name() ?></td>
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

    

      <form action="mediasmart/media/create" method="POST" enctype="multipart/form-data" id="form-create-media" class="media-form" style="display: none;">
                <h2 class="form-title">Ajouter un nouveau média</h2>
                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="id_author">Auteur :</label>
                    <input type="text" name="id_author" id="id_author" class="form-select">

                </div>

                <div class="form-group category-group">
                    <label class="group-label">Catégorie :</label>
                    <div class="radio-container">
                        <?php foreach ($categories as $category): ?>
                            <div class="radio-item">
                                <input type="radio" name="id_category" id="id_category_<?php echo $category->getId_category(); ?>" value="<?php echo $category->getId_category(); ?>" class="radio-input">
                                <label for="id_category_<?php echo $category->getId_category(); ?>" class="radio-label"><?php echo $category->getName(); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_subcategory">Genre :</label>
                    <select name="id_subcategory" id="id_subcategory" class="form-select">
                        <option value="">Sélectionner un genre</option>
                        <?php foreach ($subcategories as $subcategory): ?>
                            <option value="<?php echo $subcategory->getId_subcategory(); ?>" data-category-id="<?php echo $subcategory->getId_category(); ?>"><?php echo $subcategory->getTheme(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea name="description" id="description" class="form-textarea" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image" class="file-label">Image :</label>
                    <div class="file-upload">
                        <input type="file" name="image" id="image" class="file-input" required>
                        <span class="file-custom">Choisir un fichier</span>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">Créer</button>
                </div>
            </form>




    <script src="../assets/js/ajaxMedia.js"></script>
    <script src="../assets/js/newmedia.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>