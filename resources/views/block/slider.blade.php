<div class="slider slider{{$id??1}}">
    <div>
        <button class="slide_button" onclick="prev{{$id??1}}()">
            <img src="/img/arrow-left-yellow.svg" alt="" />
            <img src="/img/arrow-left-green.svg" alt="" />
        </button>
        <div class="slider-window slider{{$id??1}}">
            <div id="row{{$id??1}}">
                <div class="slide" id="slide{{$id??1}}">
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
        <button class="slide_button" onclick="next{{$id??1}}()">
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
    const slideWindow{{$id??1}} = document.querySelector('.slider-window.slider{{$id??1}}')
    const row{{$id??1}} = document.getElementById('row{{$id??1}}')
    const slide{{$id??1}} = document.getElementById('slide{{$id??1}}')
    const figure{{$id??1}} = document.querySelectorAll('.slider.slider{{$id??1}} figure')
    var count{{$id??1}} = 0
    var max{{$id??1}} = {{ceil(count($elements)/$count)}}

    setTimeout(()=>{
        slideWindow{{$id??1}}.style.width = slide{{$id??1}}.offsetWidth + 'px'
        slideWindow{{$id??1}}.style.height = slide{{$id??1}}.offsetHeight + 'px'

        colorFigure{{$id??1}}()
    }, 200)

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

    function colorFigure{{$id??1}}() {
        for(let i=0;i<figure{{$id??1}}.length;i++) {
            if(i==count{{$id??1}}) {
                figure{{$id??1}}[i].style.backgroundColor = '#fdb10b';
                figure{{$id??1}}[i].style.transform = 'scale(1)'
                continue;
            }
            figure{{$id??1}}[i].style.backgroundColor = '#0d504d';
            let len = Math.abs(i-count{{$id??1}});
            let scale = 1 - 0.2*len;
            scale = scale >= 0.2? scale : 0.2;
            figure{{$id??1}}[i].style.transform = 'scale('+scale+')'
        }
    }
</script>
