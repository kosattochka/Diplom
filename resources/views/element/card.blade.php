<div class="card">
    <img src="{{$img}}" alt="">
    <div>
        <div>
            <span>{{$name}}</span>
            @if (isset($square, $capasity))
                <img src="/img/house.svg" alt="">
                <span>{{$square}} м<sup>2</sup></span>
                <img src="/img/people.svg" alt="">
                <span>{{$capasity}}</span>
            @endif
        </div>
    </div>
    <div>
        <p>{{$text}}</p>
        @if (isset($square, $capasity))
            <div>
                <button>Заявка на бронь</button>
            </div>
        @endif
    </div>
    <a href="{{$link}}">Подробнее</a>
</div>
