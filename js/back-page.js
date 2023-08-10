const backButton = document.getElementById('backButton');

// Add a click event listener to the back button
backButton.addEventListener('click', () => {
    // Use the history API to navigate back
    window.history.back();
});