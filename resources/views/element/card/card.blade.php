<div class="card">
    <img src="{{$img}}" alt="">
    <div>
        <div>
            <span>{{$name}}</span>
            @if (isset($square, $capacity))
                <img src="/img/house.svg" alt="">
                <span>{{$square}} м<sup>2</sup></span>
                <img src="/img/people.svg" alt="">
                <span>{{$capacity}}</span>
            @endif
        </div>
    </div>
    <div>
        <p>{{$text}}</p>
        @if (isset($square, $capacity))
            @php
                $alias = explode('/',$link);
                $alias = last($alias);
            @endphp
            <div>
                <button class="modal-open" data-modal="reservation" data-room="{{$alias}}">Заявка на бронь</button>
            </div>
        @endif
    </div>
    <a href="{{$link}}">Подробнее</a>
</div>
