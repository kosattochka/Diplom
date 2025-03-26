<div class="paginate-button" id="{{$id}}">
    <div>
        @foreach ($list as $alias=>$title)
            <a
                href="{{request()->url() . "?$field=" . $alias .  '#' . $id}}"
                @if (request()->input($field) == $alias)
                    style="background-color: #FDB10B;"
                @endif
            >{{$title}}</a>
        @endforeach
    </div>
</div>
