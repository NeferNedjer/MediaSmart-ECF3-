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
    
    const editButtons = document.querySelectorAll('#edit-user');
    const editForm = document.getElementById('edit-form');
    
 
    editButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            
            e.preventDefault();
            e.stopPropagation();
           
            const userRow = this.closest('.user-dashboard');
            const idUser = userRow.querySelector('.id-user-dashboard').textContent.trim();
            
            
            document.querySelector('#edit-form input[name="id_user"]').value = idUser;
            
          
            editForm.style.visibility = 'visible';
            
            return false; 
        });
    });
    

    document.getElementById('annuler').addEventListener('click', function(e) {
        e.preventDefault();
        editForm.style.visibility = 'hidden';
        return false;
    });
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