function moveAside() {
    const sidebar = document.querySelector(".web-content aside");
    const bottomContent = document.getElementById("bottom-content");
    const originalParent = document.querySelector(".web-content");

    if (!sidebar || !bottomContent) return;

    if (window.innerWidth < 768) {
        // Проверяем, не перемещен ли уже сайдбар
        if (sidebar.parentNode === originalParent) {
            bottomContent.after(sidebar);
        }
    } else {
        // Возвращаем обратно, если нужно
        if (sidebar.parentNode !== originalParent) {
            originalParent.appendChild(sidebar);
        }
    }
}

// Запускаем при загрузке
document.addEventListener("DOMContentLoaded", moveAside);

// Запускаем при изменении размера окна
window.addEventListener("resize", () => {
    // Добавляем задержку для оптимизации
    clearTimeout(window.resizedFinished);
    window.resizedFinished = setTimeout(moveAside, 100);
});
