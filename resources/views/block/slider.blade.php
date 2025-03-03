<div class="slider">
    <div>
        <button class="slide_button" onclick="prev()">
            <img src="/img/arrow-left-yellow.svg" alt="" />
            <img src="/img/arrow-left-green.svg" alt="" />
        </button>
        <div class="slider-window">
            <div id="slider_row">
                <div class="slide" id="slide">
                    @for ($i=0; $i<count($elements); $i++)
                        @if (is_int($i/$count))
                            </div>
                            <div class="slide">
                        @endif
                        {!!$elements[$i]!!}
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
    // const slide = document.querySelector('.slide')
    const slider_window = document.querySelector('.slider-window')
    slider_window.style.width=slide.clientWidth+'px'
    slider_window.style.height=slide.clientHeight+'px'

    var slider = 1
    var count = {{ceil(count($elements)/$count)}}

    function next() {
        slider++
        if (slider > count) {
            slider = 1
        }
        slider_row.style.transform = 'translateX(-'+(slide.clientWidth*(slider-1))+'px)'

    }

    function prex() {
        slider--
        if (slider < 1) {
            slider = count
        }
        slider_row.style.transform = 'translateX(-'+(slide.clientWidth*(slider-1))+'px)'

    }
</script>
