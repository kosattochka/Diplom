<div class="slider">
    <div>
        <button class="slide_button" onclick="prev()">
            <img src="/img/arrow-left-yellow.svg" alt="" />
            <img src="/img/arrow-left-green.svg" alt="" />
        </button>
        <div class="slider-window">
            <div class="slide">
                @for ($i=0; $i<count($elements); $i++)
                    {!!$elements[$i]!!}
                    @if (is_int($i/$count))
                        </div>
                        <div class="slide">
                    @endif
                @endfor
            </div>
        </div>
        <button class="slide_button" onclick="prev()">
                <img src="/img/arrow-right-yellow.svg" alt="" />
                <img src="/img/arrow-right-green.svg" alt="" />
        </button>
    </div>
    <div>
        @for ($i=0; $i<count($elements)/$count; $i++)
            <figure></figure>
        @endfor
    </div>
</div>
