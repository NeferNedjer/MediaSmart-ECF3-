document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('input[name="id_category"]');
    const subcategorySelect = document.getElementById('id_subcategory');

    // Stocker les options des sous-catégories dans une variable
    const subcategoryOptions = Array.from(subcategorySelect.options);

    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', function() {
            const selectedCategoryId = this.value;

            // Clear 
            subcategorySelect.innerHTML = '<option value=""></option>';

        // Ajout d'une nvl option en fonction de la caté
            subcategoryOptions.forEach(function(option) {
                if (option.getAttribute('data-category-id') === selectedCategoryId) {
                    subcategorySelect.appendChild(option);
                }
            });
        });
    });
});




