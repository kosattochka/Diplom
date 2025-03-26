// Получаем элементы
const modal = document.getElementById("myModal");
const openModalBtn = document.getElementById("openModalBtn");
const closeModalBtn = document.querySelector(".close");

// Открываем модалку
openModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
});

// Закрываем модалку
closeModalBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

// Закрываем модалку при клике вне её области
window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
