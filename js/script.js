import { initMap } from "./map.js";
import { createSkillsInnerHTML } from "./skills.js";
import "./scrollToTop.js";

const theme = document.querySelector(".theme");
const menu = document.querySelector(".menu");
const slideMenu = document.querySelector(".slide_nav");
const send = document.querySelector(".send");
const github = document.querySelector(".github");
const linkedin = document.querySelector(".linkedin");
const heart = document.querySelector(".heart");

// THEME TOGGLE
theme.addEventListener("click", function () {
    if (theme.innerHTML.includes("moon")) {
        theme.innerHTML = `<img src="./assets/icons/sun.svg" alt="">`;
    } else {
        theme.innerHTML = `<img src="./assets/icons/moon.svg" alt="">`;
    }
});

theme.addEventListener("click", function () {
    // Toggle body class
    if (document.body.classList.contains("dark")) {
        document.body.classList.remove("dark");
        document.body.classList.add("light");
        createSkillsInnerHTML("light");
        send.src = "./assets/icons/send-light.svg";
        github.src = "./assets/icons/github-light.svg";
        linkedin.src = "./assets/icons/linkedin-light.svg";
        heart.src = "./assets/icons/heart-light.svg";
    } else {
        document.body.classList.remove("light");
        document.body.classList.add("dark");
        createSkillsInnerHTML("dark");
        send.src = "./assets/icons/send-dark.svg";
        github.src = "./assets/icons/github-dark.svg";
        linkedin.src = "./assets/icons/linkedin-dark.svg";
        heart.src = "./assets/icons/heart-dark.svg";
    }

    // Reload map tiles only
    initMap();
});

// HAMBURGER MENU
menu.addEventListener("click", function () {
    menu.classList.toggle("open");
    slideMenu.classList.toggle("open");

    if (slideMenu.classList.contains("open")) {
        document.body.style.overflow = "hidden";
    } else {
        document.body.style.overflow = "scroll";
    }
});

// SLIDE MENU LINKS
document.querySelectorAll(".slide_nav a").forEach((link) => {
    link.addEventListener("click", () => {
        slideMenu.classList.remove("open");
        menu.classList.remove("open");
    });
});

// SKILLS ON LOAD
window.addEventListener("DOMContentLoaded", () => {
    const initialTheme = document.body.classList.contains("dark")
        ? "dark"
        : "light";
    createSkillsInnerHTML(initialTheme);
});

// SMOOTH SCROLL
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
        });
    });
});
