const btnShowForm = document.querySelector('.btn-add-dashboard');
const formCreateMedia = document.getElementById('form-create-media');
const editForm = document.querySelector('.edit-product');
const imgProduct = document.querySelector('.img-product') ;

console.log(imgProduct);
console.log(editForm);

    btnShowForm.addEventListener('click', function() {
        
        if (formCreateMedia.style.display === 'none') {
            formCreateMedia.style.display = 'block'; 
        } else {
            formCreateMedia.style.display = 'none'; 
        }
    });







