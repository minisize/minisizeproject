// Side bar open close js code

let navbar = document.querySelector(".navbar");

// Side bar
let menuOpenBtn = document.querySelector("nav .bi-list");
let CloseOpenBtn = document.querySelector(".nav-links .bi-x");
let navLinks = document.querySelector(".nav-links");

menuOpenBtn.addEventListener("click", ()=>{
    navLinks.style.left="0";
})
CloseOpenBtn.addEventListener("click", ()=>{
    navLinks.style.left="-100%";
})