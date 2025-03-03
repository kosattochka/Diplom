<div class="slider">
    <div>
        <button class="slide_button" onclick="prev()">
            <img src="/img/arrow-left-yellow.svg" alt="" />
            <img src="/img/arrow-left-green.svg" alt="" />
        </button>
        <div class="slider-window">
            <div id="row">
                <div class="slide" id="slide">
                    @for ($i=1; $i<=count($elements); $i++)
                        {!!$elements[$i-1]!!}
                        @if (is_int($i/$count))
                            </div>
                            <div class="slide">
                        @endif
                    @endfor
                </div>
            </div>
        </div>
        <button class="slide_button" onclick="next()">
            <img src="/img/arrow-right-yellow.svg" alt="" />
            <img src="/img/arrow-right-green.svg" alt="" />
        </button>
    </div>
    <div>
        @for ($i=0; $i<ceil(count($elements)/$count); $i++)
            <figure></figure>
        @endfor
    </div>
</div>

<script defer>
    const slideWindow = document.querySelector('.slider-window')
    const row = document.getElementById('row')
    const slide = document.getElementById('slide')
    const figure = document.querySelectorAll('.slider figure')
    slideWindow.style.width = slide.offsetWidth + 'px'
    slideWindow.style.height = slide.offsetHeight + 'px'

    var slider = 0
    var max = {{ceil(count($elements)/$count)}}
    colorFigure()

    function next() {
        slider++
        if(slider>=max) slider=0;
        row.style.transform = 'translateX(-' + (slide.offsetWidth * slider) + 'px)'
        colorFigure()
    }

    function prev() {
        slider--
        if(slider<0) slider=max-1
        row.style.transform = 'translateX(-' + (slide.offsetWidth * slider) + 'px)'
        colorFigure()
    }

    function colorFigure() {
        for(let i=0;i<figure.length;i++) {
            if(i==slider) {
                figure[i].style.backgroundColor = '#fdb10b';
                figure[i].style.transform = 'scale(1)'
                continue;
            }
            figure[i].style.backgroundColor = '#0d504d';
            let len = Math.abs(i-slider);
            figure[i].style.transform = 'scale('+(1 - 0.2*len)+')'
        }
    }
</script>
