@php
    $baseUrl = explode('/', request()->getPathInfo());
    if (count($baseUrl) >= 2)
        unset($baseUrl[2]);
    $baseUrl = implode('/', $baseUrl);
@endphp
<div class="paginate-button" id="{{$id}}">
    <div>
        @isset($lastPage)
            <a
                href="{{$baseUrl . "?$field=1" .  '#' . $id}}"
            >Первая</a>
        @endisset
        @foreach ($list as $alias=>$title)
            <a
                href="{{$baseUrl . "?$field=" . $alias .  '#' . $id}}"
                @if (request()->input($field) == $alias)
                    style="background-color: #FDB10B;"
                @endif
            >{{$title}}</a>
        @endforeach
        @isset($lastPage)
            <a
                href="{{$baseUrl . "?$field=$lastPage" .  '#' . $id}}"
            >Последняя</a>
        @endisset
    </div>
</div>
