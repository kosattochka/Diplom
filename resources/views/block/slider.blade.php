<div class="slider"
    id="slider{{ $id ?? 1 }}"
    data-elements='@json($elements, JSON_HEX_TAG)'
    data-mobile-count="{{$mobileCount??$desktopCount}}"
    data-desktop-count="{{$desktopCount}}"
>
    <div>
        <button class="slide_button prev">
            <img src="/img/arrow-left-yellow.svg" alt="" />
            <img src="/img/arrow-left-green.svg" alt="" />
        </button>
        <div class="slider-window">
            <div class="sliderRow"></div>
        </div>
        <button class="slide_button next">
            <img src="/img/arrow-right-yellow.svg" alt="" />
            <img src="/img/arrow-right-green.svg" alt="" />
        </button>
    </div>
    <div class="dots"></div>
</div>

