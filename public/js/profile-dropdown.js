const profileButton = document.querySelector(".profile_dropdown button");
const dropdownList = document.querySelector(".dropdown_menu");

profileButton.addEventListener("click", () => {
    dropdownList.classList.toggle("show");
});
