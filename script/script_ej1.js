document.addEventListener("DOMContentLoaded", function () {
    const submenuItems = document.querySelectorAll(".has-submenu");

    submenuItems.forEach((item) => {
        item.addEventListener("click", function (event) {
            event.preventDefault(); // Evitar el comportamiento predeterminado del enlace

            const submenu = item.querySelector(".submenu");
            const isHidden = submenu.style.display === "none" || submenu.style.display === "";

            if (isHidden) {
                submenu.style.display = "block";
            } else {
                submenu.style.display = "none";
            }
        });
    });
});
