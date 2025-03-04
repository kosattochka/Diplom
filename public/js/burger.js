function Nav() {
    document.body.classList.add("modal-open");
    document.querySelector(".mobile-rectangle-black").style.display = "block";
}

document
    .querySelector(".mobile-rectangle-black")
    .addEventListener("click", CloseNav);

function CloseNav(event) {
    if (event.target == this) {
        document.body.classList.remove("modal-open");
        document.querySelector(".mobile-rectangle-black").style.display =
            "none";
    }
}
