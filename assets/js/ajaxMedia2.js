let searchFormMedia = document.getElementById("search_formMedia");
let searchInputMedia = document.getElementById("search-product-dashboard");
let responseMedia = document.getElementById("responseMedia");

// Variable pour stocker les résultats initiaux
let initialResults = [];

searchInputMedia.addEventListener('input', function() {
    // Supprimer toutes les divs avec la classe 'user-row'
    const userRows = document.querySelectorAll('.user-row');
    userRows.forEach(row => row.remove());

    if (searchInputMedia.value.length >= 1) {
        let formDataMedia = new FormData(searchFormMedia);
        fetch('/searchMedia', {
            method: 'POST',
            body: formDataMedia,
        })
        .then((datas) => datas.json())
        .then((datas) => {
            responseMedia.innerHTML = "";
            datas.forEach(data => {
                const userRow = document.createElement("div");
                userRow.classList.add("user-row");

                const userDashboard = document.createElement("div");
                userDashboard.classList.add("user-dashboard");

                const link = document.createElement("a");
                link.href = `/dashboardMedia/${data.id_media}`;
                const idUserDashboard = document.createElement("p");
                idUserDashboard.classList.add("id-user-dashboard");
                idUserDashboard.textContent = data.id_media;
                link.appendChild(idUserDashboard);

                const dateDashboard = document.createElement("p");
                dateDashboard.classList.add("date-dashboard");
                dateDashboard.textContent = data.name;

                const livreNon = document.createElement("p");
                livreNon.classList.add("livre-non");
                livreNon.textContent = data.theme;

                const nameDashboard = document.createElement("p");
                nameDashboard.classList.add("name-dashboard");
                nameDashboard.textContent = data.title;

                const moreLink = document.createElement("a");
                moreLink.href = `/detailMedia/${data.id_media}`;
                const moreButton = document.createElement("button");
                moreButton.type = "submit";
                moreButton.id = "more-dashboard";
                moreButton.textContent = "More";
                moreLink.appendChild(moreButton);

                const editImage = document.createElement("img");
                editImage.src = "../assets/img/icons8-orange-edit-50 (1).png";
                editImage.alt = "";
                editImage.style.height = "25px";

                userDashboard.appendChild(link);
                userDashboard.appendChild(dateDashboard);
                userDashboard.appendChild(livreNon);
                userDashboard.appendChild(nameDashboard);
                userDashboard.appendChild(moreLink);
                userDashboard.appendChild(editImage);

                userRow.appendChild(userDashboard);
                responseMedia.appendChild(userRow);
            });
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    } else {
        // Réafficher les résultats initiaux si l'entrée de recherche est vide
        responseMedia.innerHTML = "";
        initialResults.forEach(data => {
            const userRow = document.createElement("div");
            userRow.classList.add("user-row");

            const userDashboard = document.createElement("div");
            userDashboard.classList.add("user-dashboard");

            const link = document.createElement("a");
            link.href = `/dashboardMedia/${data.id_media}`;
            const idUserDashboard = document.createElement("p");
            idUserDashboard.classList.add("id-user-dashboard");
            idUserDashboard.textContent = data.id_media;
            link.appendChild(idUserDashboard);

            const dateDashboard = document.createElement("p");
            dateDashboard.classList.add("date-dashboard");
            dateDashboard.textContent = data.name;

            const livreNon = document.createElement("p");
            livreNon.classList.add("livre-non");
            livreNon.textContent = data.theme;

            const nameDashboard = document.createElement("p");
            nameDashboard.classList.add("name-dashboard");
            nameDashboard.textContent = data.title;

            const moreLink = document.createElement("a");
            moreLink.href = `/detailMedia/${data.id_media}`;
            const moreButton = document.createElement("button");
            moreButton.type = "submit";
            moreButton.id = "more-dashboard";
            moreButton.textContent = "More";
            moreLink.appendChild(moreButton);

            const editImage = document.createElement("img");
            editImage.src = "../assets/img/icons8-orange-edit-50 (1).png";
            editImage.alt = "";
            editImage.style.height = "25px";

            userDashboard.appendChild(link);
            userDashboard.appendChild(dateDashboard);
            userDashboard.appendChild(livreNon);
            userDashboard.appendChild(nameDashboard);
            userDashboard.appendChild(moreLink);
            userDashboard.appendChild(editImage);

            userRow.appendChild(userDashboard);
            responseMedia.appendChild(userRow);
        });
    }
});

// Sauvegarder les résultats initiaux au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    const userRows = document.querySelectorAll('.user-row');
    userRows.forEach(row => {
        const data = {
            id_media: row.querySelector('.id-user-dashboard').textContent,
            name: row.querySelector('.date-dashboard').textContent,
            theme: row.querySelector('.livre-non').textContent,
            title: row.querySelector('.name-dashboard').textContent
        };
        initialResults.push(data);
    });
});