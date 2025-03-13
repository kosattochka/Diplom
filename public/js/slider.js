class Slider {
    constructor(id) {
        this.slider = document.getElementById(id);
        this.elements = JSON.parse(this.slider.dataset.elements);
        this.slideWindow = document.querySelector(`#${id} .slider-window`);
        this.row = document.querySelector(`#${id} .sliderRow`);
        this.slide = null;
        this.dots = null;
        this.count = 0;
        this.max = 0;
        this.gap = parseFloat(getComputedStyle(this.row).gap);

        this.initSlider();
        this.colorFigure();
        this.addEventListeners();
    }

    initSlider() {
        const isMobile = window.innerWidth < 768;
        let currentCount = isMobile
            ? this.slider.dataset.mobileCount
            : this.slider.dataset.desktopCount;
        this.max = Math.ceil(this.elements.length / currentCount);

        // создание слайдов
        var slideGroup = this.createSlide();
        this.elements.forEach((element, index) => {
            if (index % currentCount === 0 && index !== 0) {
                this.row.appendChild(slideGroup);
                slideGroup = this.createSlide();
            }
            const elementDiv = document.createElement("div");
            elementDiv.innerHTML = element;
            slideGroup.appendChild(elementDiv);
        });

        if (slideGroup.children.length > 0) {
            this.row.appendChild(slideGroup);
        }

        // Создание точек
        let dots = document.querySelector(`#${this.slider.id} .dots`);
        for (let i = 0; i < this.max; i++) {
            const dot = document.createElement("figure");
            dots.appendChild(dot);
            dot.addEventListener("click", () => this.gotoSlide(i));
        }
        this.dots = dots.querySelectorAll("figure");

        // Обновление размеров
        setTimeout(() => {
            this.slide = this.row.querySelector(".slide");
            this.slideWindow.style.width = this.slide.offsetWidth + "px";
            this.slideWindow.style.height = this.slide.offsetHeight + "px";
        }, 200);
    }

    addEventListeners() {
        this.slider
            .querySelector(".slide_button.prev")
            .addEventListener("click", () => this.prev());
        this.slider
            .querySelector(".slide_button.next")
            .addEventListener("click", () => this.next());
    }

    createSlide() {
        const slide = document.createElement("div");
        slide.className = "slide";
        return slide;
    }

    next() {
        this.count++;
        if (this.count >= this.max) this.count = 0;
        this.row.style.transform =
            "translateX(-" +
            ((this.slide.offsetWidth + this.gap) * this.count + this.gap - 9) +
            "px)";
        this.colorFigure();
    }

    prev() {
        this.count--;
        if (this.count < 0) this.count = this.max - 1;
        this.row.style.transform =
            "translateX(-" +
            ((this.slide.offsetWidth + this.gap) * this.count + this.gap - 9) +
            "px)";
        this.colorFigure();
    }

    gotoSlide(index) {
        if (index >= this.max) this.index = 0;
        this.count = index - 1;
        this.next();
    }

    colorFigure() {
        for (let i = 0; i < this.dots.length; i++) {
            if (i == this.count) {
                this.dots[i].style.backgroundColor = "#fdb10b";
                this.dots[i].style.transform = "scale(1)";
                continue;
            }
            this.dots[i].style.backgroundColor = "#0d504d";
            let len = Math.abs(i - this.count);
            let scale = 1 - 0.2 * len;
            scale = scale >= 0.4 ? scale : 0.4;
            this.dots[i].style.transform = "scale(" + scale + ")";
        }
    }
}

// Автоматическая инициализация всех слайдеров
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".slider").forEach((container) => {
        new Slider(container.id);
    });
});
