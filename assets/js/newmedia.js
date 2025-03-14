document.addEventListener('DOMContentLoaded', function () {
    const categoryRadios = document.querySelectorAll('input[name="id_category"]');
    const subcategorySelect = document.getElementById('id_subcategory');
    const allSubcategoryOptions = Array.from(subcategorySelect.options); // Stocker toutes les options de départ

    categoryRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            const selectedCategoryId = this.value;

            // Effacer les options actuelles dans le select
            subcategorySelect.innerHTML = '<option value="">Sélectionner un genre</option>';

            // Ajouter uniquement les options correspondant à la catégorie sélectionnée
            allSubcategoryOptions.forEach(option => {
                if (option.getAttribute('data-category-id') === selectedCategoryId) {
                    subcategorySelect.appendChild(option.cloneNode(true)); // Cloner pour éviter de manipuler les mêmes nodes
                }
            });
        });
    });
});







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







