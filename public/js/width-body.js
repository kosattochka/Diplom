window.addEventListener("load", () => {
    window.scrollTo(0, window.scrollY);
});

window.addEventListener("scroll", () => {
    if (window.scrollX !== 0) {
        window.scrollTo(0, window.scrollY);
    }
});
