window.addEventListener("load", () => {
    window.scrollTo(0, window.scrollY);
});

window.addEventListener("scroll", () => {
    if (window.scrollX !== 0) {
        window.scrollTo(0, window.scrollY);
    }
    if (document.querySelector(".modal:not([style*='display: none'])")) {
        let scrollY = window.scrollY;
        window.scrollTo(0, scrollY);
    }
});
