"use strict"
const form = document.querySelector('.adminForm')
const name = document.querySelector('#text')
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#typePasswordX");
togglePassword?.addEventListener("click", function () {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    this.classList.toggle("bi-eye");
});
