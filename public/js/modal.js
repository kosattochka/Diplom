document.addEventListener("DOMContentLoaded", function () {
    // Общая функция закрытия всех модальных окон
    const closeAllModals = () => {
        document.querySelectorAll(".modal").forEach((modal) => {
            modal.style.display = "none";
        });

        document.body.classList.remove("modal-open");
    };

    // Делегированное открытие модальных окон
    document.addEventListener("click", function (e) {
        const modalOpenButton = e.target.closest(".modal-open");
        if (modalOpenButton) {
            e.preventDefault();
            e.stopPropagation();
            closeAllModals();
            const modalId = modalOpenButton.dataset.modal;
            if (modalId) {
                const modal = document.getElementById(modalId);
                if (modal) modal.style.display = "block";
            }
        }
    });

    // Делегированное закрытие модальных окон
    document.addEventListener("click", function (e) {
        const modalCloseButton = e.target.closest(".modal-close");
        if (modalCloseButton) {
            e.stopPropagation();
            const modal = modalCloseButton.closest(".modal");
            if (modal) modal.style.display = "none";
        }
    });

    // Закрытие при клике вне модального окна
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("modal")) {
            e.target.style.display = "none";
        }
    });

    // Закрытие при нажатии Escape
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            closeAllModals();
        }
    });
});

function errorModal(msg, error = true) {
    let modal = document.querySelector("#errorModal");
    if (modal) {
        modal.remove();
    }

    document.body.insertAdjacentHTML(
        "beforeend",
        `
            <div id="errorModal" class="modal error" style="display: block">
                <div class="modal-content">
                    <span class="modal-close">&times;</span>
                    <div class="subtitle">
                        <div>
                            <img src="/img/logo.svg" alt=""/>
                        </div>
                    </div>
                    ${error ? "<h2>ОШИБКА</h2>" : ""}
                    <h3>${msg}</h3>
                </div>
            </div>
        `
    );
}

export { errorModal };
