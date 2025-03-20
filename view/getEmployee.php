<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Employee</title>
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link rel="icon" href="../assets/img/logoM.png">
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
                <li><a href=""><img src="../assets/img/icons8-add-25.png" alt=""><span>Liste des employés</span></a></li>
                <li><a href="https://mailtrap.io/inboxes/3538112/messages" target="_blank"><img src="../assets/img/inbox-24.ico" alt=""> <span> Inbox</span></a></li>
                <li><a href="/dashboardEmployee/0"><img src="../assets/img/conference-24.ico" alt=""><span>Gestion Utilisateurs</span> </a></li>
                <li><a href="/dashboardMedia/0"> <img src="../assets/img/icons8-book-30.png" alt=""><span>Gestion Medias</span> </a></li>
                <li id="settings-dashboard"><a href="/dashboardHistoric"><img src="../assets/img/settings-19-24.ico" alt=""> <span>Statistiques</span> </a></li>
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
                    <h1>Gestion des Employés</h1>

                    <button class="btn-add-user">
                        <span>+</span>
                    </button>
                    
                    <div class="user-container">
                        <ul class="user-gestion-list">
                            <li>id</li>
                            <li>Nom de l'employé</li>
                            <li>Prénom de l'employé</li>
                            <li>supprimer l'employé</li>

                        </ul>
                    </div>

                    <?php foreach ($employees as $employee): ?>
                        <div class="user-row">
                            <div class="user-dashboard">
                
                                <p class="id-user-dashboard"><?php echo $employee->getId_employee() ?></p>
                                <p class="name-dashboard"><?php echo $employee->getName() ?></p>
                                <p class="name-dashboard"><?php echo $employee->getFirst_name() ?></p>

                                <form action="/deleteEmployee" method="POST" style="display: inline;">
                                    <input type="hidden" name="id_employee" value="<?php echo htmlspecialchars($employee->getId_employee()); ?>">
                                    <input type="submit" name="delete" class="supprimer" value="Supprimer">
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
                    <button type="button" id="cancel-btn" class="cancel-input">Annuler</button>
                </div>
            </form>
        </div>
    </section>

    
    <script src="./../assets/js/dashboard.js"></script>
</body>