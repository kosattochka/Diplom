<div class="paginate-button" id="{{$id}}">
    <div>
        @isset($lastPage)
            <a
                href="{{request()->url() . "?$field=1" .  '#' . $id}}"
            >Первая</a>
        @endisset
        @foreach ($list as $alias=>$title)
            <a
                href="{{request()->url() . "?$field=" . $alias .  '#' . $id}}"
                @if (request()->input($field) == $alias)
                    style="background-color: #FDB10B;"
                @endif
            >{{$title}}</a>
        @endforeach
        @isset($lastPage)
            <a
                href="{{request()->url() . "?$field=$lastPage" .  '#' . $id}}"
            >Последняя</a>
        @endisset
    </div>
</div>
