<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion media</title>
    <link rel="icon" href="../assets/img/logoM.png">
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <section id="side-bar-dash">
        <section id="navbar-left">
            <ul class="nav-menu">
                <li><a href=""><img src="../assets/img/home-24.ico" alt=""><span>Home</span> </a></li>
                <li><a href="media-create"><img src="../assets/img/icons8-add-25.png" alt=""><span>Ajouter un média</span></a></li>
                <li><a href="#"><img src="../assets/img/inbox-24.ico" alt=""> <span> Inbox</span></a></li>
                <li><a href="#"><img src="../assets/img/conference-24.ico" alt=""><span>Gestion Utilisateurs</span> </a></li>
                <li><a href="#"> <img src="../assets/img/icons8-book-30.png" alt=""><span>Gestion Emprunts</span> </a></li>
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
                    <h1>Gestion des Media</h1>
                    <input type="text" placeholder="Recherchez des produits" id="search-product">
                    <label for="search-product-dashboard"></label>
                    

                    <div class="user-container">
                        <ul class="user-gestion-list">
                            <li>id</li>
                            <li>Titre</li>
                            <li>Auteur</li>
                            <li>Catégorie</li>

                        </ul>
                    </div>


                    <div class="user-row">
                        <div class="user-dashboard">
                            <p class="id-user-dashboard">#14567</p>
                            <p class="name-dashboard"></p>
                            <p class="date-dashboard">Serge</p>
                            <p class="livre-non">Roman</p>
                            <button type="submit" id="more-dashboard">More</button>
                        </div>
                    </div>
                </section>
                <section id="right-grid">
                    <h2>Detail produits</h2>
                    <div class="detail-product">
                        <figure>
                            <img src="../assets/img/livre-cuisine-tout-en-pot-jean-pierre-dezavelle.webp" alt="">
                        </figure>
                        <div class="contain-detail-product">
                            <p class="title-detail-product">Livre de cuise</p>
                            <p class="auteur-detail-product">Lorette</p>
                            <p class="description-auteur-product">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae quae eius eos facilis. Laboriosam quidem accusamus sunt ullam ipsam tenetur unde error quo deserunt et.</p>
                        </div>
                    </div>






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

        </section>
    </section>

    <script src="../assets/js/dashboard.js"></script>
    <script src="./assets/js/newmedia.js"></script>


</body>

</html>