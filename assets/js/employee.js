document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.id-user-dashboard').forEach(function(element) {
        element.addEventListener('click', function() {
            var id_user = this.getAttribute('data-id');
            fetch('/dashboardEmployee', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id_user: id_user})
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                var empruntsSection = document.querySelector('.activity-visible tbody');
                empruntsSection.innerHTML = '';
                data.emprunts.forEach(function(emprunt) {
                    var row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${emprunt.user_name} ${emprunt.user_first_name}</td>
                        <td>${emprunt.name}</td>
                        <td>${emprunt.title}</td>
                        <td>${new Date(emprunt.emprunt_date).toLocaleDateString()}</td>
                        <td>${new Date(emprunt.max_return_date).toLocaleDateString()}</td>`;
                    empruntsSection.appendChild(row);
                })
            })
        })
    })
})