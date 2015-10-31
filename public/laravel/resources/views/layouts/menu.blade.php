<nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="/">Home</a></li>
                    @foreach ($menu_items as $id => $item)
                    <li>
                        <a href="/{{$item['post_name']}}">{{$item['post_title']}}</a>
                        @if(isset($item['sub_menu']) && count($item['sub_menu']) >= 1)
                            <ul>
                                @foreach ($item['sub_menu'] as $sub_item)
                                <li>
                                    <a href="/{{$sub_item['post_name']}}">{{$sub_item['post_title']}}</a>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>
