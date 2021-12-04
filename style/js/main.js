const toggleButton = document.querySelector('.toggle-button');
const navLinks = document.querySelector('.navbar-links');

toggleButton.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});