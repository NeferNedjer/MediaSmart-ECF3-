<!DOCTYPE html>
<html lang="en">

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
                <li><a href=""><img src="../assets/img/home-24.ico" alt=""><span>Home</span> </a></li>
                <li><a href=""><img src="../assets/img/conference-24.ico" alt=""><span>Gestion Utilisateurs</span> </a></li>
                <li><a href="media-create"><img src="../assets/img/icons8-add-25.png" alt=""><span>Ajouter un média</span></a></li>
                <li><a href="#"><img src="../assets/img/inbox-24.ico" alt=""> <span> Inbox</span></a></li>

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

        <section id="dashboard-user">
            <section id="grid-dash-user">
                <div id="top-carousel">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, hic. Dolore ab cupiditate assumenda nulla obcaecati vel deserunt ipsum, asperiores necessitatibus error, exercitationem, unde ut?</p>

                </div>
                <div class="gestion-user2" role="region" tabindex="0">
                    <table>
                        <caption>Dernier emprunt</caption>
                        <thead>
                            <tr>
                                <th>ID MEDIA</th>
                                <th>TITRE</th>
                                <th>CATEGORIES</th>
                                <th>DATE EMPRUNT</th>
                                <th>DATE RETOUR</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                </div>
                <div id="recommendation">

                </div>
            </section>
            <div id="last-add-user">

            </div>
        </section>

        <script src="../assets/js/slider.js"></script>
        <script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
"></script>
</body>

</html>