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

                <li><a href="#">Inbox</a></li>
                <li><a href="#"> Gestion Utilisateurs</a></li>
                <li><a href="#"> Gestion Emprunts</a></li>
                <br><br><br>
                <li><a href="#"> Logout</a></li>
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
                            <li><button type="submit" id="more-dashboard">Inviter</button></li>
                        </ul>
                    </div>

                    <?php foreach ($datas as $data): ?>
                        <div class="user-row">
                            <div class="user-dashboard">
                                <p class="id-user-dashboard">#14567</p>
                                <p class="name-dashboard"><a href="<?php echo $router->generate('getUser', ['id' => $data->getId_user()]); ?>"><?php echo $data->getName() ?> <?php echo $data->getFirst_name() ?></a></p>
                                <p class="date-dashboard">dd/mm/AA</p>
                                <p class="livre-non">/</p>
                                <button type="submit" id="more-dashboard">More</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
                <section id="right-grid">
                    <!-- Updated the class name to match the JavaScript logic -->
                    <div class="activity-visible">
                        <div class="gestion-user" role="region" tabindex="0">
                            <table>
                                <caption>Dernier emprunt</caption>
                                <thead>
                                    <tr>
                                        <th>ID USER</th>
                                        <th>DATE D'EMPRUNT</th>
                                        <th>COMPORTEMENT USER</th>
                                        <th>DERNIERE CONNEXION</th>
                                        <th>NB D'EMPRUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datas as $data): ?>
                                        <tr>
                                            <td><a href="<?php echo $router->generate('getUser', ['id' => $data->getId_user()]); ?>"><?php echo $data->getName() ?> <?php echo $data->getFirst_name() ?></a></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $data->getInscription_date()->format('d/m/Y'); ?></td>
                                            <td></td>
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

    <script src="./assets/js/dashboard.js"></script>
</body>

</html>