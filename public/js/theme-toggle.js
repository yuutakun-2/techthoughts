const themeButton = document.querySelector("#theme-toggle");
console.log(themeButton);
const navbar = document.querySelector("nav");

themeButton.addEventListener("click", () => {
    console.log("clicked");
    navbar.classList.toggle("dark");
});
