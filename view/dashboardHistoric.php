<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historic Dashboard</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
</head>

<body>
    <section id="side-bar-dash">
        <section id="navbar-left">
            <ul class="nav-menu">
                <li><a href="/"><img src="../assets/img/home-24.ico" alt=""><span>Home</span> </a></li>
                <li><a href="media-create"><img src="../assets/img/icons8-add-25.png" alt=""><span>Ajouter un média</span></a></li>
                <li><a href="https://mailtrap.io/inboxes/3460695/messages/4762720767" target="_blank"><img src="../assets/img/inbox-24.ico" alt=""> <span> Mail</span></a></li>
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
            <!DOCTYPE html>
            <html lang="fr">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Dashboard Admin - Historique Bibliothèque</title>
            </head>

            <body>
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <div class="flex">
                            <h2>Historique:</h2>
                                
                                    <label for="search" name="search-historic-user"></label>
                                    <input type="text" name="search-historic-user" placeholder="Rechercher un utilisateur" id="search-historic-user">
                                </div>
                        </div>
                        <div class="card-body">
                            <table id="historique-table">
                                <thead>
                                    <tr>
                                        <th data-sort="id_user">Utilisateur</th>
                                        <th data-sort="titre">Titre du média</th>
                                        <th data-sort="exemplaire">Exemplaire</th>
                                        <th data-sort="categorie">Catégorie</th>
                                        <th data-sort="sousCategorie">Sous-catégorie</th>
                                        <th data-sort="date">Date</th>
                                        <th data-sort="type">Emprunt/Retour</th>
                                        <th data-sort="status">Status</th>
                                    </tr>
                                </thead>
                                <?php if (!empty($historics) && is_array($historics)): ?>
                                <?php foreach ($historics as $histo): ?>
                                <tbody id="historique-tbody">
                                    <th id="id-user-historic"><?php echo $histo->getUser_name().' '.$histo->getUser_first_name() ?></th>
                                    <th id="titre-media-historic"><?php echo $histo->getTitle() ?></th>
                                    <th id="exemplaire-media-historic"><?php echo $histo->getId_exemplaire() ?></th>
                                    <th id="categorie-media-historic"><?php echo $histo->getName() ?></th>
                                    <th id="sous-categorie-historic"><?php echo $histo->getTheme() ?></th>
                                    <th id="date-historic"><?php if($histo->getType_histo()==1):echo $histo->getEmprunt_date()->format('d/m/y'); else: echo $histo->getReturn_date()->format('d/m/y'); endif;   ?></th>
                                    <th id="emprunt-resa-historic"><?php if($histo->getType_histo()==1):echo 'EMPRUNT'; else: echo 'RETOUR'; endif;   ?></th>
                                    <th id="statut-media-historic"><?php if($histo->getExemplaire_status()==1):echo 'Neuf'; elseif($histo->getExemplaire_status()==2): echo 'Bon'; elseif($histo->getExemplaire_status()==3): echo 'Mauvais'; elseif($histo->getExemplaire_status()==4): echo 'Déchiré'; elseif($histo->getExemplaire_status()==5): echo 'A JETER !'; endif;   ?></th>
                                </tbody>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">Aucun historique disponible.</td>
                                    </tr>
                                <?php endif;  ?>

                            </table>

                        </div>
                    </div>
                </div>
                </div>

        </section>


        <script src="./assets/js/historicDash.js"></script>
</body>

</html>