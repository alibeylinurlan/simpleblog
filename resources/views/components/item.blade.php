<div>
    <style>
        .item-component-div {
            width: 100%;
            padding: 5px;
        }
        .item-component {
            max-width: 800px;
            background: white;
            margin: auto;
            margin-top: 20px;
        }
        .item-component img {
            width: 100%;
        }
        .item-component .header {
            font-size: 20px;
        }
        .slogan-div {
            display: flex;
            padding: 15px;
            justify-content: center;
            align-items: center;

        }
        .slogan-div .slogan {
            flex-grow: 1;
            padding-right: 10px;
        }
        .slogan-div .read-more {
            flex-grow: 1;
            color: dodgerblue;
            justify-content: center;
            align-items: center;
        }
        .slogan-div .read-more div {
            display: flex;
            float: right;
            font-size: 20px;}
        .arrow {
            margin-top: 5px;
        }
        .item-component.rounded-md.shadow.m-1 {
            position: relative;
            z-index: 1;
        }
        .admin {
            position:absolute;
            right: 10px;
        }
    </style>
    <div class="item-component-div">

        <div class="item-component rounded-md shadow m-1">
            @auth
                <div class="admin">
                    <a href="{{ route('edit', ['id' => $item->id]) }}">
                        <span class="btn btn-primary">Edit</span>
                    </a>
                    <a onclick="return confirm('Are you serious?')" href="{{ route('delete', ['id' => $item->id]) }}">
                        <span class="btn btn-primary">Delete</span>
                    </a>
                </div>
            @endauth
            <div class="admin category">
                <span class="text-emerald-400">{{ $item->category }}</span>
            </div>
            <p class="header p-2">
                <b>{{$item->header}}</b>
            </p>
            <a href="{{ route('info', ['name' => urlencode($item->header), 'id' => $item->id*4321]) }}">
                <img src="{{$item->header_photo_link}}" alt="{{$item->header}}">
                <div class="slogan-div">
                    <div class="slogan">
                        {{$item->slogan}}
                        {{$item->slogan}}
                    </div>
                    <div class="read-more">
                        <div>
                            <div>Open</div>
                            <div class="arrow">
                                <i class='bx bxs-chevron-right'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
