// NAVBAR SCROLL
document.addEventListener("scroll", function () {
    let navbar = document.querySelector("#navbar");

    if (window.scrollY > 80) {
        navbar.classList.add("bg-light");
    } else {
        navbar.classList.remove("bg-light");
    }
});

// NAVBAR TOGGLER
let toggler = document.querySelector(".navbar-toggler");

toggler.addEventListener("click", function () {
    toggler.classList.toggle("fa-rotate-90");
});

// BADGE TOGGLER
let dropDown = document.querySelector('#userDropdown');
let badge = document.querySelector('#dropDownBadge');
dropDown.addEventListener('click', function(){
    if (dropDown.classList.contains('show')){
        badge.classList.remove('d-none');
    }else{
        badge.classList.add('d-none');
    }
})
