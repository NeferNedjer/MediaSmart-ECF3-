document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('id_category');
    const subcategorySelect = document.getElementById('id_subcategory');
    const bjr = document.getElementById('paragraphe');
    // Stocker les options des sous-catégories dans une variable
    const subcategoryOptions = Array.from(subcategorySelect.options);

    categorySelect.addEventListener('change', function() {
        const selectedCategoryId = this.value;

        // Clear existing options in subcategory select
        subcategorySelect.innerHTML = '<option value=""></option>';

        // Add new options based on selected category
        subcategoryOptions.forEach(function(option) {
            if (option.getAttribute('data-category-id') === selectedCategoryId) {
                subcategorySelect.appendChild(option);
            }
        });
    });
    
});

