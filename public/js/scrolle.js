// Проверяем, поддерживается ли событие wheel (не все браузеры поддерживают)
if ('onwheel' in document) {
    // Современные браузеры
    window.addEventListener('wheel', preventHorizontalScroll, {passive: false});
} else if ('onmousewheel' in document) {
    // Старые браузеры
    window.addEventListener('mousewheel', preventHorizontalScroll, {passive: false});
} else {
    // Очень старые браузеры (Firefox < 17)
    window.addEventListener('MozMousePixelScroll', preventHorizontalScroll, {passive: false});
}

function preventHorizontalScroll(e) {
    // Проверяем, является ли скрол преимущественно горизонтальным
    if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) {
        // Отменяем горизонтальный скрол
        e.preventDefault();

        // Прокручиваем страницу обратно
        window.scrollBy(-e.deltaX, 0);

        // Альтернативный вариант - просто блокировать горизонтальный скрол
        // window.scrollTo(window.scrollX, window.scrollY);
    }

    // Для touch-устройств (тачпады и смартфоны)
    if (e.deltaX !== 0 && Math.abs(e.deltaX) > Math.abs(e.deltaY)) {
        e.preventDefault();
        window.scrollBy(-e.deltaX, 0);
    }
}

// Также обрабатываем событие touchmove для мобильных устройств
window.addEventListener('touchmove', function(e) {
    if (e.touches.length === 1) {
        const touch = e.touches[0];
        const startX = touch.pageX;

        // Если пользователь двигает пальцем горизонтально
        if (Math.abs(touch.pageX - startX) > Math.abs(touch.pageY - startY)) {
            e.preventDefault();
        }
    }
}, {passive: false});
