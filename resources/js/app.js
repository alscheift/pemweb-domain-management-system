import './bootstrap';
import 'flowbite';


// Get the menu button and the dropdown menu
var menuButton = document.getElementById("user-menu-button");
var dropdownMenu = document.getElementById("user-menu");

// Toggle the visibility of the dropdown menu when the button is clicked
menuButton.addEventListener("click", function() {
    dropdownMenu.classList.toggle("hidden");
});

// Close the dropdown menu when clicking outside of it
document.addEventListener("click", function(event) {
    if (!dropdownMenu.contains(event.target) && !menuButton.contains(event.target)) {
        dropdownMenu.classList.add("hidden");
    }
});