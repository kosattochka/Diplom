<div class="slider">
    <button class="button_review" onclick="prev()">
        <div class="image-container">
            <img
                src="/img/arrow-left-yellow.svg"
                alt=""
                class="initial-image"
            />
            <img
                src="/img/arrow-left-green.svg"
                alt=""
                class="hover-image"
            />
        </div>
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
        <button class="button_review" onclick="prev()">
            <div class="image-container">
                <img
                    src="/img/arrow-right-yellow.svg"
                    alt=""
                    class="initial-image"
                />
                <img
                    src="/img/arrow-right-green.svg"
                    alt=""
                    class="hover-image"
                />
            </div>
        </button>
    </div>
    <div>
        @for ($i=0; $i<count($elements)/$count; $i++)
            <figure></figure>
        @endfor
    </div>
</div>
