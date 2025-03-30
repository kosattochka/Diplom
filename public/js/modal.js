document.addEventListener("DOMContentLoaded", function () {
    // Открытие модальных окон
    document.querySelectorAll(".modal-open").forEach((button) => {
        button.addEventListener("click", function (e) {
            let modals = document.querySelectorAll(".modal");
            modals.forEach((modal) => {
                modal.style.display = "none";
            });
            e.preventDefault(); // Предотвращаем стандартное поведение (если кнопка в форме)
            e.stopPropagation(); // Останавливаем всплытие события
            const modalId = this.getAttribute("data-modal");
            document.getElementById(modalId).style.display = "block";
        });
    });

    // Закрытие модальных окон при клике на крестик
    document.querySelectorAll(".modal-close").forEach((span) => {
        span.addEventListener("click", function (e) {
            e.stopPropagation(); // Останавливаем всплытие
            this.closest(".modal").style.display = "none";
        });
    });

    // Закрытие при клике вне модального окна
    window.addEventListener("click", function (e) {
        if (e.target.classList.contains("modal")) {
            e.target.style.display = "none";
        }
    });

    // Закрытие при нажатии Escape
    window.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            document.querySelectorAll(".modal").forEach((modal) => {
                modal.style.display = "none";
            });
        }
    });
});
