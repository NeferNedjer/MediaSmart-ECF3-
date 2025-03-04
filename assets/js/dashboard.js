// Select all elements using correct class names
const idUserElements = document.querySelectorAll('.id-user-dashboard'); // Multiple elements
const activityVisible = document.querySelectorAll('.activity-visible'); // Multiple elements
const activityHidden = document.querySelectorAll('.activity-hidden'); // Multiple elements

// Loop through all the "id-user-dashboard" elements and attach click event listeners
idUserElements.forEach((idUser) => {
    idUser.addEventListener('click', function() {
        // Toggle visibility of activity-visible elements
        activityVisible.forEach((element) => {
            element.style.display = 'none'; // Hide all elements with the "activity-visible" class
        });

        // Toggle visibility of activity-hidden elements
        activityHidden.forEach((element) => {
            element.style.display = 'block'; // Show all elements with the "activity-hidden" class
        });
    });
});
