<div class="card">
    <img src="{{$img}}" alt="">
    <div>
        <div>
            <span>"{{$name}}"</span>
            @if (isset($square, $capasity))
                <img src="/img/house.svg" alt="">
                <span>{{$square}} кв.м</span>
                <img src="/img/people.svg" alt="">
                <span>{{$capasity}}</span>
            @endif
        </div>
    </div>
    <div>
        <p>{{$text}}</p>
        @if (isset($square, $capasity))
            <button>Заявка на бронь</button>
        @endif
    </div>
    <a href="{{$link}}">Подробнее</a>
</div>
