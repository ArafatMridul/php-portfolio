const scrollTopBtn = document.getElementById("scrollTopBtn");

window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
        scrollTopBtn.style.opacity = 1;
        scrollTopBtn.style.pointerEvents = "auto";
    } else {
        scrollTopBtn.style.opacity = 0;
        scrollTopBtn.style.pointerEvents = "none";
    }
});

scrollTopBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});
