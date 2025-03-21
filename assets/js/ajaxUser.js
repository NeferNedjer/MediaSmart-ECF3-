let searchFormEmployee = document.getElementById("search_formEmployee");
let searchInputEmployee = document.getElementById("searchEmployee");
let responseEmployee = document.createElement("div");
responseEmployee.id = "responseEmployee";
document.querySelector('.overflow-y').appendChild(responseEmployee);

// Variable pour stocker les résultats initiaux
let initialUserResults = [];

searchInputEmployee.addEventListener('input', function() {
    // Supprimer toutes les divs avec la classe 'user-row'
    const userRows = document.querySelectorAll('.user-row');
    userRows.forEach(row => row.remove());

    if (searchInputEmployee.value.length >= 1) {
        let formDataEmployee = new FormData(searchFormEmployee);
        fetch('/searchEmployee', {
            method: 'POST',
            body: formDataEmployee,
        })
        .then((datas) => datas.json())
        .then((datas) => {
            responseEmployee.innerHTML = "";
            datas.forEach(data => {
                const userRow = document.createElement("div");
                userRow.classList.add("user-row");

                const userDashboard = document.createElement("div");
                userDashboard.classList.add("user-dashboard");

                const link = document.createElement("a");
                link.href = `/dashboardEmployee/${data.id_user}`;
                const idUserDashboard = document.createElement("p");
                idUserDashboard.classList.add("id-user-dashboard");
                idUserDashboard.textContent = data.id_user;
                link.appendChild(idUserDashboard);

                const nameDashboard = document.createElement("p");
                nameDashboard.classList.add("name-dashboard");
                nameDashboard.textContent = data.name + " " + data.first_name;

                const dateDashboard = document.createElement("p");
                dateDashboard.classList.add("date-dashboard");
                dateDashboard.textContent = data.last_connexion;

                const livreNon = document.createElement("p");
                livreNon.classList.add("livre-non");
                livreNon.textContent = data.nb_outdated_emprunt || 0;

                const moreLink = document.createElement("a");
                moreLink.href = `/getUtilisateur/${data.id_user}`;
                const moreButton = document.createElement("button");
                moreButton.type = "submit";
                moreButton.id = "more-dashboard";
                moreButton.textContent = "More";
                moreLink.appendChild(moreButton);

                const editLink = document.createElement("a");
                editLink.href = "javascript:void(0)";
                editLink.dataset.id = data.id_user;
                editLink.className = "edit-user";
                const editImage = document.createElement("img");
                editImage.src = "../assets/img/icons8-orange-edit-50 (1).png";
                editImage.alt = "Edit";
                editLink.appendChild(editImage);

                const deleteForm = document.createElement("form");
                deleteForm.action = "/update";
                deleteForm.method = "POST";
                deleteForm.style.display = "inline";
                
                const idInput = document.createElement("input");
                idInput.type = "hidden";
                idInput.name = "id_user";
                idInput.value = data.id_user;
                
                const deleteBtn = document.createElement("input");
                deleteBtn.type = "submit";
                deleteBtn.name = "delete";
                deleteBtn.className = "supprimer";
                deleteBtn.value = "Supprimer";
                
                deleteForm.appendChild(idInput);
                deleteForm.appendChild(deleteBtn);

                userDashboard.appendChild(link);
                userDashboard.appendChild(nameDashboard);
                userDashboard.appendChild(dateDashboard);
                userDashboard.appendChild(livreNon);
                userDashboard.appendChild(moreLink);
                userDashboard.appendChild(editLink);
                userDashboard.appendChild(deleteForm);

                userRow.appendChild(userDashboard);
                responseEmployee.appendChild(userRow);
                
                // Recréer le formulaire d'édition pour chaque utilisateur
                createEditForm(data);
            });
            
            // Réattacher les écouteurs d'événements pour les boutons d'édition
            attachEditListeners();
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    } else {
        // Réafficher les résultats initiaux si l'entrée de recherche est vide
        responseEmployee.innerHTML = "";
        initialUserResults.forEach(data => {
            const userRow = document.createElement("div");
            userRow.classList.add("user-row");

            const userDashboard = document.createElement("div");
            userDashboard.classList.add("user-dashboard");

            const link = document.createElement("a");
            link.href = `/dashboardEmployee/${data.id_user}`;
            const idUserDashboard = document.createElement("p");
            idUserDashboard.classList.add("id-user-dashboard");
            idUserDashboard.textContent = data.id_user;
            link.appendChild(idUserDashboard);

            const nameDashboard = document.createElement("p");
            nameDashboard.classList.add("name-dashboard");
            nameDashboard.textContent = data.name + " " + data.first_name;

            const dateDashboard = document.createElement("p");
            dateDashboard.classList.add("date-dashboard");
            dateDashboard.textContent = data.last_connexion;

            const livreNon = document.createElement("p");
            livreNon.classList.add("livre-non");
            livreNon.textContent = data.nb_outdated_emprunt || 0;

            const moreLink = document.createElement("a");
            moreLink.href = `/getUtilisateur/${data.id_user}`;
            const moreButton = document.createElement("button");
            moreButton.type = "submit";
            moreButton.id = "more-dashboard";
            moreButton.textContent = "More";
            moreLink.appendChild(moreButton);

            const editLink = document.createElement("a");
            editLink.href = "javascript:void(0)";
            editLink.dataset.id = data.id_user;
            editLink.className = "edit-user";
            const editImage = document.createElement("img");
            editImage.src = "../assets/img/icons8-orange-edit-50 (1).png";
            editImage.alt = "Edit";
            editLink.appendChild(editImage);

            const deleteForm = document.createElement("form");
            deleteForm.action = "/update";
            deleteForm.method = "POST";
            deleteForm.style.display = "inline";
            
            const idInput = document.createElement("input");
            idInput.type = "hidden";
            idInput.name = "id_user";
            idInput.value = data.id_user;
            
            const deleteBtn = document.createElement("input");
            deleteBtn.type = "submit";
            deleteBtn.name = "delete";
            deleteBtn.className = "supprimer";
            deleteBtn.value = "Supprimer";
            
            deleteForm.appendChild(idInput);
            deleteForm.appendChild(deleteBtn);

            userDashboard.appendChild(link);
            userDashboard.appendChild(nameDashboard);
            userDashboard.appendChild(dateDashboard);
            userDashboard.appendChild(livreNon);
            userDashboard.appendChild(moreLink);
            userDashboard.appendChild(editLink);
            userDashboard.appendChild(deleteForm);

            userRow.appendChild(userDashboard);
            responseEmployee.appendChild(userRow);
            
            // Recréer le formulaire d'édition pour chaque utilisateur
            createEditForm(data);
        });
        
        // Réattacher les écouteurs d'événements pour les boutons d'édition
        attachEditListeners();
    }
});

// Fonction pour créer le formulaire d'édition
function createEditForm(data) {
    const editForm = document.createElement("form");
    editForm.id = `edit-form-${data.id_user}`;
    editForm.className = "edit-form";
    editForm.method = "POST";
    editForm.action = "/update";
    editForm.style.display = "none";
    
    const idInput = document.createElement("input");
    idInput.type = "hidden";
    idInput.name = "id_user";
    idInput.value = data.id_user;
    
    const nameLabel = document.createElement("label");
    nameLabel.htmlFor = "name_user";
    nameLabel.textContent = "Nom :";
    
    const nameInput = document.createElement("input");
    nameInput.type = "text";
    nameInput.name = "name_user";
    nameInput.id = `name2-${data.id_user}`;
    nameInput.value = data.name;
    nameInput.required = true;
    
    const firstNameLabel = document.createElement("label");
    firstNameLabel.htmlFor = "first_name_user";
    firstNameLabel.textContent = "Prénom :";
    
    const firstNameInput = document.createElement("input");
    firstNameInput.type = "text";
    firstNameInput.name = "first_name_user";
    firstNameInput.id = `first_name2-${data.id_user}`;
    firstNameInput.value = data.first_name;
    firstNameInput.required = true;
    
    const addressLabel = document.createElement("label");
    addressLabel.htmlFor = "adress";
    addressLabel.textContent = "Adresse :";
    
    const addressInput = document.createElement("input");
    addressInput.type = "text";
    addressInput.name = "adress";
    addressInput.id = `adress-${data.id_user}`;
    addressInput.value = data.adress;
    addressInput.required = true;
    
    const phoneLabel = document.createElement("label");
    phoneLabel.htmlFor = "phone";
    phoneLabel.textContent = "Téléphone :";
    
    const phoneInput = document.createElement("input");
    phoneInput.type = "text";
    phoneInput.name = "phone";
    phoneInput.id = `phone-${data.id_user}`;
    phoneInput.value = data.phone;
    phoneInput.required = true;
    
    const emailLabel = document.createElement("label");
    emailLabel.htmlFor = "email";
    emailLabel.textContent = "Email :";
    
    const emailInput = document.createElement("input");
    emailInput.type = "email";
    emailInput.name = "email";
    emailInput.id = `email-${data.id_user}`;
    emailInput.value = data.email;
    emailInput.required = true;
    
    const statutLabel = document.createElement("label");
    statutLabel.htmlFor = "statut";
    statutLabel.textContent = "Statut :";
    
    const statutInput = document.createElement("input");
    statutInput.type = "number";
    statutInput.name = "statut";
    statutInput.id = `statut-${data.id_user}`;
    statutInput.value = data.statut;
    
    const flexDiv = document.createElement("div");
    flexDiv.className = "edit-flex";
    
    const submitBtn = document.createElement("input");
    submitBtn.type = "submit";
    submitBtn.name = "update";
    submitBtn.className = "modifier";
    submitBtn.value = "Enregistrer les modifications";
    
    const cancelBtn = document.createElement("button");
    cancelBtn.type = "button";
    cancelBtn.textContent = "Annuler";
    cancelBtn.onclick = function() { hideEditForm(data.id_user); };
    
    flexDiv.appendChild(submitBtn);
    flexDiv.appendChild(cancelBtn);
    
    editForm.appendChild(idInput);
    editForm.appendChild(nameLabel);
    editForm.appendChild(nameInput);
    editForm.appendChild(document.createElement("br"));
    
    editForm.appendChild(firstNameLabel);
    editForm.appendChild(firstNameInput);
    editForm.appendChild(document.createElement("br"));
    
    editForm.appendChild(addressLabel);
    editForm.appendChild(addressInput);
    editForm.appendChild(document.createElement("br"));
    
    editForm.appendChild(phoneLabel);
    editForm.appendChild(phoneInput);
    editForm.appendChild(document.createElement("br"));
    
    editForm.appendChild(emailLabel);
    editForm.appendChild(emailInput);
    editForm.appendChild(document.createElement("br"));
    
    editForm.appendChild(statutLabel);
    editForm.appendChild(statutInput);
    editForm.appendChild(document.createElement("br"));
    
    editForm.appendChild(flexDiv);
    
    responseEmployee.appendChild(editForm);
}

// Fonction pour attacher les écouteurs d'événements aux boutons d'édition
function attachEditListeners() {
    const editLinks = document.querySelectorAll('.edit-user');
    editLinks.forEach(link => {
        link.addEventListener('click', function() {
            const userId = this.dataset.id;
            showEditForm(userId);
        });
    });
}

// Fonction pour afficher le formulaire d'édition
function showEditForm(userId) {
    // Masquer tous les formulaires d'édition
    const allForms = document.querySelectorAll('.edit-form');
    allForms.forEach(form => {
        form.style.display = 'none';
    });
    
    // Afficher le formulaire pour l'utilisateur spécifié
    const form = document.getElementById(`edit-form-${userId}`);
    if (form) {
        form.style.display = 'block';
    }
}

// Fonction pour masquer le formulaire d'édition
function hideEditForm(userId) {
    const form = document.getElementById(`edit-form-${userId}`);
    if (form) {
        form.style.display = 'none';
    }
}

// Sauvegarder les résultats initiaux au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    const userRows = document.querySelectorAll('.user-row');
    userRows.forEach(row => {
        const userDashboard = row.querySelector('.user-dashboard');
        if (userDashboard) {
            const data = {
                id_user: userDashboard.querySelector('.id-user-dashboard').textContent,
                name: userDashboard.querySelector('.name-dashboard').textContent.split(' ')[0],
                first_name: userDashboard.querySelector('.name-dashboard').textContent.split(' ')[1],
                last_connexion: userDashboard.querySelector('.date-dashboard').textContent,
                nb_outdated_emprunt: userDashboard.querySelector('.livre-non').textContent,
                // Ces valeurs seront remplies avec des données fictives puisqu'elles ne sont pas visibles dans la liste
                adress: '',
                phone: '',
                email: '',
                statut: '0'
            };
            initialUserResults.push(data);
        }
    });
    
    // Attacher les écouteurs d'événements pour les boutons d'édition existants
    attachEditListeners();
});