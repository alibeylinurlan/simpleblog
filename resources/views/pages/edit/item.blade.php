@extends('../../home')
@section('edit')
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .shadow {
            box-shadow: 0 0 5px gray;
        }
        .input-label {
            font-size: 18px;
        }
        .input-text {
            width: 100%;
            border-radius: 5px;
            box-shadow: 0 0 2px gray;
            border: solid thin white;
            padding: 2px;
            outline-width: 1px;
            padding-inline: 10px;
        }
        .input-text:focus {
            outline: none;
            box-shadow: 0 0 2px gray;
        }
        .button {
            padding: 5px;
            padding-inline: 10px;
            background: #eee;
            border-radius: 5px;
            box-shadow: 1px 1px 4px gray;
            transition: 0.3s;
            cursor: pointer;
        }
        .button:hover {
            box-shadow: 3px 3px 5px gray;

        }
        .xx {
            position:absolute;
            font-size: 32px;
            margin-top: 10px;
            margin-left: 10px;
            cursor: pointer;
        }
        .fotovideo {
            display: flex;
        }
        .fotovideo input {
            width: 95%;
        }
    </style>
    <div class="mt-4" style="padding: 5px;">
        <div class="rounded-md overflow-hidden shadow" style="max-width: 1200px;margin: auto;padding: 0;padding-bottom: 10px;background: white;">
            <div style="background: darkcyan;padding: 10px;font-size: 20px;color: white;">
                Add new item
            </div>
            <div style="background: white;padding: 5px;">
                <form action="{{ route('uptade') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <label class="input-label">Header</label><br>
                    <input class="input-text" type="text" name="header" required value="{{$item->header}}">
                    <label class="input-label">Slogan</label><br>
                    <input class="input-text" type="text" name="slogan" required value="{{$item->slogan}}">
                    <label class="input-label">Body</label><br>
                    <textarea class="input-text" type="text" name="body" required>{{$item->body}}</textarea>
                    <label class="input-label">Category</label><br>
                    <div style="display: flex;">
                        <select class="input-text" required style="flex-grow: 2;" name="category">
                            @forelse($categories as $k => $category)
                                <option value="{{ $category }}" @if($item->$category == $category) selected @endif>{{ $category }}</option>
                            @empty
                                <option disabled>write a new category please</option>
                            @endforelse
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="input-text" name="newcategory" style="width: 30%;" placeholder="or write a new category">
                    </div>
                    <label class="input-label">Header foto link</label><br>
                    <input class="input-text" type="text" name="foto_link[]" required placeholder="Please write just image link" value="{{ $itemheader_photo }}">
                    <label class="input-label">Referance ?</label>
                    <input class="input-text" type="text" name="reference_link" placeholder="If have reference link write here" value="{{ $item->reference_link }}">
                    <div class="fotovideo-div">
                        {{-- Foto --}}
                        @foreach($foto_links as $foto_link)
                            <label class="input-label">Image</label>
                            <div class="fotovideo" style="margin-top: -10px;">
                                <input class="input-text mt-4" type="text" name="foto_link[]" placeholder="Write image link" value="{{ $foto_link }}">
                                <div>
                                    <div class="xx">
                                        <i class="bx bx-x"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- Video --}}
                        @forelse($video_links as $video_link)
                            <label class="input-label">video</label>
                            <div class="fotovideo" style="margin-top: -10px;">
                                <input class="input-text mt-4" type="text" name="video_link[]" placeholder="Write image link" value="{{ $video_link }}">
                                <div>
                                    <div class="xx">
                                        <i class="bx bx-x"></i>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="mt-4">
                        <span class="button imagebtn">Add image link</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="button videobtn">Add Drive video link</span>
                    </div>
                    <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="float: right;margin-right: 5px;">
                        Enter
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.imagebtn').on('click', function (){
                $('.fotovideo-div')
                    .append('<div class="fotovideo"><input class="input-text mt-4" type="text" name="foto_link[]" placeholder="Write image link" ><div><div class="xx"><i class="bx bx-x"></i></div></div></div>');
                $('.fotovideo:last-child').hide().slideDown();
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            });

            $('.videobtn').on('click', function (){
                $('.fotovideo-div')
                    .append('<div class="fotovideo"><input class="input-text mt-4" type="text" name="video_link[]" placeholder="Write drive video link" ><div><div class="xx"><i class="bx bx-x"></i></div></div></div>');
                $('.fotovideo:last-child').hide().slideDown();
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            });
            $('.fotovideo-div').on('click', '.xx', function (){
                $(this).parent().parent().slideUp(function() { $(this).remove(); });
            });
        });
    </script>
@endsection
