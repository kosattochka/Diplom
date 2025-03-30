document
    .getElementById("register")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        // Собираем данные формы
        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        // Отправляем запрос на сервер
        fetch("/api/auth/register", {
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
                if (result.status == true) {
                    // Успешная отправка
                    document.location.reload();
                } else {
                    // Обрабатываем ошибки валидации
                    console.log(result);
                    alert(result.message);
                }
            });
    });
