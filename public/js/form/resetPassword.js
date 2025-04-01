import { errorModal } from "../modal.js";

document
    .getElementById("reset_password")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        // Собираем данные формы
        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        // Отправляем запрос на сервер
        fetch("/api/auth/changePassword", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                return response.json();
            })
            .then(async (result) => {
                if (result.status) {
                    // Успешная отправка
                    document.getElementById("modal4").style.display = "none";
                    document.getElementById("modal1").style.display = "flex";
                } else {
                    // Обрабатываем ошибки валидации
                    console.log(result);
                    errorModal(result.message);
                }
            });
    });
