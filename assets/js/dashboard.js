const idUserElements = document.querySelectorAll('.id-user-dashboard'); 
const activityVisible = document.querySelectorAll('.activity-visible'); 
const activityHidden = document.querySelectorAll('.activity-hidden');

idUserElements.forEach((idUser) => {
    idUser.addEventListener('click', function() {
        const idUserValue = idUser.textContent || idUser.innerText;
        console.log('ID User Value:', idUserValue);
        
        activityVisible.forEach((element) => {
            element.style.display = 'none'; 
        });
        activityHidden.forEach((element) => {
            element.style.display = 'block'; 
        });
    });
});

console.log(idUserElements);
console.log(activityVisible);

// ----------------------------EDIT USER
document.addEventListener('DOMContentLoaded', function() {
    
    const editLinks = document.querySelectorAll('.edit-user');
    
    editLinks.forEach(link => {
        link.addEventListener('click', function() {
            const userId = this.getAttribute('data-id');
            
            
            const allForms = document.querySelectorAll('.edit-form');
            allForms.forEach(form => {
                form.style.display = 'none';
            });
            
          
            const form = document.getElementById('edit-form-' + userId);
            if (form) {
                form.style.display = 'block'; // 
            }
        });
    });
    

    function hideEditForm(userId) {
        const form = document.getElementById('edit-form-' + userId);
        if (form) {
            form.style.display = 'none'; // Masquer le formulaire
        }
    }
});








document.addEventListener("DOMContentLoaded", function() {
 
    const addUserButton = document.querySelector('.btn-add-user');
    const formContainer = document.getElementById('form-container');
    
  
    addUserButton.addEventListener('click', function() {
        
        if (formContainer.style.display === 'none' || formContainer.style.display === '') {
            formContainer.style.display = 'block';
        } else {
            formContainer.style.display = 'none'; 
        }
    });
});



// ----------------------ADD USER 
document.addEventListener("DOMContentLoaded", function(){
    const addEmploye = document.querySelector('.btn-add-user');
    const formEmploye = document.getElementById('employee-form');

    addEmploye.addEventListener('click', function(){
        if(formEmploye.style.display === 'none' || formEmploye.style.display === ''){
            formEmploye.style.display = 'block';

        }else{
            formEmploye.style.display = 'none';
        }
    })
})

// -----------------------Show detail user 

    // document.addEventListener('DOMContentLoaded', function () {
     
    //     const moreDashboardButton = document.getElementById('more-dashboard');
    //     const userDetails = document.getElementById('user-details');
    //     const backButton = document.getElementById('back-button');
        
       
    //     moreDashboardButton.addEventListener('click', function() {
    //         userDetails.style.display = 'block'; 
    //         backButton.style.display = 'none';    
    //         moreDashboardButton.style.display = 'none'; 
    //     });

        
    //     backButton.addEventListener('click', function(e) {
    //         e.preventDefault(); 
    //         userDetails.style.display = 'none';  
    //         backButton.style.display = 'none';  
    //         moreDashboardButton.style.display = 'block'; 
    //     });
    // });

