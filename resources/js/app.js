import 'bootstrap';


// const toggler = document.querySelector(".toggler-btn");

// toggler.addEventListener("click", function(){
//     document.querySelector("#sidebar").classList.toggle("collapsed");
// });

const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("sidebar-overlay");
const toggler = document.querySelector(".toggler-btn");

toggler.addEventListener("click", () => {
    sidebar.classList.toggle("show");
    overlay.classList.toggle("show");
});

overlay.addEventListener("click", () => {
    sidebar.classList.remove("show");
    overlay.classList.remove("show");
});
