@extends('../home')
@section('info')
    <style>
        .item-component-div {
            width: 100%;
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
        .item-component {
            position: relative;
            z-index: 1;
        }
        .admin {
            position:absolute;
            right: 10px;
        }
    </style>
    <div class="item-component-div">
        <div class="item-component">
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
            <div class="item-content">





                <h1 class="header p-2">
                    <b>{{$item->header}}</b>
                </h1>
                <table>
                    <tr>
                        <td style="width: 35%;">
                            <img src="{{$item->header_photo_link}}" alt="{{$item->header}}" style="width: 100%;">
                        </td>
                        <td style="">
                            <div class="text-center">
                                <span>{{ $item->slogan }}</span>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="p-2">
                    <br>
                    @foreach($datas as $data)
                        @if(str_contains($data, '--photo--'))
                            <br><br>
                            <img src="{{ str_replace('--photo--', '', $data) }}" alt="$item->header">
                        @elseif(str_contains($data, '--video--'))
                            <br><br>
                            video olacaq burda
                        @elseif(str_contains($data, '--link--'))
                            <br>
                            @php
                                $link = explode('||||', $data);
                            @endphp
                            <a style="color: dodgerblue;" href="{{ str_replace('--link--', '', $link[0]) }}">{{ $link[1] }}</a>
                        @else
                            <br>
                            {!! $data !!}
                        @endif
                    @endforeach
                </div>







            </div>
            <div class="tags">
                <a href="" rel="tag"></a>
            </div>
        </div>
    </div>

    <div id="categories"  style="max-width: 800px;margin: auto;">
        <br>
        <h2><span class="topper">Other categories</span></h2>
        <x-categories />
    </div>
@endsection
