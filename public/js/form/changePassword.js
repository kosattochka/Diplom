import { errorModal } from "../modal.js";

document
    .getElementById("changePasswordBtn")
    .addEventListener("click", function (event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        // Отправляем запрос на сервер
        fetch("/api/auth/forgot", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                email: document.querySelector('#editUser input[name="email"]')
                    .value,
            }),
        })
            .then((response) => {
                return response.json();
            })
            .then(async (result) => {
                if (result.status) {
                    errorModal(
                        "Вам придёт электронное письмо с ссылкой для подтверждения смены пароля",
                        false
                    );
                } else {
                    // Обрабатываем ошибки валидации
                    console.log(result);
                    errorModal(result.message);
                }
            });
    });
