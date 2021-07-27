// NAVBAR SCROLL
document.addEventListener("scroll", function () {
    let navbar = document.querySelector("#navbar");

    if (window.scrollY > 80) {
        navbar.classList.add("bg-light");
    } else {
        navbar.classList.remove("bg-light");
    }
});

// NAVBAR SCROLL
let toggler = document.querySelector(".navbar-toggler");

toggler.addEventListener("click", function () {
    toggler.classList.toggle("fa-rotate-90");
});
