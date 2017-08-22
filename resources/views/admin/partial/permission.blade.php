@foreach($user_permission as $item)
    <li><a><i class="fa fa-table"></i> {{$item->name}}<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            @if($item->arr!=null)
                @foreach($item->arr as $item)
                    <li><a href="{{url('/')}}/{{$item->link}}"> {{$item->name}}</a></li>
                @endforeach
            @endif
            {{--<li><a href="{{url('/admin/menu')}}"> Menu</a></li>--}}
            {{--<li><a href="{{url('/admin/slide')}}">Slide</a></li>--}}
            {{--<li><a href="{{url('/admin/style-life')}}">Thời trang và cuộc sống</a></li>--}}
            {{--<li><a href="{{url('/admin/shop-news')}}">Sản phẩm - Tin tức</a></li>--}}
        </ul>
    </li>
@endforeach