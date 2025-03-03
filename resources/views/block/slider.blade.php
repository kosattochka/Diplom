<div class="slider slider{{$id??1}}" id="slider{{ $id ?? 1 }}" data-elements='@json($elements, JSON_HEX_TAG)'>
    <div>
        <button class="slide_button" onclick="prev{{$id??1}}()">
            <img src="/img/arrow-left-yellow.svg" alt="" />
            <img src="/img/arrow-left-green.svg" alt="" />
        </button>
        <div class="slider-window slider{{$id??1}}">
            <div id="row{{$id??1}}"></div>
        </div>
        <button class="slide_button" onclick="next{{$id??1}}()">
            <img src="/img/arrow-right-yellow.svg" alt="" />
            <img src="/img/arrow-right-green.svg" alt="" />
        </button>
    </div>
    <div class="dots"></div>
</div>

<script defer>
    const elements{{$id??1}} = JSON.parse(slider{{ $id ?? 1 }}.dataset.elements);
    const slideWindow{{$id??1}} = document.querySelector('.slider-window.slider{{$id??1}}')
    const row{{$id??1}} = document.getElementById('row{{$id??1}}')
    var slide{{$id??1}} = null
    var dots{{$id??1}} = null
    var count{{$id??1}} = 0
    var max{{$id??1}} = 0

    initSlider{{$id??1}}();

    function initSlider{{$id??1}}() {
        const isMobile = window.innerWidth < 768;
        let currentCount = isMobile ? {{$mobileCount??$desktopCount}} : {{$desktopCount}};
        max{{$id??1}} = Math.ceil(elements{{$id??1}}.length / currentCount);

        // создание слайдов
        slideGroup = createSlide();
        elements{{$id??1}}.forEach((element, index) => {
            if((index % currentCount === 0) && (index !== 0)) {
                row{{$id??1}}.appendChild(slideGroup);
                slideGroup = createSlide();
            }
            const elementDiv = document.createElement('div');
            elementDiv.innerHTML = element;
            slideGroup.appendChild(elementDiv);
        });

        if(slideGroup.children.length > 0) {
            row{{$id??1}}.appendChild(slideGroup);
        }

        // Создание точек
        let dots = document.querySelector('.slider.slider{{$id??1}} .dots')
        for(let i = 0; i < max{{ $id ?? 1 }}; i++) {
            const dot = document.createElement('figure');
            dots.appendChild(dot);
            dot.addEventListener('click', () => gotoSlide{{$id??1}}(i));
        }
        dots{{$id??1}} = dots.querySelectorAll('figure')

        // Обновление размеров
        setTimeout(() => {
        slide{{$id??1}} = row{{$id??1}}.querySelector('.slide');
            if(slide{{$id??1}}) {
                slideWindow{{$id??1}}.style.width = slide{{$id??1}}.offsetWidth + 'px';
                slideWindow{{$id??1}}.style.height = slide{{$id??1}}.offsetHeight + 'px';
                console.log(slide{{$id??1}}.offsetHeight)
            }
            colorFigure{{ $id ?? 1 }}();
        }, 200);

    }

    function createSlide() {
        const slide = document.createElement('div');
        slide.className = 'slide';
        return slide;
    }

    function next{{$id??1}}() {
        count{{$id??1}}++
        if(count{{$id??1}}>=max{{$id??1}}) count{{$id??1}}=0;
        row{{$id??1}}.style.transform = 'translateX(-' + ((slide{{$id??1}}.offsetWidth + 45) * count{{$id??1}}+45) + 'px)'
        colorFigure{{$id??1}}()
    }

    function prev{{$id??1}}() {
        count{{$id??1}}--
        if(count{{$id??1}}<0) count{{$id??1}}=max{{$id??1}}-1
        row{{$id??1}}.style.transform = 'translateX(-' + ((slide{{$id??1}}.offsetWidth + 45) * count{{$id??1}}+45) + 'px)'
        colorFigure{{$id??1}}()
    }

    function gotoSlide{{$id??1}}(index) {
        if(index>=max{{$id??1}}) index=0;
        count{{$id??1}} = index-1
        next{{$id??1}}()
    }

    function colorFigure{{$id??1}}() {
        for(let i=0;i<dots{{$id??1}}.length;i++) {
            if(i==count{{$id??1}}) {
                dots{{$id??1}}[i].style.backgroundColor = '#fdb10b';
                dots{{$id??1}}[i].style.transform = 'scale(1)'
                continue;
            }
            dots{{$id??1}}[i].style.backgroundColor = '#0d504d';
            let len = Math.abs(i-count{{$id??1}});
            let scale = 1 - 0.2*len;
            scale = scale >= 0.4? scale : 0.4;
            dots{{$id??1}}[i].style.transform = 'scale('+scale+')'
        }
    }
</script>
