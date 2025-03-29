<div class="review-card">
    <figure></figure>
    <div>
        <h1>{{$name}}</h1>
        @include('element.stars', [
            'rating'=>$rating
        ])
    </div>
    <div>
        <span class="text-yellow">{{$date}}</span>
        <span>на {{$services}}</span>
    </div>
    <span>{{$text}}</span>
</div>
