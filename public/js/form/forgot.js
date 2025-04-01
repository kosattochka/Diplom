import { errorModal } from "../modal.js";

document.getElementById("forgot").addEventListener("submit", function (event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    // Собираем данные формы
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    // Отправляем запрос на сервер
    fetch("/api/auth/forgot", {
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
                errorModal('Вам на почту отправлено письмо с ссылкой на востановление пароля', false);
                document.getElementById("forgot").style.display = 'none';
            } else {
                // Обрабатываем ошибки валидации
                console.log(result);
                errorModal(result.message);
            }
        });
});
