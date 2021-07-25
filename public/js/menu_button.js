// grab everything we need
const btn = document.querySelector(".mobile-menu-button");
const sidebar = document.querySelector(".sidebar");
const nav = document.querySelector(".nav-bar");

// add our event listener for the click
btn.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
});

nav.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
})